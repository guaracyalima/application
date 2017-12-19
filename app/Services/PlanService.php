<?php
/**
 * Created by PhpStorm.
 * User: guabirabaDev
 * Date: 26/08/17
 * Time: 13:25
 */

namespace App\Services;


use App\Repositories\CandidateRepository;
use App\Repositories\PlanRepository;
use App\Repositories\VoterRepository;
use App\Validators\CandidateValidator;
use App\Validators\PlanValidator;
use App\Validators\VoterValidator;
use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\DB;

class PlanService
{

    /**
     * @var CandidateRepository
     */
    private $repository;
    /**
     * @var CandidateValidator
     */
    private $validator;

    public function __construct(PlanRepository $repository, PlanValidator $validator)
    {

        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function create(array $data)
    {
        try
        {
            $this->validator->with($data)->passesOrFail();
            return $this->repository->create($data);
        }
        catch (ValidationException $exception)
        {
            return [
              'error' => true,
              'message' => $exception->getMessage()
            ];
        }

    }

    public function update(array $data, $id)
    {
        try
        {
            $this->validator->with($data)->passesOrFail();
            return $this->repository->update($data, $id);
        }
        catch (ValidationException $exception)
        {
            return [
                'error' => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function plans_ids (  )
    {
        ///$pla = DB::table('plans')->select('id')->get()->toArray();

        return $this->repository->with (['candidate'])->all ();
    }
}
