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

    public function __construct(SendmailRepository $repository, SendmailService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $sendmail = $this->service->all ($id);
        return response()->json($sendmail);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SendmailCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->service->create($request->all ());
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->service->show ($id);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $sendmail = $this->repository->find($id);

        return view('sendmails.edit', compact('sendmail'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  SendmailUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(SendmailUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $sendmail = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Sendmail updated.',
                'data'    => $sendmail->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Sendmail deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Sendmail deleted.');
    }
}
