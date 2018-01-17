<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Team extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'candidate_id',
        'collaborator_id',
        'description',
        'raking_position',
    ];

}