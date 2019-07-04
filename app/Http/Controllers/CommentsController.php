<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Campaign;
use App\Project;
use App\Comment;

use App\Http\Requests\UpdateCommentRequest;

class CommentsController extends Controller
{
    public function index(Campaign $campaign, Project $project)
    {	    

        $comments = Comment::where('project_id', '=', $project->id)->orderBy('created_at', 'DESC')->get();

        return view('comments.index', compact('campaign', 'project', 'comments'));   
    }

    public function show(Campaign $campaign, Project $project)
    {
        $comments = Comment::where('project_id', '=', $project->id)->orderBy('created_at', 'DESC')->get();

        return view('comments.index', compact('campaign', 'project', 'comments'));   
    }


        public function create(Campaign $campaign, Project $project)
    {
        return view('comments.create', compact('campaign', 'project', 'comments'));
    }

    public function store(Campaign $campaign, Project $project)
    {
	    
	    $attributes = $this->validateRequest();
	    $attributes['project_id'] = $project->id;
        $attributes['campaign_id'] = $campaign->id;
	    
        $comment = auth()->user()->comments()->create($attributes);
        return redirect('campaigns/'.$campaign->id.'/projects/'.$project->id.'/comments/');
    }

    public function edit(Campaign $campaign, Project $project, Comment $comment)
    {
        return view('comments.edit', compact('campaign', 'project', 'comment'));
    }

    public function update(Campaign $campaign, Project $project, Comment $comment)
    {
        $commentUpdated = $comment->update($this->validateRequest());
        //return redirect($project->path());
        return redirect('campaigns/'.$campaign->id.'/projects/'.$project->id.'/comments/');
    }

    public function destroy(Campaign $campaign, Project $project, Comment $comment)
    {
        $this->authorize('update', $comment);
        $comment->delete();
        return redirect('campaigns/'.$campaign->id.'/projects/'.$project->id.'/comments/');
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
