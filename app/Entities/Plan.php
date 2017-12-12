<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Plan extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
      'name',
      'max_users',
      'max_electors',
      'sms_quantity',
      'emails_quantity',
      'price',
      'renewal_frequency'
    ];

    public function candidate()
    {
        return $this->hasOne(Candidate::class);
    }
}
