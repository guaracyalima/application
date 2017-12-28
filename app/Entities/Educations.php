<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Educations extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'description'
    ];

    public function votter (  )
    {
        return $this->hasMany (Voter::class, 'education_id');
    }

}
