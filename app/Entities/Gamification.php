<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Gamification extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'collaborator_id',
        'team_id'
    ];

    public function collaborator (  )
    {
        return $this->belongsTo (Collaborator::class, 'collaborator_id');
    }

    public function team (  )
    {
        return $this->belongsTo (Team::class, 'team_id');
    }

}
