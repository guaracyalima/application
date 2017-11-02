<?php

namespace App\Transformers;

use App\Entities\Candidate;
use League\Fractal\TransformerAbstract;

/**
 * Class CandidateTransformer
 * @package namespace App\Transformers;
 */
class CandidateTransformer extends TransformerAbstract
{

    /**
     * Transform the \Candidate entity
     * @param \Candidate $model
     *
     * @return array
     */

    //protected  $defaultIncludes = ['plan'];
    public function transform(Candidate $model)
    {
        return [
            'id' => (int)$model->id,
            'title' => $model->title,
            'politic_name' => $model->politic_name,
            'cpf' => $model->cpf,
            'rg' => $model->rg,
            'voter_title' => $model->voter_title,
            'zone_id' => $model->zone_id,
            'session_id' => $model->session_id,
            'broken_id' => $model->broken_id,
            'address' => $model->address,
            'stret' => $model->stret,
            'neighborhood' => $model->neighborhood,
            'cep' => $model->cep,
            'ibge_code' => $model->ibge_code,
            'city' => $model->city,
            'uf' => $model->uf,
            'country' => $model->country,
            'plan_id' => $model->plan,
            'biograph' => $model->biograph

        ];
    }

//    public function includePlan(Candidate $candidate)
//    {
//        $plan = $candidate->plan;
//        return $this->collection($plan, new PlanCandidateTransformer());
//    }
}
