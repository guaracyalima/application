<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Voter;

/**
 * Class VoterTransformer
 * @package namespace App\Transformers;
 */
class VoterTransformer extends TransformerAbstract
{

    /**
     * Transform the \Voter entity
     * @param \Voter $model
     *
     * @return array
     */
    public function transform(Voter $model)
    {
        return [
            'id'         => (int) $model->id,
            'nome' => $model->name,
            'sobrenome' => $model->last_name,
            'apelido' => $model->nickname,
            'genero' => $model->genre,
            'aniversario' => $model->birth,
            'cpf' => $model->cpf,
            'rg' => $model->rg,
            'titulo_eleitor' => $model->voter_title,
            'zona' => $model->zone_id,
            'secao' => $model->session_id,
            'endereco' => $model->address,
            'rua' => $model->stret,
            'bairro' => $model->neighborhood,
            'cep' => $model->cep,
            'codigo_ibge' => $model->ibge_code,
            'cidade' => $model->city,
            'estado' => $model->uf,
            'pais' => $model->country,
            'obervacoes' => $model->observation,
            'criado_por' => $model->created_by,

        ];
    }
}
