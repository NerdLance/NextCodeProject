<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Models\Project;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function store(Project $project) {
        $existingVote = Vote::where('user_id', auth()->id())->where('project_id', $project->id)->exists();
        
        if ($existingVote != null) {
            dd('Already Voted');
        } else {
            $formFields = [
                'user_id' => auth()->id(),
                'project_id' => $project->id
            ];
            Vote::create($formFields);
        }

        return redirect('/projects');
    }
}
