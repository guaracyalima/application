<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Educations;

/**
 * Class EducationsTransformer
 * @package namespace App\Transformers;
 */
class EducationsTransformer extends TransformerAbstract
{

    /**
     * Transform the \Educations entity
     * @param \Educations $model
     *
     * @return array
     */
    public function transform(Educations $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
