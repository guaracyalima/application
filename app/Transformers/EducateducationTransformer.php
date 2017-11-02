<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Educateducation;

/**
 * Class EducateducationTransformer
 * @package namespace App\Transformers;
 */
class EducateducationTransformer extends TransformerAbstract
{

    /**
     * Transform the \Educateducation entity
     * @param \Educateducation $model
     *
     * @return array
     */
    public function transform(Educateducation $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
