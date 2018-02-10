<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\GamificationCreateRequest;
use App\Http\Requests\GamificationUpdateRequest;
use App\Repositories\GamificationRepository;
use App\Validators\GamificationValidator;


class GamificationsController extends Controller
{

    /**
     * @var GamificationRepository
     */
    protected $repository;

    /**
     * @var GamificationValidator
     */
    protected $validator;

    public function __construct(GamificationRepository $repository, GamificationValidator $validator)
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
        $gamifications = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $gamifications,
            ]);
        }

        return view('gamifications.index', compact('gamifications'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  GamificationCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(GamificationCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $gamification = $this->repository->create($request->all());

            $response = [
                'message' => 'Gamification created.',
                'data'    => $gamification->toArray(),
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
        $gamification = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $gamification,
            ]);
        }

        return view('gamifications.show', compact('gamification'));
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

        $gamification = $this->repository->find($id);

        return view('gamifications.edit', compact('gamification'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  GamificationUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(GamificationUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $gamification = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Gamification updated.',
                'data'    => $gamification->toArray(),
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
                'message' => 'Gamification deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Gamification deleted.');
    }
}
