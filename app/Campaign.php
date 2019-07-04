<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{

    protected $guarded = [];

    //should not be protect or private
    // public $old = [];
    
    public function path()
    {
        return "/campaigns";
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function project()
    {
        return $this->hasMany(Project::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function responses()
    {
        return $this->hasMany(Responses::class);
    }

/*
    public function addTask($body)
    {
        return $this->tasks()->create(compact('body'));
    }

    public function activity()
    {
        return $this->hasMany(Activity::class)->latest();
    }

    public function invite(User $user)
    {
        return $this->members()->attach($user);
    }

    public function members()
    {
        return $this->belongsToMany(User::class, 'project_members');
    }
*/
}
