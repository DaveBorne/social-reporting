<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Campaign;
use App\Project;

use App\Http\Requests\UpdateProjectRequest;

class ProjectsController extends Controller
{
    public function index(Campaign $campaign)
    {
        
        //$projects = Project::all();
        $projects = Project::where('campaign_id', '=', $campaign->id)->orderBy('created_at', 'DESC')->get();

        return view('projects.index', compact('campaign', 'projects'));   
    }

    public function show(Campaign $campaign, Project $project)
    {   
        //$this->authorize('update', $project);

        return view('projects.show', compact('campaign', 'project'));
    }

    public function create(Campaign $campaign)
    {
        return view('projects.create', compact('campaign'));
    }

    public function store(Campaign $campaign)
    {

        $attributes = $this->validateRequest();
        $attributes['campaign_id'] = $campaign->id;
        
        $comment = auth()->user()->projects()->create($attributes);


        // redirect   
        return redirect('/campaigns/'.$campaign->id.'/projects/');
    }

    public function edit(Campaign $campaign, Project $project)
    {
        return view('projects.edit', compact('campaign', 'project'));
    }

    public function update(Campaign $campaign, Project $project)
    {

        //$updateProject = $this->validateRequest();
        $projectUpdated = $project->update($this->validateRequest());
        return redirect('/campaigns/'.$campaign->id.'/projects/'.$project->id);

        //dd(1);
        //$project = auth()->user()->projects()->save($this->validateRequest());
        //dd(1);
        //return redirect($form->save()->path());
    }

    public function destroy(Campaign $campaign, Project $project)
    {
        $this->authorize('update', $project);

        $project->delete();

        return redirect('/campaigns/'.$campaign->id.'/projects/');
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
