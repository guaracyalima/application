<?php

namespace App\Repositories;

use App\Presenters\RegionPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\RegionRepository;
use App\Entities\Region;
use App\Validators\RegionValidator;

/**
 * Class RegionRepositoryEloquent
 * @package namespace App\Repositories;
 */
class RegionRepositoryEloquent extends BaseRepository implements RegionRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Region::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return RegionValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

//    public function presenter()
//    {
//        return RegionPresenter::class;
//    }
}
