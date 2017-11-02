<?php

namespace App\Presenters;

use App\Transformers\SendmailTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class SendmailPresenter
 *
 * @package namespace App\Presenters;
 */
class SendmailPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new SendmailTransformer();
    }
}
