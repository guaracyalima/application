<?php

namespace App\Presenters;

use App\Transformers\CollaboratorCandidateTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CollaboratorCandidatePresenter
 *
 * @package namespace App\Presenters;
 */
class CollaboratorCandidatePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CollaboratorCandidateTransformer();
    }
}
