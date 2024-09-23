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
}
