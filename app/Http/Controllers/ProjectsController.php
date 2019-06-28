<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;
use App\Http\Requests\UpdateProjectRequest;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = auth()->user()->projects;

        return view('projects.index', compact('projects'));   
    }

    public function show(Project $project)
    {    
        $this->authorize('update', $project);

        return view('projects.show', compact('project'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store()
    {
        // validate
        // persist
        $project = auth()->user()->projects()->create($this->validateRequest());

        // redirect   
        return redirect($project->path());
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(UpdateProjectRequest $form)
    {    
        return redirect($form->save()->path());
    }

    public function destroy(Project $project)
    {
        $this->authorize('update', $project);

        $project->delete();

        return redirect('/projects');
    }

    protected function validateRequest()
    {
        return request()->validate([
            'platform_id' => 'required|min:1|max:1', 
            'title' => 'required|min:3', 
            'url' => 'required|url', 
            'start_date' => 'required|min:1', 
            'end_date' => 'required|min:1', 
            'notes' => 'nullable|min:3'
        ]);
    }
}
