<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Campaign;
use App\Project;
use App\Comment;
use App\Response;

use App\Http\Requests\UpdateResponseRequest;

class ResponsesController extends Controller
{

/*
    public function index(Project $project)
    {	    

        $responses = Response::where('project_id', '=', $project->id)->orderBy('created_at', 'DESC')->get();

        return view('responses.index', compact('responses', 'project'));   
    }

    public function show(Response $response)
    {    
        $this->authorize('update', $response);

        return view('responses.show', compact('response'));
    }


    public function create(Project $project)
    {
        dd(1);
        //return view('responses.create', compact('responses', 'project'));
    } 

*/
    public function store(Campaign $campaign, Project $project, Comment $comment)
    {	   
	    $attributes = $this->validateRequest();
        $attributes['campaign_id'] = $campaign->id;
	    $attributes['project_id'] = $project->id;
        $attributes['comment_id'] = $comment->id;
	    
        $response = auth()->user()->responses()->create($attributes);

        //$response = auth()->user()->responses()->create($attributes);
        return redirect('/campaigns/'.$campaign->id.'/projects/'.$project->id.'/comments/');
    }

    public function edit(Campaign $campaign, Project $project, Comment $comment, Response $response)
    {
        return view('responses.edit', compact('campaign', 'project', 'comment', 'response'));
    }

    public function update(Campaign $campaign, Project $project, Comment $comment, Response $response)
    {
        $projectUpdated = $response->update($this->validateRequest());
        return redirect('/campaigns/'.$campaign->id.'/projects/'.$project->id.'/comments/');
    }

    public function destroy(Campaign $campaign, Project $project, Comment $comment, Response $response)
    {
        //$this->authorize('update', $response);
        $response->delete();

        return redirect('/campaigns/'.$campaign->id.'/projects/'.$project->id.'/comments/');
    }

    protected function validateRequest()
    {
        return request()->validate([
            'content' => 'required|min:3', 
            'sentiment_id' => 'required|min:1|max:1', 
            'action_id' => 'required|min:1|max:1',  
            'notes' => 'nullable|min:3'
        ]);
    }

}
