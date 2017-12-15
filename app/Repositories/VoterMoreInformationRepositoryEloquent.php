<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\VoterMoreInformationRepository;
use App\Entities\VoterMoreInformation;
use App\Validators\VoterMoreInformationValidator;

/**
 * Class VoterMoreInformationRepositoryEloquent
 * @package namespace App\Repositories;
 */
class VoterMoreInformationRepositoryEloquent extends BaseRepository implements VoterMoreInformationRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return VoterMoreInformation::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return VoterMoreInformationValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
