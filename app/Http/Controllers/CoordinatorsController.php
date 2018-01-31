<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\CoordinatorCreateRequest;
use App\Http\Requests\CoordinatorUpdateRequest;
use App\Repositories\CoordinatorRepository;
use App\Validators\CoordinatorValidator;


class CoordinatorsController extends Controller
{

    /**
     * @var CoordinatorRepository
     */
    protected $repository;

    /**
     * @var CoordinatorValidator
     */
    protected $validator;

    public function __construct(CoordinatorRepository $repository, CoordinatorValidator $validator)
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
        $coordinators = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $coordinators,
            ]);
        }

        return view('coordinators.index', compact('coordinators'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CoordinatorCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CoordinatorCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $coordinator = $this->repository->create($request->all());

            $response = [
                'message' => 'Coordinator created.',
                'data'    => $coordinator->toArray(),
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
        $coordinator = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $coordinator,
            ]);
        }

        return view('coordinators.show', compact('coordinator'));
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

        $coordinator = $this->repository->find($id);

        return view('coordinators.edit', compact('coordinator'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  CoordinatorUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(CoordinatorUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $coordinator = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Coordinator updated.',
                'data'    => $coordinator->toArray(),
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
                'message' => 'Coordinator deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Coordinator deleted.');
    }
}
