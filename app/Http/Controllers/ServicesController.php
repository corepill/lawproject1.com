<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicesRequest;
use App\Models\Service;
use App\Providers\AppServiceProvider;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('admin.services', compact('services'));
    }

    public function create()
    {
        return view('admin.servicesCreateAndUpdate');
    }
    public function edit($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        return view('admin.servicesCreateAndUpdate', compact('service'));
    }
    public function store(ServicesRequest $request)
    {
        $data = $request->validated();
        try {
            $data['user_id'] = 1;
            $data['slug'] = AppServiceProvider::slugCheck($data['title'], Service::class);
            $data['status'] = $request->has('status') ? 1 : 0;
            if ($request->hasFile('image_path')) {
                $filePath = ImageService::uploadImage($request->file('image_path'), "services");
                $data['image_path'] = "storage/" . $filePath;
            }
            $service = Service::create($data);
            $newContent = $this->processAndMoveImages($data['content']);
            $service->content = $newContent;
            $service->save();

            // Başarı mesajı
            alert()->success("Başarılı", "Hizmet oluşturma işlemi başarılı!")->showConfirmButton("Tamam")->autoClose(5000);
            return redirect('admin/hizmetler');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(["Hata" => "Bir hata oluştu: " . $e->getMessage()]);
        }
    }

    public function update(ServicesRequest $request, $slug)
    {
        try {
            $service = Service::where('slug', $slug)->firstOrFail();
            $data = $request->validated();
            $data['status'] = $request->has('status') ? 1 : 0;
            $data['slug'] = AppServiceProvider::slugCheck($data['title'], Service::class, $service->id);

            if ($request->hasFile('image_path')) {
                // Yeni resmi yükle
                $filePath = ImageService::uploadImage($request->file('image_path'), "services");
                $data['image_path'] = "storage/" . $filePath;

                // Eski resmi sil
                if (!is_null($service->image_path) && file_exists(public_path($service->image_path))) {
                    File::delete(public_path($service->image_path));
                }
            }

            $service->update($data);
            $newContent = $this->processAndMoveImages($data['content']);
            $service->content = $newContent;
            $service->save();

            // Başarı mesajı
            alert()->success("Başarılı", "Hizmet güncelleme işlemi başarılı!")->showConfirmButton("Tamam")->autoClose(5000);
            return redirect('admin/hizmetler');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['Hata' => 'Beklenmeyen bir hata oluştu: ' . $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            // Makaleyi bul
            $service = Service::find($id);
            if (!$service) {
                return Response::json(['status' => 'error', 'message' => 'Hizmet bulunamadı!'], 404);
            }
            $imagePaths = $this->extractImagesFromContent($service->content);
            foreach ($imagePaths as $image) {
                $path = str_replace('http://127.0.0.1:8000/storage/', '', $image);
                if (Storage::disk('public')->exists($path)) {
                    Storage::disk('public')->delete($path);
                }
            }

            if (!is_null($service->image_path) && file_exists(public_path($service->image_path))) {
                File::delete(public_path($service->image_path));
            }

            $service->delete();
            return Response::json(['status' => 'success', 'message' => 'Hizmet başarıyla silindi!']);
        } catch (\Exception $e) {
            return Response::json(['status' => 'failed', 'message' => 'Hizmet silme işlemi başarısız!']);
        }
    }

    public function uploadTempFile(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,webp,gif,svg',
        ]);

        // Dosya yükleme işlemi
        if ($request->file('file')->isValid()) {
            // Dosyayı geçici olarak yükle
            // $tempPath = $request->file('file')->store('public/temp');
            $imageFile = $request->file("file");
            $fileName = Str::slug(pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME))
                . '-' . time() // Benzersiz isim oluşturma
                . '.' . $imageFile->getClientOriginalExtension();
            $tempPath = $imageFile->storeAs("temp", $fileName, "public");
            $resPath = '/storage/' . $tempPath; // 'public/' yapıldı
            return response()->json(['path' => $resPath]);
        }

        return response()->json(['message' => 'Geçersiz dosya yükleme.'], 400);
    }

    public function processAndMoveImages(string $content)
    {
        $images = $this->extractImagesFromContent($content);

        foreach ($images as $image) {
            // Dosya yolunu düzenleyelim
            $tempPath = str_replace('/storage/temp/', 'temp/', $image);  // 'public' olmadan

            // Tam yolu ve dosyanın var olup olmadığını kontrol edelim

            $imageExtension = pathinfo($tempPath, PATHINFO_EXTENSION);
            $uniqueName = uniqid() . '.' . $imageExtension;
            $newPath = 'uploads/' . $uniqueName;  // 'uploads/' hedef dizini

            if (Storage::disk('public')->exists($tempPath)) {
                // Dosyayı kalıcı dizine taşı
                Storage::disk('public')->move($tempPath, $newPath);
                $content = str_replace($image, Storage::url($newPath), $content);
            }
        }
        $content = preg_replace('/http:\/\/127.0.0.1::8000/', 'http://127.0.0.1:8000', $content);

        return $content;
    }

    public function deleteImages(Request $request)
    {
        $images = $request->input('images', []);

        foreach ($images as $image) {
            // URL'den yolu çıkarıyoruz
            $path = str_replace('http://127.0.0.1:8000/storage/', '/', $image);

            // Dosyanın varlığını kontrol ediyoruz
            if (Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            } else {
                return response()->json(['message' => 'Dosya bulunamadı: ' . $path], 404);
            }
        }

        return response()->json(['message' => 'Görseller başarıyla silindi.']);
    }

    private function extractImagesFromContent($content)
    {
        preg_match_all('/src="([^"]+)"/', $content, $matches);
        return $matches[1];
    }
}
