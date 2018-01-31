<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ProjectFileCreateRequest;
use App\Http\Requests\ProjectFileUpdateRequest;
use App\Repositories\ProjectFileRepository;
use App\Validators\ProjectFileValidator;


class ProjectFilesController extends Controller
{

    /**
     * @var ProjectFileRepository
     */
    protected $repository;

    /**
     * @var ProjectFileValidator
     */
    protected $validator;

    public function __construct(ProjectFileRepository $repository, ProjectFileValidator $validator)
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
        $projectFiles = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $projectFiles,
            ]);
        }

        return view('projectFiles.index', compact('projectFiles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProjectFileCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectFileCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $projectFile = $this->repository->create($request->all());

            $response = [
                'message' => 'ProjectFile created.',
                'data'    => $projectFile->toArray(),
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
        $projectFile = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $projectFile,
            ]);
        }

        return view('projectFiles.show', compact('projectFile'));
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

        $projectFile = $this->repository->find($id);

        return view('projectFiles.edit', compact('projectFile'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ProjectFileUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(ProjectFileUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $projectFile = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'ProjectFile updated.',
                'data'    => $projectFile->toArray(),
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
                'message' => 'ProjectFile deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'ProjectFile deleted.');
    }
}
