<?php

namespace App\Http\Controllers;

use App\Http\Requests\CareerRequest;
use App\Models\Career;
use App\Models\Role;
use App\Providers\AppServiceProvider;
use Illuminate\Http\Request;

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
}
