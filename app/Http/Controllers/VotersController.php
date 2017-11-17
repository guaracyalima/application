<?php

namespace App\Http\Controllers;

use App\Repositories\EducationsRepository;
use App\Repositories\OccupationRepository;
use App\Repositories\StateRepository;
use App\Services\VoterService;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\VoterCreateRequest;
use App\Http\Requests\VoterUpdateRequest;
use App\Repositories\VoterRepository;
use App\Validators\VoterValidator;


class VotersController extends Controller
{

    /**
     * @var VoterRepository
     */
    protected $repository;

    /**
     * @var VoterService
     */
    private $service;
    /**
     * @var StateRepository
     */
    private $stateRepository;
    /**
     * @var EducationsRepository
     */
    private $educationsRepository;
    /**
     * @var OccupationRepository
     */
    private $occupationRepository;

    public function __construct(VoterRepository $repository,
                                VoterService $service,
                                StateRepository $stateRepository,
                                EducationsRepository $educationsRepository,
                                OccupationRepository $occupationRepository)
    {
        $this->repository = $repository;
        $this->service = $service;
        $this->stateRepository = $stateRepository;
        $this->educationsRepository = $educationsRepository;
        $this->occupationRepository = $occupationRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voters = $this->repository->all();
        return response()->json($voters);

        //return view ('admin.peoples.voters.main', ['voters' => $voters]);
    }

    public function create()
    {
        $uf = $this->stateRepository->pluck('name', 'id');
        $education = $this->educationsRepository->pluck('description', 'id');
        $ocupation = $this->occupationRepository->pluck('name', 'id');
        return view ('admin.peoples.voters.create',
            [
                'educations' => $education,
                'uf' => $uf,
                'occupations' => $ocupation,
            ]);
    }

    /**
     * @SWG\Post(
     *              path="/api/voters",
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

        $data =  $request->all();
        $data['created_by'] = 1;#Auth::user()->getAuthIdentifier();
        $candidate = $this->service->create($data);

        $response = [
            'message' => 'Voter created.',
            'data' => $candidate->toArray(),
        ];

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
        $voter = $this->repository->find($id);
        return response()->json($voter);
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

        $voter = $this->repository->find($id);
        $education = $this->educationsRepository->pluck('description', 'id');
     $ocupation = $this->occupationRepository->pluck('name', 'id');
     $uf = $this->stateRepository->pluck('name', 'id');
        return view('admin.peoples.voters.edit', [
            'voter' => $voter,
            'educations' => $education,
            'occupations' => $ocupation,
         'uf' => $uf
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  VoterUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(VoterUpdateRequest $request, $id)
    {


            $voter = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Voter updated.',
                'data'    => $voter->toArray(),
            ];

          return response()->json($response);
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
                'message' => 'Voter deleted.',
                'deleted' => $deleted,
            ]);



    }
}
