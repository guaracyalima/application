<?php

namespace App\Transformers;

use App\Entities\Plan;
use League\Fractal\TransformerAbstract;

/**
 * Class PlanCandidateTransformer
 * @package namespace App\Transformers;
 */
class PlanCandidateTransformer extends TransformerAbstract
{

    public function transform(Plan $model)
    {
        return [
            'plan_id'    => (int) $model->id
        ];
    }
}
