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

    public function blogs(){
        return view('public.blogs');
    }

    public function about(){
        return view('public.about');
    }

    public function team(){
        return view('public.team');
    }
    public function contact(){
        return view('public.contact');
    }
}
