<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\RolerCreateRequest;
use App\Http\Requests\RolerUpdateRequest;
use App\Repositories\RolerRepository;
use App\Validators\RolerValidator;


class RolersController extends Controller
{

    /**
     * @var RolerRepository
     */
    protected $repository;


    public function __construct(RolerRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $rolers = $this->repository->all();

        return response()->json($rolers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  RolerCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(RolerCreateRequest $request)
    {
            //$this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $roler = $this->repository->create($request->all());

            $response = [
                'message' => 'Roler created.',
                'data'    => $roler->toArray(),
            ];



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
        $roler = $this->repository->find($id);



            return response()->json([
                'data' => $roler,
            ]);



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
        return $roler = $this->repository->find($id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  RolerUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(RolerUpdateRequest $request, $id)
    {

            $roler = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Roler updated.',
                'data'    => $roler->toArray(),
            ];

                return response()->json($response);

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
            return response()->json([
                'message' => 'Roler deleted.',
                'deleted' => $deleted,
            ]);
    }
}
