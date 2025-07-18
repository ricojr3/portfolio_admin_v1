<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Hero;
use App\Models\Background;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('order')->get();
        $background = Background::getActive();
        $skills = Skill::orderBy('order')->get();
        $hero = Hero::getActive();
        $contacts = Contact::orderBy('order')->get();

        return view('dashboard', compact('projects', 'background', 'skills', 'hero', 'contacts'));
    }
}