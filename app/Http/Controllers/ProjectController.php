<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('order')->get();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'technologies' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'url' => 'nullable|url',
            'is_visible' => 'sometimes',
            'order' => 'nullable|integer',
        ]);
        
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }
        
        $validated['is_visible'] = $request->has('is_visible');
        
        Project::create($validated);
        
        return redirect()->route('dashboard')->with('success', 'Project created successfully.');
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'technologies' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'url' => 'nullable|url',
            'is_visible' => 'sometimes',
            'order' => 'nullable|integer',
        ]);
        
        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }
        
        $validated['is_visible'] = $request->has('is_visible');
        
        $project->update($validated);
        
        return redirect()->route('dashboard')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }
        
        $project->delete();
        
        return redirect()->route('dashboard')->with('success', 'Project deleted successfully.');
    }
    
    public function toggleVisibility(Project $project)
    {
        $project->is_visible = !$project->is_visible;
        $project->save();
        
        return redirect()->back()->with('success', 'Project visibility updated.');
    }
}