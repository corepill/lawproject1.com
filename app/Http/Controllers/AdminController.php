<?php

namespace App\Http\Controllers;

use App\Services\StatusChangeService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function changeStatus(Request $request, $model)
    {
        $model = $request->type;
        $modelClass = 'App\\Models\\' . ucfirst($model);

        return StatusChangeService::changeStatus($request, new $modelClass());
    }
}
