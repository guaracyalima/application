<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class User extends Authenticatable implements Transformable
{
    use Notifiable, TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',  'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    public function collaborator()
    {
        return $this->hasOne(Collaborator::class);
    }

    public function sendmail (  )
    {
        return $this->hasMany (Sendmail::class, 'user_id');
    }

    public function research (  )
    {
        return $this->hasMany (Research::class, 'created_by');
    }

    public function sms (  )
    {
        return $this->hasMany (Sms::class, 'user_id');
    }
}
