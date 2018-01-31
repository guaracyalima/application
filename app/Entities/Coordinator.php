<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Coordinator extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'collaborator_id'
    ];

    public function collaborator (  )
    {
        return $this->belongsTo (Collaborator::class, 'collaborator_id');
    }

    public function team (  )
    {
        return $this->hasMany (Team::class, 'coordinator_id');
    }
}
