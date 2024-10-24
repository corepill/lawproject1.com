<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Providers\AppServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'status' => 'nullable|boolean'
        ]);
        try {
            $data["user_id"] = 1;
            $data['status'] = $request->status;
            $data['slug'] = AppServiceProvider::slugCheck($data['title'], Category::class);
            $category = Category::create($data);
            return response()->json([
                'status' => 'success',
                'category' => $category,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(["Hata" => "Bir hata oluştu: " . $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'status' => 'nullable|boolean'
        ]);
        $category = Category::findOrFail($id);
        try {
            $data['status'] = $request->status;
            $data['slug'] = AppServiceProvider::slugCheck($data['title'], Category::class, $category->slug);
            $category->update($data);

            return response()->json([
                'status' => 'success',
                'category' => $category,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(["Hata" => "Bir hata oluştu: " . $e->getMessage()]);
        }
    }


    public function destroy($id)
    {
        try {
            $category = Category::find($id);
            if (!$category) {
                return Response::json(['status' => 'error', 'message' => 'Kategori bulunamadı!'], 404);
            }
            $category->delete();
            return Response::json([
                'status' => 'success',
                'type' => 'category',
                'message' => 'Kategori silindi.'
            ]);
        } catch (\Exception $e) {
            return Response::json([
                'status' => 'failed',
                "message" => 'Beklenmeyen bir hata oluştu: ' . $e->getMessage()
            ]);
        }
    }
}
