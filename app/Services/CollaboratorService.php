<?php
/**
 * Created by PhpStorm.
 * User: guabirabaDev
 * Date: 26/08/17
 * Time: 13:25
 */

namespace App\Services;

use App\Repositories\CollaboratorRepository;
use App\Validators\CollaboratorValidator;
use Dotenv\Exception\ValidationException;

class CollaboratorService
{

    /**
     * @var CollaboratorRepository
     */
    private $repository;
    /**
     * @var CollaboratorValidator
     */

    private $validator;


    public function __construct(CollaboratorRepository $repository,
                                CollaboratorValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function all (  )
    {
        return $this->repository->all ();
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