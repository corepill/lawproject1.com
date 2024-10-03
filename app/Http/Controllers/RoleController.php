<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class RoleController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => "required"
            ], [
                'name.required' => 'Rol adı zorunludur.'
            ]);
            $data = $validatedData;
            $data['user_id'] = 1;
            $role = Role::create($data);
            return response()->json([
                'status' => 'success',
                'role' => [
                    'id' => $role->id,
                    'name' => $role->name,
                ],
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed',
                "message" => 'Beklenmeyen bir hata oluştu: ' . $e->getMessage()
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $role = Role::find($id);
            if (!$role) {
                return Response::json(['status' => 'error', 'message' => 'Duyuru bulunamadı!'], 404);
            }
            $role->delete();
            return Response::json([
                'status' => 'success',
                'message' => 'Rol silindi.'
            ]);
        } catch (\Exception $e) {
            return Response::json([
                'status' => 'failed',
                "message" => 'Beklenmeyen bir hata oluştu: ' . $e->getMessage()
            ]);
        }
    }
}
