<?php

namespace App\Presenters;

use App\Transformers\EducationsTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class EducationsPresenter
 *
 * @package namespace App\Presenters;
 */
class EducationsPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new EducationsTransformer();
    }
}
