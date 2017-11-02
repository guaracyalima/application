<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\BrokenRepository;
use App\Entities\Broken;
use App\Validators\BrokenValidator;

/**
 * Class BrokenRepositoryEloquent
 * @package namespace App\Repositories;
 */
class BrokenRepositoryEloquent extends BaseRepository implements BrokenRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Broken::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return BrokenValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
