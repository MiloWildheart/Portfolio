<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();

        return view('Tags.index',[
            'tags' => $tags,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'required|string|max:7', // Assuming hex code, e.g., #ff0000
        ]);
    
        $tag = new Tag();
        $tag->fill($data);
        $tag->save();

        return redirect()->route('Tags.index')->withSuccess('New tag created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(tag $tag)
    {
        return view('Tags.show', [
            'tags' => $tag
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tag $tag)
    {
        return view('Tags.edit', [
            'tags' => $tag
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tag $tag)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'required|string|max:7', 
        ]);
    
        $tag = Tag::findOrFail();
        $tag->fill($data);
        $tag->save();
    
        return redirect()->route('tags.index')->with('success', 'Tag updated successfully.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tag $tag)
    {
        $tag->delete();
        return redirect()->route('Tags.index')->withSucces('Tag deleted succesfully.');
    }
}
