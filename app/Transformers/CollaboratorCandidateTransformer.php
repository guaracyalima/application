<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\CollaboratorCandidate;

/**
 * Class CollaboratorCandidateTransformer
 * @package namespace App\Transformers;
 */
class CollaboratorCandidateTransformer extends TransformerAbstract
{

    /**
     * Transform the \CollaboratorCandidate entity
     * @param \CollaboratorCandidate $model
     *
     * @return array
     */
    public function transform(CollaboratorCandidate $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
