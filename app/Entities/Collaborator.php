<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Collaborator extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'user_id',
        'candidate_id',
        'name',
        'last_name',
        'nickname',
        'genre',
        'birth',
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
        'created_by',
        'proposed_leads',
        'operation_state',
        'operation_city',
        'operation_neighborhoods',
        'interest',
        'whatsapp',
        'cellphone',
        'cellphone',
        'telephone',
        'occupation_id',
        'education_id',
        'salary',
        'observation'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function candidate (  )
    {
        return $this->belongsTo (Candidate::class);
    }

    public function education (  )
    {
        return $this->belongsTo (Educations::class);
    }

    public function occupation (  )
    {
        return $this->belongsTo (Occupation::class);
    }

    public function candidatecollabortor (  )
    {
        return $this->belongsTo (Collaborator::class, 'collaborator_id');
    }

    public function coordinator (  )
    {
        return $this->hasOne (Coordinator::class, 'collaborator_id');
    }

    public function member (  )
    {
        return $this->hasMany (ProjectMember::class, 'collaborator_id');
    }

    public function score (  )
    {
        return $this->hasMany (Gamification::class, 'collaborator_id');
    }
}
