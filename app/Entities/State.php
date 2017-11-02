<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class State extends Model implements Transformable
{
    use TransformableTrait;

    protected $guarded = [];

    public function region()
    {

        return $this->belongsTo(Region::class);
    }

    public function city()
    {
        return $this->hasOne(City::class);
    }

    public function candidate()
    {
        return $this->hasOne(Candidate::class);
    }
}
