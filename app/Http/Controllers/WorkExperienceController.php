<?php

namespace App\Http\Controllers;

use App\Models\WorkExperience;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWorkExperienceRequest;
use App\Http\Requests\UpdateWorkExperienceRequest;
use App\Models\PersonalInfo;
use Illuminate\Http\Request;

class WorkExperienceController extends Controller
{
    public function index(Request $request)
    {
        $workExperiences = WorkExperience::paginate(5);
        return view('work_experience.index', compact('workExperiences'));
    }

    public function create()
    {
        
        $personalInfo = PersonalInfo::all(); // Retrieve all personal information
        return view('work_experience.create', compact('personalInfo'));
    }

    public function store(Request $request)
{
    $request->validate([
        'workplace' => 'required|string|max:255',
        'job_type' => 'required|string|max:255',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after:start_date',
        'duties' => 'required|string',
        'personal_info_id' => 'required|exists:personal_info,id', // Assuming 'personal_info_id' is the foreign key
    ]);

    // Create a new WorkExperience instance with the validated data
    $workExperience = new WorkExperience([
        'workplace' => $request->workplace,
        'job_type' => $request->job_type,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'duties' => $request->duties,
    ]);

    // Assign the 'personal_info_id' from the request
    $workExperience->personal_info_id = $request->personal_info_id;

    // Save the new WorkExperience instance
    $workExperience->save();

    return redirect()->route('work-experience.index')
        ->with('success', 'Work experience created successfully.');
}

    

    public function edit(WorkExperience $workExperience)
    {
        return view('work_experience.edit', compact('workExperience'));
    }

    public function update(Request $request, WorkExperience $workExperience)
    {
        $request->validate([
            // Validation rules here
        ]);

        $workExperience->update($request->all());

        return redirect()->route('work_experience.index')
            ->with('success', 'Work experience updated successfully.');
    }

    public function destroy(WorkExperience $workExperience)
    {
        $workExperience->delete();

        return redirect()->route('work_experience.index')
            ->with('success', 'Work experience deleted successfully.');
    }
}