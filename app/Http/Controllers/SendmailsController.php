<?php

namespace App\Http\Controllers;

use App\Services\SendmailService;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Mail;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\SendmailCreateRequest;
use App\Http\Requests\SendmailUpdateRequest;
use App\Repositories\SendmailRepository;
use App\Validators\SendmailValidator;

class SendmailsController extends Controller
{
    /**
     * @var SendmailRepository
     */
    private $repository;
    /**
     * @var SendmailService
     */
    private $service;

    public function __construct ( SendmailRepository $repository , SendmailService $service )
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ( $id )
    {
        return $this->service->all ( $id );

    }

    public function store ( Request $request )
    {
        return $this->service->create ( $request->all () );
    }

    public function show ( $id )
    {
        return $this->service->show ( $id );
    }

    public function destroy ( $id )
    {
        $deleted = $this->repository->delete ( $id );
        return response ()->json ( [
            'message' => 'Sendmail deleted.' ,
            'deleted' => $deleted ,
        ] );

    }

    public function inbox ( $email )
    {
        return $this->service->inbox ($email);
    }
}
