<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\EducationsCreateRequest;
use App\Http\Requests\EducationsUpdateRequest;
use App\Repositories\EducationsRepository;
use App\Validators\EducationsValidator;


class EducationsController extends Controller
{


    protected $repository;
    protected $validator;

    public function __construct(EducationsRepository $repository, EducationsValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    public function index()
    {
        $educations = $this->repository->paginate(10);
       // return response()->json($educations);

        //return view('educations.index', compact('educations'));
	// $educations = $this->repository->paginate(5);

        //if (request()->wantsJson()) {

            //return response()->json(
              // $educations
            //);
        //}
        return view('admin.educations.main', ['educations' => $educations]);
    }

    public function create()
    {
        return view('admin.educations.create');
//>>>>>>> 4e54871b73fe2cb6b2eb98e4fc9ec8123c502204
    }

    public function store(EducationsCreateRequest $request)
    {

            $education = $this->repository->create($request->all());

            $response = [
                'message' => 'Educations created.',
                'data'    => $education->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);

    }



    public function show($id)
    {
        $education = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $education,
            ]);
        }

        return view('educations.show', compact('education'));
    }


    public function edit($id)
    {

        $education = $this->repository->find($id);

        return view('admin.educations.edit', ['education' => $education]);
    }

    public function update(EducationsUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $education = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Educations updated.',
                'data'    => $education->toArray(),
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

    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Educations deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Educations deleted.');
    }
}
