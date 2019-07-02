<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //use RecordsActivity;

    protected $guarded = [];

    //should not be protect or private
    // public $old = [];
    
    public function path()
    {
        return "/comments/{$this->id}";
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function addTask($body)
    {
        return $this->tasks()->create(compact('body'));
    }

    //public function activity()
    //{
    //    //return $this->hasMany(Activity::class)->latest();
    //}

    public function invite(User $user)
    {
        return $this->members()->attach($user);
    }

    public function members()
    {
        return $this->belongsToMany(User::class, 'comment_members');
    }
}