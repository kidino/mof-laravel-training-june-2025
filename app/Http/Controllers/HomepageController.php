<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function home() {
        return view('homepage.home');
    }

    public function about() {
        return view('homepage.about');
    }
    
    public function contact() {
        return view('homepage.contact');
    }
}
