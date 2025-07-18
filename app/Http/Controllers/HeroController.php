<?php
namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    public function edit()
    {
        $hero = Hero::getActive() ?? new Hero([
            'title' => 'Welcome to My Portfolio',
            'description' => 'Passionate developer creating elegant solutions to complex problems.'
        ]);
        
        return view('hero.edit', compact('hero'));
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        // Handle image upload
        if ($request->hasFile('image')) {
            // Get existing hero to check if we need to delete old image
            $existingHero = Hero::getActive();
            if ($existingHero && $existingHero->image) {
                Storage::disk('public')->delete($existingHero->image);
            }
            
            $validated['image'] = $request->file('image')->store('heroes', 'public');
        }
        
        // Create new hero entry - this way we keep history of changes
        Hero::create($validated);
        
        return redirect()->route('dashboard')->with('success', 'Hero section updated successfully.');
    }
}