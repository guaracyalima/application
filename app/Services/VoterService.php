<?php
/**
 * Created by PhpStorm.
 * User: guabirabaDev
 * Date: 26/08/17
 * Time: 13:25
 */

namespace App\Services;


use App\Repositories\CandidateRepository;
use App\Repositories\VoterRepository;
use App\Validators\CandidateValidator;
use App\Validators\VoterValidator;
use Dotenv\Exception\ValidationException;

class VoterService
{

    /**
     * @var CandidateRepository
     */
    private $repository;
    /**
     * @var CandidateValidator
     */
    private $validator;

    public function __construct(VoterRepository $repository, VoterValidator $validator)
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
            $now_year_is = date('Y');
            $birth_year = substr($data['birth'], -4);
            $data['age'] = $now_year_is - $birth_year;
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

    public function voters_with_email (  )
    {
        return $this->repository->findWhereNotIn ('email', [' '])->toArray();
    }

    public function voters_female (  )
    {
        return $this->repository->findByField ('genre', 'female');
    }

    public function voters_man (  )
    {
        return $this->repository->findByField ('genre', 'H');
    }

    public function agetoage ( array $data )
    {
        return $this->repository->findWhereIn ('age', [$data['agemin'], $data['agemax']]);
    }
}