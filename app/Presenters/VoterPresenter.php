<?php

namespace App\Presenters;

use App\Transformers\VoterTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class VoterPresenter
 *
 * @package namespace App\Presenters;
 */
class VoterPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new VoterTransformer();
    }
}
