<?php

namespace App\Repositories;

use App\Presenters\SendmailPresenter;
use App\Transformers\SendmailTransformer;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\sendmailRepository;
use App\Entities\Sendmail;
use App\Validators\SendmailValidator;

/**
 * Class SendmailRepositoryEloquent
 * @package namespace App\Repositories;
 */
class SendmailRepositoryEloquent extends BaseRepository implements SendmailRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Sendmail::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return SendmailValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter()
    {
        return SendmailPresenter::class;
    }
}
