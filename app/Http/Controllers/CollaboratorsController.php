<?php

namespace App\Http\Controllers;

use App\Entities\User;
use App\Repositories\CandidateRepository;
use App\Repositories\EducateducationRepository;
use App\Repositories\EducationsRepository;
use App\Repositories\OccupationRepository;
use App\Repositories\StateRepository;
use App\Services\CollaboratorService;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\CollaboratorCreateRequest;
use App\Http\Requests\CollaboratorUpdateRequest;
use App\Repositories\CollaboratorRepository;
use App\Validators\CollaboratorValidator;


class CollaboratorsController extends Controller
{

    /**
     * @var CollaboratorRepository
     */
    protected $repository;
    /**
     * @var CollaboratorService
     */
    private $service;
    /**
     * @var StateRepository
     */
    private $stateRepository;
    /**
     * @var CandidateRepository
     */
    private $candidateRepository;
    /**
     * @var OccupationRepository
     */
    private $occupationRepository;
    /**
     * @var EducationsRepository
     */
    private $educationsRepository;


    public function __construct(CollaboratorRepository $repository,
                                CollaboratorService $service,
                                StateRepository $stateRepository,
                                CandidateRepository $candidateRepository,
                                OccupationRepository $occupationRepository,
                                 EducationsRepository $educationsRepository)
    {
        $this->repository = $repository;
        $this->service = $service;
        $this->stateRepository = $stateRepository;
        $this->candidateRepository = $candidateRepository;
        $this->occupationRepository = $occupationRepository;
        $this->educationsRepository = $educationsRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collaborator = $this->repository->all();
        return response()->json($collaborator);
        //return view ('admin.peoples.colaborators.main', ['colaborator' => $collaborator]);
    }

    public function create (  )
    {
        $uf = $this->stateRepository->pluck('name', 'id');
        $candidate = $this->candidateRepository->pluck('name', 'id');
        $education = $this->educationsRepository->pluck('description', 'id');
        $ocupation = $this->occupationRepository->pluck('name', 'id');
        return view ('admin.peoples.colaborators.create', [
            'uf' => $uf,
            'candidate' => $candidate,
            'educations' => $education,
            'ocupations' => $ocupation]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  CollaboratorCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
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
        $data['created_by'] = 1; #Auth::user()->getAuthIdentifier();

        $candidate = $this->repository->create($data);

        $response = [
            'message' => 'Collaborator has ben created.',
            'data' => $candidate
        ];

        return response()->json($response);#redirect()->route('colaborator');
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
        $collaborator = $this->repository->find($id);
            return response()->json($collaborator);


        //return view('admin.peoples.colaborators.show', ['collaborator' => $collaborator]);
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

        // $uf = $this->stateRepository->pluck('name', 'id');
        // $candidate = $this->candidateRepository->pluck('name', 'id');
        // $education = $this->educationsRepository->pluck('description', 'id');
        // $ocupation = $this->occupationRepository->pluck('name', 'id');
        $collaborator = $this->repository->find($id);
        return response()->json($collaborator);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  CollaboratorUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {
            $collaborator = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Collaborator updated.',
                'data'    => $collaborator
            ];
            return response()->json($response);

     //return redirect()->route('colaborator');
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
               'message' => 'Collaborator deleted.',
               'deleted' => $deleted,
           ]);

        //return redirect()->back()->with('message', 'Collaborator deleted.');
        //return redirect()->route('colaborator');
    }
}
