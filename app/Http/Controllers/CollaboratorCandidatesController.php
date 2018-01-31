<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\CollaboratorCandidateCreateRequest;
use App\Http\Requests\CollaboratorCandidateUpdateRequest;
use App\Repositories\CollaboratorCandidateRepository;
use App\Validators\CollaboratorCandidateValidator;


class CollaboratorCandidatesController extends Controller
{

    /**
     * @var CollaboratorCandidateRepository
     */
    protected $repository;

    /**
     * @var CollaboratorCandidateValidator
     */
    protected $validator;

    public function __construct(CollaboratorCandidateRepository $repository, CollaboratorCandidateValidator $validator)
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
        $collaboratorCandidates = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $collaboratorCandidates,
            ]);
        }

        return view('collaboratorCandidates.index', compact('collaboratorCandidates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CollaboratorCandidateCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CollaboratorCandidateCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $collaboratorCandidate = $this->repository->create($request->all());

            $response = [
                'message' => 'CollaboratorCandidate created.',
                'data'    => $collaboratorCandidate->toArray(),
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
        $collaboratorCandidate = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $collaboratorCandidate,
            ]);
        }

        return view('collaboratorCandidates.show', compact('collaboratorCandidate'));
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

        $collaboratorCandidate = $this->repository->find($id);

        return view('collaboratorCandidates.edit', compact('collaboratorCandidate'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  CollaboratorCandidateUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(CollaboratorCandidateUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $collaboratorCandidate = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'CollaboratorCandidate updated.',
                'data'    => $collaboratorCandidate->toArray(),
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
                'message' => 'CollaboratorCandidate deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'CollaboratorCandidate deleted.');
    }
}
