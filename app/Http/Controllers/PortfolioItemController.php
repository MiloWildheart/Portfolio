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
    public function index() 
    {
        $portfolioItems = PortfolioItem::latest()->paginate(3);
        $tags = Tag::all();
    
        return view('Portfolio-items.index', [
            'portfolioItems' => $portfolioItems,
            'tags' => $tags,
        ]);
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


// --------------------------------------------------OLD--------------------------------------------------
//     public function store(Request $request)
// {
//     $request->validate([
//         'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
//         // Add other validation rules for your form fields
//     ]);

//     $portfolioItem = PortfolioItem::create($request->all());

//     if ($request->hasFile('image')) {
//         $image = $request->file('image');
//         $imageName = 'portfolio_' . time() . '.' . $image->getClientOriginalExtension();
        
//         // Use public_path() to get the correct public path
//         $imagePath = public_path('Images/' . $imageName);

//         // Save the original image
//         Image::make($image)->save($imagePath);

//         // You may want to store the image path in the database
//         $portfolioItem->update(['image' => 'Images/' . $imageName]);
//     }

//     $portfolioItem->tags()->sync($request->input('tags', []));
//     return redirect()->route('Portfolio-items.index')->withSuccess('New Portfolio item created successfully.');
// }




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





// --------------------------------------------------OLD--------------------------------------------------
//     public function update(Request $request, PortfolioItem $portfolioItem)
// {   
//     \Log::info('Request data:', $request->all());
//     $request->validate([
//         'image' => 'image|mimes:jpeg,png,jpg,gif,jfif',
//         'name' => 'required|string|max:255',
//         'description' => 'required|string',
//         'link' => 'required|string|max:255',
//         'tags' => 'array',
//     ]);

//     $data = $request->only(['name', 'description', 'link']);

//     $portfolioItem->fill($data);

//     if ($request->hasFile('image')) {
//         $image = $request->file('image');
//         $imagePath = 'Images/portfolio_' . time() . '.' . $image->getClientOriginalExtension();
        
//         // Save the original image
//         Image::make($image)->save(public_path($imagePath));

//         // Set the image attribute on the model
//         $portfolioItem->image = $imagePath;
//     }

//     $portfolioItem->tags()->sync($request->input('tags', []));
    
//     // Save the model
//     $portfolioItem->save();

//     return redirect()->back()->withSuccess('Portfolio item updated successfully.');
// }






    
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
