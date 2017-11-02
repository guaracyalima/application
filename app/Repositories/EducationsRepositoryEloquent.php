<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\educationsRepository;
use App\Entities\Educations;
use App\Validators\EducationsValidator;

/**
 * Class EducationsRepositoryEloquent
 * @package namespace App\Repositories;
 */
class EducationsRepositoryEloquent extends BaseRepository implements EducationsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Educations::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return EducationsValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
