<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Voter extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'name',
        'last_name',
        'nickname',
        'genre',
        'birth',
        'age',
        'cpf',
        'rg',
        'voter_title',
        'zone_id',
        'session_id',
        'address',
        'stret',
        'neighborhood',
        'cep',
        'city',
        'uf',
        'observation',
        'education_id',
        'occupation_id',
        'ddd_cellphone',
        'cellphone',
        'ddd_telephone',
        'telephone',
        'email',
        'whatsapp',
        'created_by',
    ];

    public function occupation (  )
    {
        return $this->belongsTo (Occupation::class, 'occupation_id');
    }

    public function education (  )
    {
        return $this->belongsTo (Educations::class, 'education_id');
    }

}
