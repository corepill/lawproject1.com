<?php

namespace App\Http\Controllers;

use App\Http\Requests\CareerRequest;
use App\Models\Career;
use App\Models\Role;
use App\Providers\AppServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CareerController extends Controller
{
  public function index()
  {
    $careers = Career::with('role')->get();
    return view('admin.career', compact('careers'));
  }

  public function create()
  {
    $roles = Role::all();
    return view('admin.careerCreateAndUpdate', compact('roles'));
  }

  public function store(CareerRequest $request)
  {
    try {
      $data = $request->validated();
      $data['user_id'] = 1;
      $role = Role::findOrFail($data['role_id']);
      $data['slug'] = AppServiceProvider::slugCheck($role['name'], Career::class);
      $data['status'] = $request->has('status') ? 1 : 0;
      Career::create($data);
      alert()->success('Başarılı', "İş ilanı oluşturma işlemi başarılı!")->showConfirmButton('Tamam')->autoClose(5000);
      return redirect()->route('careers.index');
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(['Hata' => 'Beklenmeyen bir hata oluştu: ' . $e->getMessage()]);
    }
  }

  public function edit($slug)
  {
    $roles = Role::all();
    $career = Career::where('slug', $slug)->firstOrFail();
    return view('admin.careerCreateAndUpdate', compact('career', "roles"));
  }

  public function update(CareerRequest $request, $slug)
  {
    try {
      $career = Career::where('slug', $slug)->firstOrFail();
      // if ($career->user_id != auth()->id()) {
      //     return redirect()->back()->withErrors(['Hata' => 'Bu duyuruyu güncelleme yetkiniz yok.']);
      // }

      $data = $request->validated();
      $role = Role::findOrFail($data['role_id']);
      $data['slug'] = AppServiceProvider::slugCheck($role['name'], Career::class);
      $data['status'] = $request->has('status') ? 1 : 0;

      $career->update($data);

      alert()->success('Başarılı', "Duyuru güncelleme işlemi başarılı!")->showConfirmButton('Tamam')->autoClose(5000);
      return redirect('admin/kariyer');
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(['Hata' => 'Beklenmeyen bir hata oluştu: ' . $e->getMessage()]);
    }
  }

  public function destroy($id)
  {
    try {
      // Makaleyi bul
      $career = Career::find($id);
      if (!$career) {
        return Response::json(['status' => 'error', 'message' => 'Kariyer ilanı bulunamadı!'], 404);
      }

      $career->delete();
      return Response::json(['status' => 'success', 'message' => 'Kariyer ilanı başarıyla silindi!']);
    } catch (\Exception $e) {
      return Response::json(['status' => 'failed', 'message' => 'Kariyer ilanı silme işlemi başarısız!']);
    }
  }
}
