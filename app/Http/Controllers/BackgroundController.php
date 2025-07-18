<?php

namespace App\Http\Controllers;

use App\Models\Background;
use Illuminate\Http\Request;

class BackgroundController extends Controller
{
    public function edit()
    {
        $background = Background::getActive() ?? new Background(['content' => 'Add your background information here.']);
        return view('background.edit', compact('background'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|string',
        ]);

        // Deactivate all existing backgrounds
        if ($request->has('is_active')) {
            Background::query()->update(['is_active' => false]);
        }

        // Create new background
        $background = Background::create([
            'content' => $validated['content'],
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('dashboard')->with('success', 'Background information updated successfully.');
    }
}