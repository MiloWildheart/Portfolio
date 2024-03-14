<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEducationRequest;
use App\Http\Requests\UpdateEducationRequest;
use App\Models\PersonalInfo;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index(Request $request)
    {
        $educations = Education::paginate(5);
        return view('education.index', compact('educations'));
    }

    public function create()
    {
        $personalInfo = PersonalInfo::all(); // Retrieve all personal information
        return view('education.create', compact('personalInfo'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'school' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'personal_info_id' => 'required|exists:personal_info,id', // Assuming 'personal_info_id' is the foreign key
        ]);
    
        // Create a new Education instance with the validated data
        $education = new Education([
            'name' => $request->name,
            'school' => $request->school,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
    
        // Assign the 'personal_info_id' from the request
        $education->personal_info_id = $request->personal_info_id;
    
        // Save the new Education instance
        $education->save();
    
        return redirect()->route('education.index')
            ->with('success', 'Education created successfully.');
    }
    

    public function edit(Education $education)
    {
        return view('education.edit', compact('education'));
    }

    public function update(Request $request, Education $education)
    {
        $request->validate([
            // Validation rules here
        ]);

        $education->update($request->all());

        return redirect()->route('education.index')
            ->with('success', 'Education record updated successfully.');
    }

    public function destroy(Education $education)
    {
        $education->delete();

        return redirect()->route('education.index')
            ->with('success', 'Education record deleted successfully.');
    }
}