<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //use RecordsActivity;

    protected $guarded = [];
    
    protected $touches = ['project', 'responses'];


    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    
    public function responses()
    {
        return $this->hasMany(Response::class);
    }

}
