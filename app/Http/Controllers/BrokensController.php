<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\BrokenCreateRequest;
use App\Http\Requests\BrokenUpdateRequest;
use App\Repositories\BrokenRepository;
use App\Validators\BrokenValidator;


class BrokensController extends Controller
{

    /**
     * @var BrokenRepository
     */
    protected $repository;

    /**
     * @var BrokenValidator
     */
    protected $validator;

    public function __construct(BrokenRepository $repository, BrokenValidator $validator)
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
        //$this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $brokens = $this->repository->all();

        //if (request()->wantsJson()) {

            return response()->json($brokens);
        //}

        //return view('brokens.index', compact('brokens'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BrokenCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(BrokenCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $broken = $this->repository->create($request->all());

            $response = [
                'message' => 'Broken created.',
                'data'    => $broken->toArray(),
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
        $broken = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $broken,
            ]);
        }

        return view('brokens.show', compact('broken'));
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

        $broken = $this->repository->find($id);

        return view('brokens.edit', compact('broken'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  BrokenUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(BrokenUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $broken = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Broken updated.',
                'data'    => $broken->toArray(),
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
                'message' => 'Broken deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Broken deleted.');
    }
}
