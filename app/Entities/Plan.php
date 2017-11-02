<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Plan extends Model implements Transformable
{
    use TransformableTrait;

    protected $guarded = [];

    public function candidate()
    {
        return $this->hasOne(Candidate::class);
    }
}
