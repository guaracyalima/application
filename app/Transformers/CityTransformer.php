<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\City;

/**
 * Class CityTransformer
 * @package namespace App\Transformers;
 */
class CityTransformer extends TransformerAbstract
{

    /**
     * Transform the \City entity
     * @param \City $model
     *
     * @return array
     */
    public function transform(City $model)
    {
        return [
            'id'         => (int) $model->id,
            'cidade' => $model->name,
            'estado' => $model->state_id

        ];
    }
}
