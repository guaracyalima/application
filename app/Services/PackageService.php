<?php
/**
 * Created by PhpStorm.
 * User: guabirabaDev
 * Date: 26/08/17
 * Time: 13:25
 */

namespace App\Services;


use App\Repositories\CandidateRepository;
use App\Repositories\PackageRepository;
use App\Validators\CandidateValidator;
use App\Validators\PackageValidator;
use Dotenv\Exception\ValidationException;

class PackageService
{

    /**
     * @var PackageRepository
     */
    private $repository;
    /**
     * @var PackageValidator
     */
    private $validator;

    public function __construct(PackageRepository $repository, PackageValidator $validator)
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
