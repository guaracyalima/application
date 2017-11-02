<?php

namespace App\Presenters;

use App\Transformers\EducateducationTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class EducateducationPresenter
 *
 * @package namespace App\Presenters;
 */
class EducateducationPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new EducateducationTransformer();
    }
}
