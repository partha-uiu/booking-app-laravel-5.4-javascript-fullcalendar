<?php

namespace App\Http\Controllers;


class PagesController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }
    
    public function contact()
    {
        return view('pages.contact');
    }
}
