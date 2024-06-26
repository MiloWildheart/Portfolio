<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function showPublicPortfolio()
     {
         $tags = Tag::all(); // Assuming you fetch tags from the database
         
         dd($tags); // Dump $tags here to check if it contains data
         
         return view('PublicPortfolio', [
             'tags' => $tags,
         ]);
     }
    public function index()
    {
        $tags = Tag::paginate(5);

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
            'tag' => $tag
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tag $tag)
    {
        return view('Tags.edit', [
            'tag' => $tag
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'required|string|max:7', 
        ]);
    
        $tag->fill($data);
        $tag->save();
    
        return redirect()->route('Tags.index')->with('success', 'Tag updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $tag = Tag::find($id);

        if (!$tag) {
            return redirect()->route('Tags.index')->with('error', 'Tag not found.');
        }

        $tag->delete();

        return redirect()->route('Tags.index')->with('success', 'Tag deleted successfully.');
    }
}
