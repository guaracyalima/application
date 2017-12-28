<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Occupation extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'name'
    ];

    public function votter (  )
    {
        return $this->hasMany (Voter::class, 'occupation_id');
    }

}
