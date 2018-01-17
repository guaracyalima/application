<?php
/**
 * Created by PhpStorm.
 * User: guabirabaDev
 * Date: 26/08/17
 * Time: 13:25
 */

namespace App\Services;

use App\Repositories\CandidateRepository;
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

    /**
     * @var CandidateRepository
     */
    private $candidateRepository;

    public function __construct(CollaboratorRepository $repository,
                                CollaboratorValidator $validator, CandidateRepository $candidateRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->candidateRepository = $candidateRepository;
    }

    public function index ( $id )
    {
        $pereba =  $this->candidateRepository->findByField ('user_id', $id)->toArray();
        foreach ($pereba as $item )
        {
            $od = $item['id'];
        }
        return $this->repository->with (['candidate', 'education', 'occupation'])->findByField ('candidate_id', $od);
    }

    public function all (  )
    {
        return $this->repository->with (['candidate'])->all ();
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

    public function me ( $id )
    {
        return $this->repository->with (['user', 'candidate', 'education', 'occupation'])->findByField ('candidate_id', $id)->toArray();
    }
}