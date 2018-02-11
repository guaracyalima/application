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
            Mail::raw ( $data['content'] , function ( $message) use ($data) {
                $message->subject ( $data['subject']);
                $message->from ( 'no-reply@website_name.com' , 'Pererecao' );
                $message->to ($data['to']);
            } );
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

    public function show ( $id )
    {
        return $this->repository->find ($id);
    }

    public function collaborator_messages ( $id )
    {
        return $this->repository->findByField ('user_id', $id);
    }
}