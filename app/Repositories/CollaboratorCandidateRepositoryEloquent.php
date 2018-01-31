<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CollaboratorCandidateRepository;
use App\Entities\CollaboratorCandidate;
use App\Validators\CollaboratorCandidateValidator;

/**
 * Class CollaboratorCandidateRepositoryEloquent
 * @package namespace App\Repositories;
 */
class CollaboratorCandidateRepositoryEloquent extends BaseRepository implements CollaboratorCandidateRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CollaboratorCandidate::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return CollaboratorCandidateValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
