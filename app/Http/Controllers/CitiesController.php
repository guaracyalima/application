<?php

namespace App\Http\Controllers;

use App\Repositories\StateRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\CityCreateRequest;
use App\Http\Requests\CityUpdateRequest;
use App\Repositories\CityRepository;
use App\Validators\CityValidator;


class CitiesController extends Controller
{

    /**
     * @var CityRepository
     */
    protected $repository;

    /**
     * @var CityValidator
     */
    protected $validator;
    /**
     * @var StateRepository
     */
    private $stateRepository;

    public function __construct(CityRepository $repository,
                                CityValidator $validator,
                                StateRepository $stateRepository)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->stateRepository = $stateRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $city = $this->repository->paginate(5);
        return view('admin.teritories.cities.main', ['cities' => $city]);
    }

    public function create()
    {
        $state = $this->stateRepository->pluck('initials', 'id');
        return view('admin.teritories.cities.create', ['state' => $state]);
    }

    public function store(CityCreateRequest $request)
    {

        $city = $this->repository->create($request->all());

        $response = [
            'message' => 'City created.',
            'data' => $city->toArray(),
        ];

        return redirect()->route('cities');
    }


    public function show($id)
    {
        $city = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $city,
            ]);
        }
        $state = $this->stateRepository->pluck('initials', 'id');
        return view('admin.teritories.cities.show', ['city' => $city, 'state' => $state]);
    }


    public function edit($id)
    {

        $city = $this->repository->find($id);

        $state = $this->stateRepository->pluck('initials', 'id');
        return view('admin.teritories.cities.edit', ['city' => $city, 'state' => $state]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  CityUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(CityUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $city = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'City updated.',
                'data'    => $city->toArray(),
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
                'message' => 'City deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'City deleted.');
    }
}
