<?php

namespace App\Http\Controllers;

use App\Services\PlanService;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\PlanCreateRequest;
use App\Http\Requests\PlanUpdateRequest;
use App\Repositories\PlanRepository;
use App\Validators\PlanValidator;


class PlansController extends Controller
{

    /**
     * @var PlanRepository
     */
    protected $repository;

    /**
     * @var PlanValidator
     */
    protected $service;

    public function __construct(PlanRepository $repository, PlanService $service)
    {
        $this->repository = $repository;
        $this->service  = $service;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = $this->repository->paginate(3);
        return view('admin.plans.main', ['plans' => $plans]);
    }


    public function create()
    {
        return view('admin.plans.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  PlanCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $plan = $this->service->create($request->all());

        $response = [
            'message' => 'Plan created.',
            'data' => $plan->toArray(),
        ];

        return redirect()->route('plans');
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
        $plan = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $plan,
            ]);
        }

        return view('admin.plans.show', compact('plan'));
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

        $plan = $this->repository->find($id);

        return view('admin.plans.edit', compact('plan'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  PlanUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(PlanUpdateRequest $request, $id)
    {

        //try {

           // $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $plan = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Plan updated.',
                'data'    => $plan->toArray(),
            ];

//            if ($request->wantsJson()) {
//
//                return response()->json($response);
//            }

            return redirect()->back()->with('message', $response['message']);
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
       // }
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
                'message' => 'Plan deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Plan deleted.');
    }
}
