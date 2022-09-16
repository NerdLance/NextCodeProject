<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('welcome', [
            'projects' => Project::latest()->filter(request(['category']))->paginate(10),
            'projects_by_votes' => Project::withCount('votes')->filter(request(['category']))->orderBy('votes_count', 'desc')->get(5),
            'categories' => Category::get(),
            'category' => (request('category')) ? Category::where('id', request('category'))->first() : ''
        ]);
    }
}
