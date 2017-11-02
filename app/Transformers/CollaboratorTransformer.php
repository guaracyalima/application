<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Collaborator;

/**
 * Class CollaboratorTransformer
 * @package namespace App\Transformers;
 */
class CollaboratorTransformer extends TransformerAbstract
{

    /**
     * Transform the \Collaborator entity
     * @param \Collaborator $model
     *
     * @return array
     */
    public function transform(Collaborator $model)
    {
        return [
            'id'         => (int) $model->id,
            'usuario' => $model->user_id,
            'superior' => $model->candidate_id,
            'nome' => $model->name,
            'sobrenome' => $model->last_name,
            'apelido' => $model->nickname,
            'genero' => $model->genre,
            'aniversario' => $model->birth,
            'cpf' => $model->cpf,
            'rg' => $model->rg,
            'titulo_eleito' => $model->voter_title,
            'zona_votacao' => $model->zone_id,
            'secao' => $model->session_id,
            'endereco' => $model->address,
            'rua' => $model->stret,
            'bairro' => $model->neighborhood,
            'cep' => $model->cep,
            'codigo_ibge' => $model->ibge_code,
            'cidade' => $model->city,
            'estado' => $model->uf,
            'pais' => $model->country,
            'leads_propostos' => $model->proposed_leads,
            'estado_de_operacao' => $model->operation_state,
            'cidade_de_operacao' => $model->operation_city,
            'bairro_de_operacao' => $model->operation_neighborhoods,
            'interesses' => $model->interest,
            'faceboo' => $model->facebook,
            'twitter' => $model->twitter,
            'linkdin' => $model->linkdin,
            'instagram' => $model->instagram,
            'whatsapp' => $model->whatsapp,
            'skype' => $model->skype,
            'salario' => $model->salary,
            'observacoes' => $model->observation,
            'criado_por' => $model->created_by,
        ];
    }
}
