<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Sendmail extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'from',
        'sender',
        'to',
        'content',
        'cc',
        'bcc',
        'replyTo',
        'subject',
        'priority',
        'attach',
        'attachData',
        'user_id',
    ];

    public function user (  )
    {
        return $this->belongsTo (User::class, 'user_id');
    }

}
