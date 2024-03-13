<?php

namespace App\Http\Controllers;

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
        return view('relevant_knowledge.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            // Validation rules here
        ]);

        RelevantKnowledge::create($request->all());

        return redirect()->route('relevant_knowledge.index')
            ->with('success', 'Relevant knowledge created successfully.');
    }

    public function edit(RelevantKnowledge $relevantKnowledge)
    {
        return view('relevant_knowledge.edit', compact('relevantKnowledge'));
    }

    public function update(Request $request, RelevantKnowledge $relevantKnowledge)
    {
        $request->validate([
            // Validation rules here
        ]);

        $relevantKnowledge->update($request->all());

        return redirect()->route('relevant_knowledge.index')
            ->with('success', 'Relevant knowledge updated successfully.');
    }

    public function destroy(RelevantKnowledge $relevantKnowledge)
    {
        $relevantKnowledge->delete();

        return redirect()->route('relevant_knowledge.index')
            ->with('success', 'Relevant knowledge deleted successfully.');
    }
}