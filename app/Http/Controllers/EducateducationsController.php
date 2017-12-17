<?php

namespace App\Http\Controllers;

use App\Services\EducationService;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\EducateducationCreateRequest;
use App\Http\Requests\EducateducationUpdateRequest;
use App\Repositories\EducateducationRepository;
use App\Validators\EducateducationValidator;


class EducateducationsController extends Controller
{

    /**
     * @var EducateducationRepository
     */
    protected $repository;

    /**
     * @var EducateducationValidator
     */
    protected $service;

    public function __construct(EducateducationRepository $repository, EducationService $service)
    {
        $this->repository = $repository;
        $this->validator  = $service;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $education = $this->repository->all();

        return response()->json($education);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EducateducationCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $candidate = $this->repository->create($request->all());
        $response = [
            'message' => 'Education created.',
            'data' => $candidate
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
        $educateducation = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $educateducation,
            ]);
        }

        return view('educateducations.show', compact('educateducation'));
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

        $educateducation = $this->repository->find($id);

        return response()->json($educateducation);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  EducateducationUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(EducateducationUpdateRequest $request, $id)
    {

//        try {
//
//            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);
//
//            $educateducation = $this->repository->update($request->all(), $id);
//
//            $response = [
//                'message' => 'Educateducation updated.',
//                'data'    => $educateducation->toArray(),
//            ];
//
//            if ($request->wantsJson()) {
//
//                return response()->json($response);
//            }
//
//            return redirect()->back()->with('message', $response['message']);
//        } catch (ValidatorException $e) {
//
//            if ($request->wantsJson()) {
//
//                return response()->json([
//                    'error'   => true,
//                    'message' => $e->getMessageBag()
//                ]);
//            }
//
//            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
//        }
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
                'message' => 'Educateducation deleted.',
                'deleted' => $deleted,
            ]);

    }
}
