<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamRequest;
use App\Models\Role;
use App\Models\Team;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::with('role')->get();
        $roles = Role::all();
        return view('admin.team', compact('teams', 'roles'));
    }

    public function store(TeamRequest $request)
    {
        $data = $request->validated();

        try {
            $data['user_id'] = 1;
            $data['status'] = $request->has('status') ? 1 : 0;

            if ($request->hasFile('photo')) {
                $filePath = ImageService::uploadImage($request->file('photo'), "team");
                $data['photo'] = "storage/" . $filePath;
            }

            $team = Team::create($data);

            $teamWithRole = Team::with('role')->find($team->id);

            return response()->json([
                'status' => 'success',
                'team' => [$teamWithRole],
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(["Hata" => "Bir hata oluştu: " . $e->getMessage()]);
        }
    }

    public function update(TeamRequest $request, $id)
    {
        $data = $request->validated();
        try {
            $team = Team::findOrFail($id);
            $data['user_id'] = 1;

            if ($request->hasFile('photo')) {


                // Yeni resmi yükle
                $filePath = ImageService::uploadImage($request->file('photo'), "team");
                $data['photo'] = "storage/" . $filePath;


                // Eski resmi sil
                if ($team->photo) {
                    ImageService::deleteImage($team->photo);
                }
            }
            $team->update($data);

            // Güncellenmiş takım bilgileriyle birlikte rol bilgilerini çek
            $teamWithRole = Team::with('role')->find($team->id);

            return Response::json([
                'status' => 'success',
                'team' => [$teamWithRole], // Güncellenmiş takım ile rolü döndür
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['Hata' => 'Beklenmeyen bir hata oluştu: ' . $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $team = Team::find($id);
            if (!$team) {
                return Response::json(['status' => 'error', 'message' => 'Ekip üyesi bulunamadı!'], 404);
            }
            $team->delete();
            ImageService::deleteImage($team->photo);
            return Response::json([
                'status' => 'success',
                'type' => 'team',
                'message' => 'Üye silindi.'
            ]);
        } catch (\Exception $e) {
            return Response::json([
                'status' => 'failed',
                "message" => 'Beklenmeyen bir hata oluştu: ' . $e->getMessage()
            ]);
        }
    }
}
