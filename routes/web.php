<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\BackgroundController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $projects = App\Models\Project::where('is_visible', true)->orderBy('order')->get();
    $background = App\Models\Background::getActive();
    $skills = App\Models\Skill::where('is_visible', true)->orderBy('order')->get();
    $hero = App\Models\Hero::getActive();
    $contacts = App\Models\Contact::where('is_visible', true)->orderBy('order')->get();
    
    return view('welcome', compact('projects', 'background', 'skills', 'hero', 'contacts'));
})->name('welcome');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Project routes
    Route::resource('projects', ProjectController::class);
    Route::put('projects/{project}/toggle', [ProjectController::class, 'toggleVisibility'])->name('projects.toggle');

    // Background routes
    Route::get('/background/edit', [BackgroundController::class, 'edit'])->name('background.edit');
    Route::put('/background', [BackgroundController::class, 'update'])->name('background.update');

    // Skill routes
    Route::resource('skills', SkillController::class);
    Route::put('skills/{skill}/toggle', [SkillController::class, 'toggleVisibility'])->name('skills.toggle');

    // Hero routes
    Route::get('/hero/edit', [HeroController::class, 'edit'])->name('hero.edit');
    Route::put('/hero', [HeroController::class, 'update'])->name('hero.update');

    // Contact routes
    Route::resource('contacts', ContactController::class);
    Route::put('contacts/{contact}/toggle', [ContactController::class, 'toggleVisibility'])->name('contacts.toggle');
});

Route::get('/project/{project}', [ProjectController::class, 'view_project'])->name('projects.show');

require __DIR__.'/auth.php';