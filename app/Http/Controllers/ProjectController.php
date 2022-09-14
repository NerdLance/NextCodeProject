<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    public function index() {
        return view('projects.index', [
            'projects' => Project::latest()->filter(request(['category']))->withCount('votes')->paginate(2),
            'projects_by_votes' => Project::withCount('votes')->filter(request(['category']))->orderBy('votes_count', 'desc')->get(5),
            'categories' => Category::get(),
            'project_count' => Project::count(),
            'category' => (request('category')) ? Category::where('id', request('category'))->first() : ''
        ]);
    }

    public function create() {
        return view('projects.create', [
            'categories' => Category::get()
        ]);
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'title' => 'required',
            'category_id' => [
                'required',
                Rule::exists('categories', 'id')
            ],
            'overview' => 'required',
            'functionality' => 'required',
            'difficulty' => 'required', 'in:beginner,intermediate,expert'
        ]);

        $formFields['user_id'] = auth()->id();

        Project::create($formFields);
        return redirect('/projects/manage')->with('message', 'Project Successfully Added');
    }

    public function show() {

    }

    public function manage() {
        return view('projects.manage', [
            'projects' => auth()->user()->projects()->paginate(6)
        ]);
    }
}
