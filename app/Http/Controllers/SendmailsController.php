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
    public function index()
    {
        $sendmail = $this->repository->all();
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
        $data = $request->all();
        $nada = '0';

        $data['sender'] = $nada;
        $data['from'] = $data['from'];
        $data['to'] = $data['to'];
        $data['content'] = $data['content'];
        $data['cc'] = $nada;
        $data['bcc'] = $nada;
        $data['replyTo'] = $nada;
        $data['subject'] = $nada;
        $data['priority'] = $nada;
        $data['attach'] = $nada;
        $data['attachData'] = $nada;
        $data['user_id'] = rand(1, 2);

        $sendmail = $this->service->create($data);

        $response = [
            'message' => 'Candidate created.',
            'data' => $sendmail
        ];

        Mail::send('mail.mail', [], function ($m) use ($data) {
            $m->from($data['from'], 'Eleja-se');
            $m->to($data['to'], 'guabirabaDev')->subject( $data['content']);
        });

        return response()->json($response);
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
        $sendmail = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $sendmail,
            ]);
        }

        return view('sendmails.show', compact('sendmail'));
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
