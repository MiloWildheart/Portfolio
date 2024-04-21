<?php

namespace App\Http\Controllers;

use App\Models\PersonalInfo;
use App\Models\RelevantKnowledge;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRelevantKnowledgeRequest;
use App\Http\Requests\UpdateRelevantKnowledgeRequest;
use Illuminate\Http\Request;

class RelevantKnowledgeController extends Controller
{
    public function index(Request $request)
    {
        $relevantKnowledges = RelevantKnowledge::paginate(5);
        return view('relevant_knowledge.index', compact('relevantKnowledges'));
    }

    public function create()
    {
        $personalInfo = PersonalInfo::all(); // Retrieve all personal information
        return view('relevant_knowledge.create', compact('personalInfo'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'proficiency' => 'required|numeric|min:0|max:100', // Assuming proficiency is a percentage
            'personal_info_id' => 'required|exists:personal_info,id', // Assuming 'personal_info_id' is the foreign key
        ]);
    
        // Create a new RelevantKnowledge instance with the validated data
        $relevantKnowledge = new RelevantKnowledge([
            'name' => $request->name,
            'description' => $request->description,
            'proficiency' => $request->proficiency,
        ]);
    
        // Assign the 'personal_info_id' from the request
        $relevantKnowledge->personal_info_id = $request->personal_info_id;
    
        // Save the new RelevantKnowledge instance
        $relevantKnowledge->save();
    
        return redirect()->route('relevant-knowledge.index')
            ->with('success', 'Relevant knowledge created successfully.');
    }
    

    public function edit(RelevantKnowledge $relevantKnowledge)
    {
        return view('relevant_knowledge.edit', compact('relevantKnowledge'));
    }

    public function update(Request $request, RelevantKnowledge $relevantKnowledge)
    {
        $personalInfo = PersonalInfo::all();
    
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'proficiency' => 'required|numeric|min:0|max:100',
        ]);
    
        $relevantKnowledge->update($request->all());
    
        return redirect()->route('relevant_knowledge.index')
            ->with('success', 'Relevant knowledge updated successfully.')
            ->with('personalInfo', $personalInfo); // Pass $personalInfo to the view
    }
    

    public function destroy(RelevantKnowledge $relevantKnowledge)
    {
        $relevantKnowledge->delete();

        return redirect()->route('relevant_knowledge.index')
            ->with('success', 'Relevant knowledge deleted successfully.');
    }
}