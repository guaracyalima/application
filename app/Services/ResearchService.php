<?php
/**
 * Created by PhpStorm.
 * User: guabirabadev
 * Date: 26/12/2017
 * Time: 11:20
 */

namespace App\Services;
use App\Repositories\ResearchRepository;
use App\Validators\ResearchValidator;

class ResearchService
{
    /**
     * @var ResearchRepository
     */
    private $repository;
    /**
     * @var ResearchValidator
     */
    private $validator;

    public function __construct ( ResearchRepository $repository,
                                  ResearchValidator $validator  )
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function index (  )
    {
        return $this->repository->with (['candidate', 'kreator'])->all ();
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

    public function supports_by_candidate ( $id )
    {
        return $this->repository->with (['candidate'])->findByField ('candidate_id', $id);
    }
}