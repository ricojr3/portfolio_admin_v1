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
            'screenshots' => 'nullable|array',
            'screenshots.*' => 'image|max:2048',
            'video' => 'nullable|mimes:mp4,webm,avi,mov|max:20480', // 20MB max
            'url' => 'nullable|url',
            'is_visible' => 'sometimes',
            'order' => 'nullable|integer',
        ]);
        
        // Handle main project image
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }
        
        // Handle screenshots
        if ($request->hasFile('screenshots')) {
            $screenshotPaths = [];
            foreach ($request->file('screenshots') as $screenshot) {
                $screenshotPaths[] = $screenshot->store('projects/screenshots', 'public');
            }
            $validated['screenshots'] = $screenshotPaths;
        }
        
        // Handle video
        if ($request->hasFile('video')) {
            $validated['video'] = $request->file('video')->store('projects/videos', 'public');
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
            'screenshots' => 'nullable|array',
            'screenshots.*' => 'image|max:2048',
            'video' => 'nullable|mimes:mp4,webm,avi,mov|max:20480',
            'url' => 'nullable|url',
            'is_visible' => 'sometimes',
            'order' => 'nullable|integer',
        ]);
        
        // Handle main project image
        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }
        
        // Handle screenshots
        if ($request->hasFile('screenshots')) {
            // Delete old screenshots
            if ($project->screenshots) {
                foreach ($project->screenshots as $screenshot) {
                    Storage::disk('public')->delete($screenshot);
                }
            }
            
            $screenshotPaths = [];
            foreach ($request->file('screenshots') as $screenshot) {
                $screenshotPaths[] = $screenshot->store('projects/screenshots', 'public');
            }
            $validated['screenshots'] = $screenshotPaths;
        }
        
        // Handle video
        if ($request->hasFile('video')) {
            if ($project->video) {
                Storage::disk('public')->delete($project->video);
            }
            $validated['video'] = $request->file('video')->store('projects/videos', 'public');
        }
        
        $validated['is_visible'] = $request->has('is_visible');
        
        $project->update($validated);
        
        return redirect()->route('dashboard')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        // Delete main image
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }
        
        // Delete screenshots
        if ($project->screenshots) {
            foreach ($project->screenshots as $screenshot) {
                Storage::disk('public')->delete($screenshot);
            }
        }
        
        // Delete video
        if ($project->video) {
            Storage::disk('public')->delete($project->video);
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