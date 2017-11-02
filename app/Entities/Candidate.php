<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Candidate extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'user_id',
        'plan_id',
        'education_id',
        'occupation_id',
        'name',
        'title',
        'politic_name',
        'cpf',
        'rg',
        'broken_id',
        'address',
        'stret',
        'neighborhood',
        'cep',
        'city',
        'uf',
        'ddd_cellphone',
        'cellphone',
        'ddd_telephone',
        'telephone',
        'email',
        'whatsapp',
        'biograph',
        'created_by'
    ];

    public function plan()
    {

        return $this->belongsTo(Plan::class);
    }

    public function user()
    {

        return $this->belongsTo(User::class);
    }

}
