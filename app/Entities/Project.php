<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Project extends Model implements Transformable
{
    use TransformableTrait;
    protected $fillable = [
        'owner_id' ,
        'name' ,
        'description' ,
        'progress' ,
        'status' ,
        'due_date' ,
    ];

    public function candidate (  )
    {
        return $this->belongsTo (Candidate::class, 'owner_id');
    }

    public function note (  )
    {
        return $this->hasMany (ProjectNote::class, 'project_id');
    }

    public function task (  )
    {
        return $this->hasMany (Task::class, 'project_id');
    }

    public function member (  )
    {
        return $this->hasMany (ProjectMember::class, 'project_id');
    }
}
