<?php

namespace App\Presenters;

use App\Transformers\VoterMoreInformationTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class VoterMoreInformationPresenter
 *
 * @package namespace App\Presenters;
 */
class VoterMoreInformationPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new VoterMoreInformationTransformer();
    }
}
