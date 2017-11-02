<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\EducateducationRepository;
use App\Entities\Educateducation;
use App\Validators\EducateducationValidator;

/**
 * Class EducateducationRepositoryEloquent
 * @package namespace App\Repositories;
 */
class EducateducationRepositoryEloquent extends BaseRepository implements EducateducationRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Educateducation::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
