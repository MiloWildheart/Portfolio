<?php

namespace App\Http\Controllers;

use App\Models\PersonalInfo;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePersonalInfoRequest;
use App\Http\Requests\UpdatePersonalInfoRequest;

class PersonalInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personalInfos = PersonalInfo::all();
        return view('personal_info.index', compact('personalInfos'));
    }

    public function create()
    {
        return view('personal_info.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            // Validation rules here
        ]);

        PersonalInfo::create($request->all());

        return redirect()->route('personal_info.index')
            ->with('success', 'Personal information created successfully.');
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