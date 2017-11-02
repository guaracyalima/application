<?php

namespace App\Http\Controllers;

use App\Entities\User;
use App\Http\Requests\CandidateCreateRequest;
use App\Http\Requests\CandidateUpdateRequest;
use App\Repositories\BrokenRepository;
use App\Repositories\CandidateRepository;
use App\Repositories\EducationsRepository;
use App\Repositories\OccupationRepository;
use App\Repositories\PlanRepository;
use App\Repositories\SendmailRepository;
use App\Repositories\StateRepository;
use App\Services\CandidateService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


class CandidatesController extends Controller
{
    /**
     * @SWG\Info(title="Eleja-se - ERP de relacionamentos politicos", version="0.0.1")
     */

    /**
     * @var CandidateRepository instancia o CandidateRepositoryEloquente na variavel global respository
     */
    protected $repository;


    /**
     * @var CandidateService
     */
    private $service;
    /**
     * @var BrokenRepository
     */
    private $brokenRepository;
    /**
     * @var StateRepository
     */
    private $stateRepository;
    /**
     * @var OccupationRepository
     */
    private $occupationRepository;
    /**
     * @var EducationsRepository
     */
    private $educationsRepository;
    /**
     * @var PlanRepository
     */
    private $planRepository;
    /**
     * @var SendmailRepository
     */
    private $sendmailRepository;

    public function __construct(CandidateRepository $repository,
                                CandidateService $service,
                                BrokenRepository $brokenRepository,
                                StateRepository $stateRepository,
                                OccupationRepository $occupationRepository,
                                EducationsRepository $educationsRepository,
                                PlanRepository $planRepository,
                                SendmailRepository $sendmailRepository)
    {
        $this->repository = $repository;
        $this->service = $service;
        $this->brokenRepository = $brokenRepository;
        $this->stateRepository = $stateRepository;
        $this->occupationRepository = $occupationRepository;
        $this->educationsRepository = $educationsRepository;
        $this->planRepository = $planRepository;
        $this->sendmailRepository = $sendmailRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = $this->repository->paginate(10);
        //return response()->json($candidates);
        return view ('admin.peoples.candidates.main', ['candidates' => $candidates]);

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

    public function create (  )
    {
        $uf = $this->stateRepository->pluck('name', 'id');
        $education = $this->educationsRepository->pluck('description', 'id');
        $ocupation = $this->occupationRepository->pluck('name', 'id');
       $brokens = $this->brokenRepository->pluck('name', 'id')->all();
       $plan = $this->planRepository->pluck('name', 'id')->all();
        return view ('admin.peoples.candidates.create',
            [
                'brokens' => $brokens,
                'educations' => $education,
                'uf' => $uf,
                'occupations' => $ocupation,
                'plans' => $plan
            ]);
    }

    public function store(Request $request)
    {

        $data =  $request->all();

        $new_user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'remember_token' => str_random(10),
        ]);

        $id_user_off = collect(User::all())->last();
        $data['user_id'] = $id_user_off['id'];
        $data['created_by'] = Auth::user()->getAuthIdentifier();
        $candidate = $this->service->create($data);
        $response = [
            'message' => 'Candidate created.',
            'data' => $candidate
        ];

     return redirect()->route('candidates');

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
        $candidate = $this->repository->find($id);

        return view('admin.peoples.candidates.show', ['candidate' => $candidate]);

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

        $uf = $this->stateRepository->pluck('name', 'id');
        $education = $this->educationsRepository->pluck('description', 'id');
        $ocupation = $this->occupationRepository->pluck('name', 'id');
        $brokens = $this->brokenRepository->pluck('name', 'id')->all();
        $plan = $this->planRepository->pluck('name', 'id')->all();
        $candidate = $this->repository->find($id);

        return view('admin.peoples.candidates.edit', [
            'candidate' => $candidate,
            'brokens' => $brokens,
            'educations' => $education,
            'uf' => $uf,
            'occupations' => $ocupation,
            'plans' => $plan
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  CandidateUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {
            $data = $request->all();
            $candidate = $this->repository->update($request->all(), $id);
            $response = [
                'message' => 'Candidate updated.',
                'data' => $candidate
            ];

     return redirect()->route('candidates');
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
                'message' => 'Candidate deleted.',
                'deleted' => $deleted,
            ]);

    }
}
