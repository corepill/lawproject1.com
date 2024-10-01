<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => "required"
        ], [
            'name.required' => 'Rol adı zorunludur.'
        ]);
        try {
            $data = $validatedData;
            $data['user_id'] = auth()->id();
            $role = Role::create($data);
            return response()->json([
                'status' => 'success',
                'role' => [
                    'id' => $role->id,
                    'name' => $role->name,
                ],
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(["Hata" => "Bir hata oluştu: " . $e->getMessage()]);
        }
    }
}
