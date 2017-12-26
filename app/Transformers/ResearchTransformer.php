<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Research;

/**
 * Class ResearchTransformer
 * @package namespace App\Transformers;
 */
class ResearchTransformer extends TransformerAbstract
{

    /**
     * Transform the \Research entity
     * @param \Research $model
     *
     * @return array
     */
    public function transform(Research $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
