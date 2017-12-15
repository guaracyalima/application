<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\VoterMoreInformation;

/**
 * Class VoterMoreInformationTransformer
 * @package namespace App\Transformers;
 */
class VoterMoreInformationTransformer extends TransformerAbstract
{

    /**
     * Transform the \VoterMoreInformation entity
     * @param \VoterMoreInformation $model
     *
     * @return array
     */
    public function transform(VoterMoreInformation $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
