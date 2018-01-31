<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Billing;

/**
 * Class BillingTransformer
 * @package namespace App\Transformers;
 */
class BillingTransformer extends TransformerAbstract
{

    /**
     * Transform the \Billing entity
     * @param \Billing $model
     *
     * @return array
     */
    public function transform(Billing $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
