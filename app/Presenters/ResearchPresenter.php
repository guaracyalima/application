<?php

namespace App\Presenters;

use App\Transformers\ResearchTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ResearchPresenter
 *
 * @package namespace App\Presenters;
 */
class ResearchPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ResearchTransformer();
    }
}
