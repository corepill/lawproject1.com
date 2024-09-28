<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home(){
        return view('public.home');
    }

    public function services(){
        return view('public.services');
    }

    public function serviceDetail(){
        return view('public.servicesDetail');
    }

    public function blogs(){
        return view('public.blogs');
    }

    public function blogDetail(){
        return view('public.blogDetail');
    }
    public function about(){
        return view('public.about');
    }
    public function career(){
        return view('public.career');
    }

    public function careerDetail(){
        return view('public.careerDetail');
    }
    public function team(){
        return view('public.team');
    }

    public function announcements(){
        return view('public.announcements');
    }

    public function announcementDetail(){
        return view('public.announcementDetail');
    }
    public function contact(){
        return view('public.contact');
    }
}
