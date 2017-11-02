<?php

namespace App\Presenters;

use App\Transformers\PackageTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PackagePresenter
 *
 * @package namespace App\Presenters;
 */
class PackagePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PackageTransformer();
    }
}
