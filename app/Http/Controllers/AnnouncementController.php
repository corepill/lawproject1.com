<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnnouncementRequest;
use App\Models\Announcement;
use App\Providers\AppServiceProvider;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::get();
        return view('admin.announcement', compact('announcements'));
    }

    public function create()
    {
        return view('admin.announcementCreateAndUpdate');
    }

    public function store(AnnouncementRequest $request)
    {
        try {
            $data = $request->validated();
            $data['user_id'] = 1;
            $data['slug'] = AppServiceProvider::slugCheck($data['title'], Announcement::class);
            $data['status'] = $request->has('status') ? 1 : 0;

            Announcement::create($data);

            alert()->success('Başarılı', "Duyuru oluşturma işlemi başarılı!")->showConfirmButton('Tamam')->autoClose(5000);
            return redirect('admin/duyurular');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['Hata' => 'Beklenmeyen bir hata oluştu: ' . $e->getMessage()]);
        }
    }

    public function edit($slug)
    {
        $announcement = Announcement::where('slug', $slug)->firstOrFail();
        return view('admin.announcementCreateAndUpdate', compact('announcement'));
    }

    public function update(AnnouncementRequest $request, $slug)
    {
        try {
            $announcement = Announcement::where('slug', $slug)->firstOrFail();
            // if ($announcement->user_id != auth()->id()) {
            //     return redirect()->back()->withErrors(['Hata' => 'Bu duyuruyu güncelleme yetkiniz yok.']);
            // }

            $data = $request->validated();
            $data['slug'] = AppServiceProvider::slugCheck($data['title'], Announcement::class, $announcement->slug);
            $data['status'] = $request->has('status') ? 1 : 0;

            $announcement->update($data);

            alert()->success('Başarılı', "Duyuru güncelleme işlemi başarılı!")->showConfirmButton('Tamam')->autoClose(5000);
            return redirect('admin/duyurular');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['Hata' => 'Beklenmeyen bir hata oluştu: ' . $e->getMessage()]);
        }
    }
}
