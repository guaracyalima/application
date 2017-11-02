<?php

namespace App\Presenters;

use App\Transformers\BrokenTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class BrokenPresenter
 *
 * @package namespace App\Presenters;
 */
class BrokenPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BrokenTransformer();
    }
}
