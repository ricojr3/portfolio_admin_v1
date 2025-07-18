<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::orderBy('order')->get();
        return view('contacts.index', compact('contacts'));
    }
    
    public function create()
    {
        return view('contacts.create');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'order' => 'nullable|integer|min:0',
            'is_visible' => 'sometimes|boolean',
        ]);
        
        $validated['is_visible'] = $request->has('is_visible');
        
        Contact::create($validated);
        
        return redirect()->route('dashboard')->with('success', 'Contact information added successfully.');
    }
    
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }
    
    public function update(Request $request, Contact $contact)
    {
        $validated = $request->validate([
            'type' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'order' => 'nullable|integer|min:0',
            'is_visible' => 'sometimes|boolean',
        ]);
        
        $validated['is_visible'] = $request->has('is_visible');
        
        $contact->update($validated);
        
        return redirect()->route('dashboard')->with('success', 'Contact information updated successfully.');
    }
    
    public function destroy(Contact $contact)
    {
        $contact->delete();
        
        return redirect()->route('dashboard')->with('success', 'Contact information deleted successfully.');
    }
    
    public function toggleVisibility(Contact $contact)
    {
        $contact->is_visible = !$contact->is_visible;
        $contact->save();
        
        return back()->with('success', 'Contact visibility updated.');
    }
}