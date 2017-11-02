<?php

namespace App\Http\Controllers;

use App\Entities\Region;
use App\Repositories\RegionRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\StateCreateRequest;
use App\Http\Requests\StateUpdateRequest;
use App\Repositories\StateRepository;
use App\Validators\StateValidator;


class StatesController extends Controller
{

    /**
     * @var StateRepository
     */
    protected $repository;

    /**
     * @var StateValidator
     */
    protected $validator;
    /**
     * @var RegionRepository
     */
    private $regionRepository;

    public function __construct(StateRepository $repository,
                                StateValidator $validator,
                                RegionRepository $regionRepository)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->regionRepository = $regionRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $state = $this->repository->paginate(10);
        //return response()->json($state);

//        $state = $this->repository->paginate(5);
     return view('admin.teritories.states.main', ['states' => $state]);
    }

    public function create()
    {
        $regions = $this->regionRepository->pluck('initials', 'id');
//        return view('admin.teritories.states.create', ['regions' => $regions]);
    }

    public function store(Request $request)
    {

        $state = $this->service->create($request->all());

        $response = [
            'message' => 'State created.',
            'data' => $state->toArray(),
        ];

        return $response;
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
        $state = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $state,
            ]);
        }

        return view('states.show', compact('state'));
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

        $state = $this->repository->find($id);

        return view('states.edit', compact('state'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  StateUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(StateUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $state = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'State updated.',
                'data'    => $state->toArray(),
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
                'message' => 'State deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'State deleted.');
    }
}
