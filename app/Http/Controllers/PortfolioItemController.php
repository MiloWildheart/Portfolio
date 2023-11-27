<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
        return view('Portfolio-items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Add appropriate validation rules
            // Add other validation rules for your form fields
        ]);
        $portfolioItem = PortfolioItem::create($request->all());

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'portfolio_' . time() . '.' . $image->getClientOriginalExtension();
            $imagePath = 'storage\app\public\Images' . $imageName;
    
            // Save the original image
            Image::make($image)->save($imagePath);
    
            // You may want to store the image path in the database
            $portfolioItem->update(['image' => $imagePath]);
        }

        $portfolioItem->tags()->sync($request->input('tags', []));
        return redirect()->route('Portfolio-items.index')->withSuccess('New Portfolio item created succesfully.');
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
            'portfolioItems' => $portfolioItem
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PortfolioItem $portfolioItem)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Add appropriate validation rules
            // Add other validation rules for your form fields
        ]);

        $portfolioItem->update($request->all());

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'portfolio_' . time() . '.' . $image->getClientOriginalExtension();
            $imagePath = 'storage\app\public\Images' . $imageName;
    
            // Save the original image
            Image::make($image)->save($imagePath);
    
            // You may want to store the image path in the database
            $portfolioItem->update(['image' => $imagePath]);
        }

        $portfolioItem->tags()->sync($request->input('tags', []));
        return redirect()->back()->withSuccess('portfolio item updated succesfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PortfolioItem $portfolioItem)
    {
        $portfolioItem->delete();
        return redirect()->route('Portfolio-items.index')->withSuccess('portfolio item deleted successfully.');
    }
}
