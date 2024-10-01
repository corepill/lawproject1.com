<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
   public function index(){
    $teams = Team::all();
    return view('admin.team', compact('teams'));
   }

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
            $role = Team::create($data);
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
