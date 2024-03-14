<?php

namespace App\Http\Controllers;

use App\Models\PersonalInfo;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePersonalInfoRequest;
use App\Http\Requests\UpdatePersonalInfoRequest;
use App\Models\Education;
use App\Models\RelevantKnowledge;
use App\Models\WorkExperience;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PersonalInfoController extends Controller
{
    public function index(Request $request)
    {
        // Paginate the results
        $personalInfo = PersonalInfo::with('workExperience', 'education', 'relevantKnowledge')->paginate(5);
    
        return view('personal_info.index', compact('personalInfo'));
    }
    

    public function create()
    {
        return view('personal_info.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Linkedin' => 'required|url',
            'Github' => 'required|url',
            'name' => 'required',
            'email' => 'required|email',
            'residence' => 'required',
            'personal_story' => 'required',
            'age' => 'required|integer|min:0',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

         // Handle image upload
         if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'portfolio_' . time() . '.' . $image->getClientOriginalExtension();
            
            $imagePath = public_path('Images/' . $imageName);
            
            Image::make($image)->save($imagePath);
    
            // Add image path to data
            $data['image'] = 'Images/' . $imageName;
        }

        $personalInfo = PersonalInfo::create($data);

        return redirect()->route('personal-info.index')
            ->with('success', 'Personal information created successfully.');
    }

    public function show(PersonalInfo $personalInfo)
    {
        return view('personal_info.show', compact('personalInfo'));
    }

    public function edit(PersonalInfo $personalInfo)
    {
        return view('personal_info.edit', compact('personalInfo'));
    }

    public function update(Request $request, PersonalInfo $personalInfo)
    {
        $request->validate([
            // Validation rules here
        ]);

        $personalInfo->update($request->all());

        return redirect()->route('personal_info.index')
            ->with('success', 'Personal information updated successfully.');
    }

    public function destroy(PersonalInfo $personalInfo)
    {
        $personalInfo->delete();

        return redirect()->route('personal_info.index')
            ->with('success', 'Personal information deleted successfully.');
    }
}