<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Research extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'candidate_id',
        'support',
        'created_by',
    ];

    public function candidate (  )
    {
        return $this->belongsTo (Candidate::class, 'candidate_id');
    }

    public function kreator (  )
    {
        return $this->belongsTo (User::class, 'created_by');
    }

}
