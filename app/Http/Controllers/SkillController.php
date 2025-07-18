<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::orderBy('order')->get();
        return view('skills.index', compact('skills'));
    }
    
    public function create()
    {
        return view('skills.create');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'order' => 'nullable|integer|min:0',
            'is_visible' => 'sometimes|boolean',
        ]);
        
        $validated['is_visible'] = $request->has('is_visible');
        
        Skill::create($validated);
        
        return redirect()->route('dashboard')->with('success', 'Skill added successfully.');
    }
    
    public function edit(Skill $skill)
    {
        return view('skills.edit', compact('skill'));
    }
    
    public function update(Request $request, Skill $skill)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'order' => 'nullable|integer|min:0',
            'is_visible' => 'sometimes|boolean',
        ]);
        
        $validated['is_visible'] = $request->has('is_visible');
        
        $skill->update($validated);
        
        return redirect()->route('dashboard')->with('success', 'Skill updated successfully.');
    }
    
    public function destroy(Skill $skill)
    {
        $skill->delete();
        
        return redirect()->route('dashboard')->with('success', 'Skill deleted successfully.');
    }
    
    public function toggleVisibility(Skill $skill)
    {
        $skill->is_visible = !$skill->is_visible;
        $skill->save();
        
        return back()->with('success', 'Skill visibility updated.');
    }
}