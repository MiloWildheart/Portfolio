<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEducationRequest;
use App\Http\Requests\UpdateEducationRequest;
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
        return view('education.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            // Validation rules here
        ]);

        Education::create($request->all());

        return redirect()->route('education.index')
            ->with('success', 'Education record created successfully.');
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