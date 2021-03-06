<?php

namespace App\Http\Controllers;

use App\Project;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    

	 public function index()
    {
        // $projects = Project::all();
        $projects = auth()->user()->projects;
        return view('projects.index', compact('projects'));
    }

public function show( Project $project)
{
    if (auth()->user()->isNot($project->owner)) {
        abort(403);
    }
    // $project = project::findOrFail(request('project'));
    return view('projects.show', compact('project'));
}

public function create()
{
    return view('projects.create');
}


   

    public function store()
    {

         
        $attributes= request()->validate([
        'title'=>'required' , 
        'description'=>'required'
        

        ]);

    
            auth()->user()->projects()->create( $attributes);

    
        return redirect('/projects');

    }


    
}
