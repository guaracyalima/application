<?php
/**
 * Created by PhpStorm.
 * User: guabirabadev
 * Date: 15/01/2018
 * Time: 23:15
 */

namespace App\Services;
use App\Http\Requests\teamCreateRequest;
use App\Http\Requests\teamUpdateRequest;
use App\Repositories\TeamRepository;
use App\Validators\TeamValidator;
use Prettus\Validator\Exceptions\ValidatorException;

class TeamService
{
    /**

     * @var TeamRepository
     */
    protected $repository;

    /**
     * @var TeamValidator
     */
    protected $validator;

    public function __construct(TeamRepository $repository, TeamValidator $validator)
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
        return $this->repository->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TeamCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TeamCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $team = $this->repository->create($request->all());

            $response = [
                'message' => 'Team created.',
                'data'    => $team->toArray(),
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
        return $this->repository->find($id);
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

        return $this->repository->find($id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  TeamUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(TeamUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $team = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Team updated.',
                'data'    => $team->toArray(),
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
                'message' => 'Team deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Team deleted.');
    }
}