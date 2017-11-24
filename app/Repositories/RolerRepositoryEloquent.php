<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\RolerRepository;
use App\Entities\Roler;
use App\Validators\RolerValidator;

/**
 * Class RolerRepositoryEloquent
 * @package namespace App\Repositories;
 */
class RolerRepositoryEloquent extends BaseRepository implements RolerRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Roler::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
