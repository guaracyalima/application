<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Sendmail;

/**
 * Class SendmailTransformer
 * @package namespace App\Transformers;
 */
class SendmailTransformer extends TransformerAbstract
{

    /**
     * Transform the \Sendmail entity
     * @param \Sendmail $model
     *
     * @return array
     */
    public function transform(Sendmail $model)
    {
        return [
            'id'         => (int) $model->id,
            'destinatario' => $model->from,
            'remetente' => $model->sender,
            'para' => $model->to,
            'corpo' => $model->content,
            'conteudo' => $model->cc,
            'bcc' => $model->bcc,
            'copia' => $model->replyTo,
            'subject' => $model->subject,
            'prioridade' => $model->priority,
            'anexo' => $model->attach,
            'anexos' => $model->attachData,
            'usuario_remetente' => $model->user_id
        ];
    }
}
