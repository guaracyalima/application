<?php

namespace App\Repositories;

use App\Presenters\VoterPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\VoterRepository;
use App\Entities\Voter;
use App\Validators\VoterValidator;

/**
 * Class VoterRepositoryEloquent
 * @package namespace App\Repositories;
 */
class VoterRepositoryEloquent extends BaseRepository implements VoterRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Voter::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return VoterValidator::class;
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
//        return VoterPresenter::class;
//    }
}
