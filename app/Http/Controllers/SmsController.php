<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\SmsCreateRequest;
use App\Http\Requests\SmsUpdateRequest;
use App\Repositories\SmsRepository;
use App\Validators\SmsValidator;
use Twilio\Rest\Client;

class SmsController extends Controller
{

    /**
     * @var SmsRepository
     */
    protected $repository;

    /**
     * @var SmsValidator
     */
    protected $validator;

    public function __construct(SmsRepository $repository,
                                SmsValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $sms = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $sms,
            ]);
        }

        return view('sms.index', compact('sms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SmsCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(SmsCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $sm = $this->repository->create($request->all());



            $response = [
                'message' => 'Sms created.',
                'data'    => $sm->toArray(),
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
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sm = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $sm,
            ]);
        }

        return view('sms.show', compact('sm'));
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

        $sm = $this->repository->find($id);

        return view('sms.edit', compact('sm'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  SmsUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(SmsUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $sm = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Sms updated.',
                'data'    => $sm->toArray(),
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
                'message' => 'Sms deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Sms deleted.');
    }

    public function new_message_test (  )
    {
        $sid = "AC8d77cb1425df608e29ca46a1619386e3"; // Your Account SID from www.twilio.com/console
        $token = "4e9b74993bc6e8e1eb4db25eda4950b7"; // Your Auth Token from www.twilio.com/console

        $client = new Client($sid, $token);
        $message = $client->messages->create(
            '+15557778888', // Text this number
            array(
                'from' => '+55 61 9629-1384', // From a valid Twilio number
                'body' => 'Hello from Twilio!'
            )
        );

        print $message->sid;
    }
}
