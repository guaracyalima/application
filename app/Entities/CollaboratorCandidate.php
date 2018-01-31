<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class CollaboratorCandidate extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'candidate_id',
        'collaborator_id',
    ];

    public function candidate (  )
    {
        return $this->belongsTo (Candidate::class, 'candidate_id');
    }

    public function collaborator (  )
    {
        return $this->belongsTo (Collaborator::class, 'collaborator_id');
    }

}
