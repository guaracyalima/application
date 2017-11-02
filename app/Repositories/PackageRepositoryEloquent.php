<?php

namespace App\Repositories;

use App\Presenters\PackagePresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\packageRepository;
use App\Entities\Package;
use App\Validators\PackageValidator;

/**
 * Class PackageRepositoryEloquent
 * @package namespace App\Repositories;
 */
class PackageRepositoryEloquent extends BaseRepository implements PackageRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Package::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return PackageValidator::class;
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
//        return PackagePresenter::class;
//    }
}
