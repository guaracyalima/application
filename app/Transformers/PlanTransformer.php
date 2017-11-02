<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Plan;

/**
 * Class PlanTransformer
 * @package namespace App\Transformers;
 */
class PlanTransformer extends TransformerAbstract
{

    /**
     * Transform the \Plan entity
     * @param \Plan $model
     *
     * @return array
     */
    public function transform(Plan $model)
    {
        return [
            'id'                            => (int) $model->id,
            'nome'                          => $model->name,
            'quantidade_usuarios'           => $model->max_users,
            'quantidade_eleitores'          => $model->max_electors,
            'quantidade_sms'                => $model->sms_quantity,
            'quantidade_email_marketing'    => $model->emails_quantity,
            'renovacao_automatica'          => $model->renewal_frequency,
            'preco'                         => $model->price
        ];
    }
}
