<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Package;

/**
 * Class PackageTransformer
 * @package namespace App\Transformers;
 */
class PackageTransformer extends TransformerAbstract
{

    /**
     * Transform the \Package entity
     * @param \Package $model
     *
     * @return array
     */
    public function transform(Package $model)
    {
        return [
            'id'         => (int) $model->id,
            'quantidade_sms'=> $model-> sms,
            'quantidade_email_marketing'=> $model-> mails,
            'preco'=> $model-> price,
            'tempo_de_expiracao'=> $model-> time_to_expiration,
            'data_de_expiracao'=> $model-> date_of_expiration
        ];
    }
}
