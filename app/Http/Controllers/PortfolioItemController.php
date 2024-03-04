<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\PortfolioItem;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PortfolioItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index() 
    // {
    //     $portfolioItems = PortfolioItem::latest()->paginate(3);
    //     $tags = Tag::all();
    
    //     return view('Portfolio-items.index', [
    //         'portfolioItems' => $portfolioItems,
    //         'tags' => $tags,
    //     ]);
    // }

    public function index(Request $request) 
{
    // Retrieve search parameters from the request
    $name = $request->input('name');
    $tag = $request->input('tag');

    // Start with all portfolio items
    $portfolioItems = PortfolioItem::query();

    // Apply search filters
    if ($name) {
        // Filter by title if provided
        $portfolioItems->where('name', 'like', '%' . $name . '%');
    }

    if ($tag) {
        // Filter by tag if provided
        $portfolioItems->whereHas('tags', function ($query) use ($tag) {
            $query->where('name', 'like', '%' . $tag . '%');
        });
    }

    // Paginate the results
    $portfolioItems = $portfolioItems->latest()->paginate(5);

    // Retrieve all tags to populate the tag filter
    $tags = Tag::all();

    return view('Portfolio-items.index', [
        'portfolioItems' => $portfolioItems,
        'tags' => $tags,
    ]);
}
    
public function search(Request $request)
{
   // Retrieve search parameters from the request
   $name = $request->input('name');
   $tag = $request->input('tag');
   

   // Start with all portfolio items
   $portfolioItems = PortfolioItem::query();

   // Apply search filters
   if ($name) {
       // Filter by title if provided
       $portfolioItems->where('name', 'like', '%' . $name . '%');
   }

   if ($tag) {
    // Filter by tag if provided
    $tags = explode(',', $tag); // Convert comma-separated tag string to an array
    $tags = array_map('trim', $tags); // Trim whitespace from each tag
    $portfolioItems->whereHas('tags', function ($query) use ($tags) {
        $query->whereIn('name', $tags);
    });
}


   // Paginate the results
   $portfolioItems = $portfolioItems->latest()->paginate(12);

   // Retrieve all tags to populate the tag filter
   $tags = Tag::all();
   
   // Return filtered portfolio items and all tags to the view
   return view('PublicPortfolio', compact('portfolioItems', 'tags'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();
        return view('Portfolio-items.create', [
            'tags' => $tags,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */

     public function store(Request $request)
{
    $request->validate([
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        // Add other validation rules for your form fields
    ]);

    $data = $request->except(['_token', 'tags']); // Exclude tags from the main data

    $portfolioItem = PortfolioItem::create($data);

    // Handle image upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = 'portfolio_' . time() . '.' . $image->getClientOriginalExtension();
        
        $imagePath = public_path('Images/' . $imageName);
        
        Image::make($image)->save($imagePath);

        // Update the image path in the database
        $portfolioItem->update(['image' => 'Images/' . $imageName]);
    }

    // Sync tags for the portfolio item
    $portfolioItem->tags()->sync($request->input('tags', []));

    return redirect()->route('Portfolio-items.index')->withSuccess('New Portfolio item created successfully.');
}


    /**
     * Display the specified resource.
     */
    public function show(PortfolioItem $portfolioItem)
    {
        return view('Portfolio-items.show', [
            'portfolioItems' => $portfolioItem
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PortfolioItem $portfolioItem)
    {
        return view('Portfolio-items.edit', [
            'portfolioItem' => $portfolioItem
        ]);
    }

    /**
     * Update the specified resource in storage.
     */




     public function update(Request $request, PortfolioItem $portfolioItem)
     {
         \Log::info('Request data:', $request->all());
         
         $request->validate([
             'image' => 'image|mimes:jpeg,png,jpg,gif,jfif|max:2048',
             'name' => 'required|string|max:255',
             'description' => 'required|string',
             'link' => 'required|string|max:255',
             'tags' => 'array',
         ]);
     
         $data = $request->only(['name', 'description', 'link']);
     
         $portfolioItem->fill($data);
     
         // Handle image upload
         if ($request->hasFile('image')) {
             $image = $request->file('image');
             $imageName = 'portfolio_' . time() . '.' . $image->getClientOriginalExtension();
             
             $imagePath = public_path('Images/' . $imageName);
     
             // Save the original image
             Image::make($image)->save($imagePath);
     
             // Update the image path in the model
             $portfolioItem->image = 'Images/' . $imageName;
         }
     
         // Sync tags for the portfolio item
         $portfolioItem->tags()->sync($request->input('tags', []));
     
         // Save the model
         $portfolioItem->save();
     
         return redirect()->back()->withSuccess('Portfolio item updated successfully.');
     }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $portfolioItem = PortfolioItem::find($id);

        if (!$portfolioItem) {
            return redirect()->route('Portfolio-items.index')->with('error', 'Portfolio item not found.');
        }

        $portfolioItem->delete();

        return redirect()->route('Portfolio-items.index')->with('success', 'Portfolio item deleted successfully.');
    }
}
