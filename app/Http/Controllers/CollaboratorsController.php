<?php

namespace App\Http\Controllers;

use App\Entities\Collaborator;
use App\Entities\User;
use App\Repositories\CandidateRepository;
use App\Repositories\CollaboratorCandidateRepository;
use App\Repositories\CoordinatorRepository;
use App\Repositories\EducateducationRepository;
use App\Repositories\EducationsRepository;
use App\Repositories\OccupationRepository;
use App\Repositories\StateRepository;
use App\Repositories\TeamRepository;
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
    /**
     * @var CollaboratorCandidateRepository
     */
    private $collaboratorCandidateRepository;
    /**
     * @var CoordinatorRepository
     */
    private $coordinatorRepository;
    /**
     * @var TeamRepository
     */
    private $teamRepository;

    public function __construct ( CollaboratorRepository $repository ,
                                  CollaboratorService $service ,
                                  StateRepository $stateRepository ,
                                  CandidateRepository $candidateRepository ,
                                  OccupationRepository $occupationRepository ,
                                  EducationsRepository $educationsRepository,
                                  CollaboratorCandidateRepository $collaboratorCandidateRepository,
                                  CoordinatorRepository $coordinatorRepository,
                                  TeamRepository $teamRepository)
    {
        $this->repository = $repository;
        $this->service = $service;
        $this->stateRepository = $stateRepository;
        $this->candidateRepository = $candidateRepository;
        $this->occupationRepository = $occupationRepository;
        $this->educationsRepository = $educationsRepository;
        $this->collaboratorCandidateRepository = $collaboratorCandidateRepository;
        $this->coordinatorRepository = $coordinatorRepository;
        $this->teamRepository = $teamRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ( $id )
    {
        return $this->service->index ( $id );
    }

    public function store ( Request $request )
    {

        $data = $request->all ();
        $new_user = User::create ( [
            'name' => $data[ 'name' ] ,
            'email' => $data[ 'email' ] ,
            'password' => bcrypt ( $data[ 'password' ] ) ,
            'type' => $data['type'],
            'remember_token' => str_random ( 10 ) ,
        ] );
        $id_user_off = collect ( User::all () )->last ();
        $data[ 'user_id' ] = $id_user_off[ 'id' ];
        $collaborator = $this->repository->create ( $data );
        $otherTable =[
            'candidate_id' => $data['candidate_id'],
            'collaborator_id' => $collaborator['id']
        ];
        $cu =$this->collaboratorCandidateRepository->create ($otherTable);
        $coordinator = [
            'collaborator_id' => $collaborator['id']
        ];

        if ( $data[ 'type' ] == 'coordinator' ) {
            $this->coordinatorRepository->create ($coordinator);
        }

        $is_coordinator = $this->is_coordinator ($data['created_by']);
        $team = [
            'candidate_id' => $data['candidate_id'],
            'collaborator_id' => $collaborator['id'],
            'description' => 'team of ' . $collaborator['id'],
            'raking_position' => '0',
        ];
//        if($is_coordinator > 1){
//            $this->teamRepository->create ($team);
//        }

        $response = [
            'message' => 'Collaborator has ben created.' ,
            'data' => $cu
        ];
        return response ()->json ( $response );#redirect()->route('colaborator');
    }

    public function show ( $id )
    {
        $collaborator = $this->repository->find ( $id );
        return response ()->json ( $collaborator );
    }

    public function update ( Request $request , $id )
    {
        $collaborator = $this->repository->update ( $request->all () , $id );
        $response = [
            'message' => 'Collaborator updated.' ,
            'data' => $collaborator
        ];
        return response ()->json ( $response );
    }

    public function destroy ( $id )
    {
        $deleted = $this->repository->delete ( $id );
        return response ()->json ( [
            'message' => 'Collaborator deleted.' ,
            'deleted' => $deleted ,
        ] );
    }

    public function my ( $id )
    {
        $my_collaborators = Collaborator::where ( 'candidate_id' , $id )
            ->orderBy ( 'id' , 'desc' )
            ->get ();
        return response ()->json ( $my_collaborators );
    }

    public function is_coordinator ( $id )
    {
        return $this->coordinatorRepository->find ($id);
    }
}
