<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamRequest;
use App\Models\Role;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        $roles = Role::all();
        return view('admin.team', compact('teams', 'roles'));
    }

    public function store(TeamRequest $request)
    {
        $data = $request->validated();
        dd($data);
        
        try {
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
