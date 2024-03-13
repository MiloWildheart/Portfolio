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
        return view('work_experience.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            // Validation rules here
        ]);

        WorkExperience::create($request->all());

        return redirect()->route('work_experience.index')
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