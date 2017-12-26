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
            'destinate' => $model->from,
            'sender' => $model->sender,
            'to' => $model->to,
            'body' => $model->content,
            'content' => $model->cc,
            'bcc' => $model->bcc,
            'copy' => $model->replyTo,
            'subject' => $model->subject,
            'priority' => $model->priority,
            'attach' => $model->attach,
            'attachments' => $model->attachData,
            'user_sender' => $model->user_id,
            'created_at' => $model->created_at,
            'user' => $model->user
        ];
    }
}
