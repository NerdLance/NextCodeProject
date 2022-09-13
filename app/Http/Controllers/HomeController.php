<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('welcome', [
            'projects' => Project::latest()->paginate(10),
            'categories' => Category::get()
        ]);
    }
}
