<?php
/**
 * Created by PhpStorm.
 * User: guabirabaDev
 * Date: 26/08/17
 * Time: 13:25
 */

namespace App\Services;


use App\Repositories\CandidateRepository;
use App\Repositories\SendmailRepository;
use App\Validators\CandidateValidator;
use App\Validators\SendmailValidator;
use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\Mail;

class SendmailService
{

    /**
     * @var SendmailRepository
     */
    private $repository;
    /**
     * @var SendmailValidator
     */
    private $validator;

    public function __construct(SendmailRepository $repository, SendmailValidator $validator)
    {

        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function all ($id)
    {
        return $this->repository->with (['user'])->findByField ('user_id', $id);
    }

    public function create(array $data)
    {
        try
        {
            $this->validator->with($data)->passesOrFail();
            return $this->repository->create($data);
//            Mail::send('mail.mail', [], function ($m) use ($data) {
//                $m->from($data['from'], 'Eleja-se');
//                $m->to($data['to'], 'guabirabaDev')->subject( $data['content']);
//            });

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