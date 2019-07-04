<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    //use RecordsActivity;

    protected $guarded = [];
    
    protected $touches = ['project'];


    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }


}