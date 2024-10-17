<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class CareerController extends Controller
{
  public function index()
  {
    return view('admin.career');
  }

  public function create()
    {
        $roles = Role::all();
        return view('admin.careerCreateAndUpdate', compact('roles'));
    }
}
