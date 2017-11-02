<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Broken;

/**
 * Class BrokenTransformer
 * @package namespace App\Transformers;
 */
class BrokenTransformer extends TransformerAbstract
{

    /**
     * Transform the \Broken entity
     * @param \Broken $model
     *
     * @return array
     */
    public function transform(Broken $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
