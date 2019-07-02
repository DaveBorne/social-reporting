<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;
use App\Comments;
use App\Project;
use App\Projects;
use App\Http\Requests\UpdateCommentRequest;

class CommentsController extends Controller
{
    public function index(Project $project)
    {
	    
	    //dd($project);
	    
        $comments = auth()->user()->comments;

        return view('comments.index', compact('comments', 'project'));   
    }

    public function show(Comment $comment)
    {    
        $this->authorize('update', $comment);

        return view('comments.show', compact('comment'));
    }

    public function create(Project $project)
    {
        return view('comments.create', compact('comments', 'project'));
    }

    public function store(Project $project)
    {
	    
	    $attributes = $this->validateRequest();
	    $attributes['project_id'] = $project->id;
	    
        $comment = auth()->user()->comments()->create($attributes);

        // redirect   
        return redirect($comment->path());
    }

    public function edit(Comment $comment)
    {
        return view('comments.edit', compact('comment'));
    }

    public function update(UpdateCommentRequest $form)
    {
        return redirect($form->save()->path());
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('update', $comment);

        $comment->delete();

        return redirect('/comments');
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
