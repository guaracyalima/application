<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\State;

/**
 * Class StateTransformer
 * @package namespace App\Transformers;
 */
class StateTransformer extends TransformerAbstract
{

    /**
     * Transform the \State entity
     * @param \State $model
     *
     * @return array
     */
    public function transform(State $model)
    {
        return [
            'id'         => (int) $model->id,
            'estado' => $model->name,
            'uf' => $model->initials,
            'regiao' => $model->region_id
        ];
    }
}
