<?php

namespace App\Http\Controllers;

use App\Services\RegionService;
use Illuminate\Http\Request;
use App\Http\Requests\RegionUpdateRequest;
use App\Repositories\RegionRepository;

class RegionsController extends Controller
{

    /**
     * @var RegionRepository
     */
    protected $repository;
    /**
     * @var RegionService
     */
    private $service;


    public function __construct(RegionRepository $repository, RegionService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->repository->all();
        return response()->json($data);
    }

    public function store(Request $request)
    {

        $region = $this->service->create($request->all());

        $response = [
            'message' => 'Region created.',
            'data' => $region->toArray(),
        ];

        return $response;
    }


    public function show($id)
    {
        $region = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $region,
            ]);
        }

        return view('teritories.show', compact('region'));
    }


    public function edit($id)
    {

        $region = $this->repository->find($id);

        return view('admin.teritories.regions.edit', ['region' => $region]);
    }


    public function update(RegionUpdateRequest $request, $id)
    {



            $region = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Region updated.',
                'data'    => $region->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);

    }


    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Region deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Region deleted.');
    }
}
