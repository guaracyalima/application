<?php
/**
 * Created by PhpStorm.
 * User: guabirabaDev
 * Date: 26/08/17
 * Time: 13:25
 */

namespace App\Services;


use App\Repositories\CandidateRepository;
use App\Validators\CandidateValidator;
use Dotenv\Exception\ValidationException;

class CandidateService
{

    /**
     * @var CandidateRepository
     */
    private $repository;
    /**
     * @var CandidateValidator
     */
    private $validator;
    /**
     * @var PlanService
     */
    private $planService;

    public function __construct(CandidateRepository $repository,
                                CandidateValidator $validator,
                                PlanService $planService)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->planService = $planService;
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

    public function update(array $data)
    {
        try
        {
            $this->validator->with($data)->passesOrFail();
            return $this->repository->update($data);
        }
        catch (ValidationException $exception)
        {
            return [
                'error' => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function number_of_candidates (  )
    {
        return count ($this->repository->all ()->toArray());
    }

    public function number_of_candidades_per_plans (  )
    {
        $plans= $this->planService->plans_ids ();
        foreach ($plans as $item)
        {
            $x = $item->id;
        }

        $range_is = range (1, $x);

        return count ($this->repository->findWhereIn ('plan_id', [$range_is]));
    }


}