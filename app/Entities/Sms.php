<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Sms extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'from',
        'sender',
        'to',
        'content',
        'replyTo',
        'priority',
        'user_id'
    ];

    public function user (  )
    {
        return $this->belongsTo (User::class, 'user_id');
    }

}
