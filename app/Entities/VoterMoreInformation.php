<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class VoterMoreInformation extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'voter_id',
        'patron_saint',
        'tatoo',
        'average_salary',
        'sexual_preference',
        'animal_prerence',
        'food_prerence',
        'drik_prerence',
        'facebook',
        'instagram',
        'twitter',
        'linkedin',
        'whatsapp',
        'yotube',
    ];

}
