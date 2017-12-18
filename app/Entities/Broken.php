<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Broken extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'name',
        'description'
    ];

    public function candidate (  )
    {
        return $this->belongsTo (Candidate::class, 'broken_id');
    }

}
