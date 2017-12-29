<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Sms;

/**
 * Class SmsTransformer
 * @package namespace App\Transformers;
 */
class SmsTransformer extends TransformerAbstract
{

    /**
     * Transform the \Sms entity
     * @param \Sms $model
     *
     * @return array
     */
    public function transform(Sms $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
