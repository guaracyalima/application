<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ResearchRepository;
use App\Entities\Research;
use App\Validators\ResearchValidator;

/**
 * Class ResearchRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ResearchRepositoryEloquent extends BaseRepository implements ResearchRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Research::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ResearchValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
