<?php
/**
 * Created by PhpStorm.
 * User: guabirabaDev
 * Date: 26/08/17
 * Time: 13:25
 */

namespace App\Services;

use App\Repositories\CandidateRepository;
use App\Repositories\CollaboratorCandidateRepository;
use App\Repositories\CollaboratorRepository;
use App\Repositories\CoordinatorRepository;
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
    /**
     * @var CollaboratorCandidateRepository
     */
    private $collaboratorCandidateRepository;
    /**
     * @var CoordinatorRepository
     */
    private $coordinatorRepository;

    public function __construct(CollaboratorRepository $repository,
                                CollaboratorValidator $validator,
                                CandidateRepository $candidateRepository,
                                CollaboratorCandidateRepository $collaboratorCandidateRepository,
                                CoordinatorRepository $coordinatorRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->candidateRepository = $candidateRepository;
        $this->collaboratorCandidateRepository = $collaboratorCandidateRepository;
        $this->coordinatorRepository = $coordinatorRepository;
    }

    public function index ( $id )
    {
        return $this->repository->with (['candidate', 'education', 'occupation'])->findByField ('candidate_id', $id);
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
            $x = $this->repository->create($data);
            return $x['id'];
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

    public function meta ( $id )
    {
        return $this->repository->find ($id);
    }
}