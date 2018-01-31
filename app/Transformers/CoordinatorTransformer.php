<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Coordinator;

/**
 * Class CoordinatorTransformer
 * @package namespace App\Transformers;
 */
class CoordinatorTransformer extends TransformerAbstract
{

    /**
     * Transform the \Coordinator entity
     * @param \Coordinator $model
     *
     * @return array
     */
    public function transform(Coordinator $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
