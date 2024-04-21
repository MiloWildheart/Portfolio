<?php

namespace App\Http\Controllers;

use App\Models\Skills;
use App\Models\PersonalInfo;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSkillsRequest;
use App\Http\Requests\UpdateSkillsRequest;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skills::all();
        return view('skills.index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $personalInfo = PersonalInfo::all();
        return view('skills.create', compact('personalInfo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'proficiency' => 'required|numeric|min:0|max:100',
            'personal_info_id' => 'required|exists:personal_info,id',
        ]);

        $skills = new Skills([
            'name' => $request->name,
            'description' => $request->description,
            'proficiency' => $request->proficiency,
        ]);

        $skills->personal_info_id = $request->personal_info_id;

        $skills->save();

        return redirect()->route('skills.index')->with('success', 'Skills created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Skills $skills)
    {
        return view('skills.show', compact('skills'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skills $skills)
    {
        return view('skills.edit', compact('skills'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSkillsRequest $request, Skills $skills)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'proficiency' => 'required|numeric|min:0|max:100',
            'personal_info_id' => 'required|exists:personal_info,id',
        ]);

        $skills->update($request->all());

        return redirect()->route('skills.index')->with('success', 'Skills updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skills $skills)
    {
        $skills->delete();

        return redirect()->route('skills.index')->with('success', 'Skills deleted successfully.');
    }
}
