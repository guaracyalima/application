<?php

namespace App\Http\Controllers;

use App\Http\Requests\CandidateCreateRequest;
use App\Http\Requests\CandidateUpdateRequest;
use App\Repositories\CandidateRepository;
use App\Repositories\UserRepository;
use App\Services\CandidateService;
use App\Services\CollaboratorService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


class UsersController extends Controller
{
    /**
     * @SWG\Info(title="Eleja-se - ERP de relacionamentos politicos", version="0.0.1")
     */

    /**
     * @var CandidateRepository instancia o CandidateRepositoryEloquente na variavel global respository
     */
    protected $repository;


    /**
     * @var UserService
     */
    private $service;
    /**
     * @var CollaboratorService
     */
    private $collaboratorService;
    /**
     * @var CandidateService
     */
    private $candidateService;

    public function __construct(UserRepository $repository,
                                UserService $service,
                                CollaboratorService $collaboratorService,
                                CandidateService $candidateService)
    {
        $this->repository = $repository;
        $this->service = $service;
        $this->collaboratorService = $collaboratorService;
        $this->candidateService = $candidateService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->repository->paginate(5);
        return response()->json($users);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CandidateCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * @SWG\Post(
     *              path="/api/candidates",
     *              @SWG\Parameter(
     *                  name="body", in="body", required=true,
     *              @SWG\Schema(
     *                 @SWG\Property(property="name", type="string"),
     *                 @SWG\Property(property="idade", type="string"),
     *              )
     *  ),
     *     @SWG\Response(response="200", description="Requisitar token JWT"),
     * )
     *
     *
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $users = $this->service->create($data);
        $response = [
            'message' => 'User created.',
            'data' => $users
        ];

//        Mail::send('mail.mail', [], function ($m) use ($data) {
//           $m->from('guaracyaraujolima@gmail.com', 'Eleja-se');
//           $m->to($data['email'], 'guabirabaDev')->subject('Bem vindo ao eleja-se');
//        });

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
        $user = $this->repository->find($id)->toArray();
        switch ($user['type'])
        {
            case 'comon':
                return $user;
                break;
            case 'root':
                return $user;
                break;
            case 'candidate':
                return $this->candidateService->me ($user['id']);
                break;
            case 'collaborator':
                return response ()->json($this->collaboratorService->me ($user['id']));
                break;
            default:
                return $user;
        };

        //return response()->json($user);

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

        $candidate = $this->repository->find($id);

        return view('candidates.edit', compact('candidate'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  CandidateUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     */
    public function update(CandidateUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $candidate = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Candidate updated.',
                'data' => $candidate->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error' => true,
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
                'message' => 'Candidate deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Candidate deleted.');
    }
}
