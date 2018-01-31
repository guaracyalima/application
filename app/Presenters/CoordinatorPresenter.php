<?php

namespace App\Presenters;

use App\Transformers\CoordinatorTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CoordinatorPresenter
 *
 * @package namespace App\Presenters;
 */
class CoordinatorPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CoordinatorTransformer();
    }
}
