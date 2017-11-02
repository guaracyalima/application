<?php
/**
 * Created by PhpStorm.
 * User: guabirabaDev
 * Date: 26/08/17
 * Time: 13:25
 */

namespace App\Services;


use App\Repositories\CandidateRepository;
use App\Repositories\EducateducationRepository;
use App\Validators\CandidateValidator;
use Dotenv\Exception\ValidationException;

class EducationService
{


    /**
     * EducationService constructor.
     * @param EducateducationRepository $repository
     */
    public function __construct(EducateducationRepository $repository)
    {

        $this->repository = $repository;
    }

    public function create(array $data)
    {
        try
        {
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