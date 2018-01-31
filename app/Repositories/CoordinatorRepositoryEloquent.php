<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\coordinatorRepository;
use App\Entities\Coordinator;
use App\Validators\CoordinatorValidator;

/**
 * Class CoordinatorRepositoryEloquent
 * @package namespace App\Repositories;
 */
class CoordinatorRepositoryEloquent extends BaseRepository implements CoordinatorRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Coordinator::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return CoordinatorValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
