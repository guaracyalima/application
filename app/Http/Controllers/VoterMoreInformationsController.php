<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\VoterMoreInformationCreateRequest;
use App\Http\Requests\VoterMoreInformationUpdateRequest;
use App\Repositories\VoterMoreInformationRepository;
use App\Validators\VoterMoreInformationValidator;


class VoterMoreInformationsController extends Controller
{

    /**
     * @var VoterMoreInformationRepository
     */
    protected $repository;

    /**
     * @var VoterMoreInformationValidator
     */
    protected $validator;

    public function __construct(VoterMoreInformationRepository $repository, VoterMoreInformationValidator $validator)
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
        $voterMoreInformations = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $voterMoreInformations,
            ]);
        }

        return view('voterMoreInformations.index', compact('voterMoreInformations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  VoterMoreInformationCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(VoterMoreInformationCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $voterMoreInformation = $this->repository->create($request->all());

            $response = [
                'message' => 'VoterMoreInformation created.',
                'data'    => $voterMoreInformation->toArray(),
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
        $voterMoreInformation = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $voterMoreInformation,
            ]);
        }

        return view('voterMoreInformations.show', compact('voterMoreInformation'));
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

        $voterMoreInformation = $this->repository->find($id);

        return view('voterMoreInformations.edit', compact('voterMoreInformation'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  VoterMoreInformationUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(VoterMoreInformationUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $voterMoreInformation = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'VoterMoreInformation updated.',
                'data'    => $voterMoreInformation->toArray(),
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
                'message' => 'VoterMoreInformation deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'VoterMoreInformation deleted.');
    }
}
