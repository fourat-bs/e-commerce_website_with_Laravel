<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home(){
        return view('pages.home'); 
     }
    public function about(){
        return view('pages.about');
    }
    
    public function menu(){
        return view('pages.menu');
    }
    public function services(){
        return view('pages.services');
    }
    public function r(){
        return view('pages.emailr');
    }
     
    
}
