<?php
/**
 * Created by PhpStorm.
 * User: guabirabaDev
 * Date: 26/08/17
 * Time: 13:25
 */

namespace App\Services;


use App\Repositories\CandidateRepository;
use App\Repositories\RegionRepository;
use App\Repositories\StateRepository;
use App\Validators\CandidateValidator;
use App\Validators\RegionValidator;
use App\Validators\StateValidator;
use Dotenv\Exception\ValidationException;

class StateService
{


    /**
     * @var StateRepository
     */
    private $repository;
    /**
     * @var StateValidator
     */
    private $validator;

    public function __construct(StateRepository $repository, StateValidator $validator)
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
}