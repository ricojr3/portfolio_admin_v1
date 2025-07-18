<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavBar extends Controller
{
    public function sampleProjects()
   {
    return view('sampleProjects');
   }

    public function about()
    {
     return view('about');
    }

    public function contact()
   {
       return view('contact');
   }
}
