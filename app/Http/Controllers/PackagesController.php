<?php

namespace App\Http\Controllers;

use App\Services\PackageService;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\PackageCreateRequest;
use App\Http\Requests\PackageUpdateRequest;
use App\Repositories\PackageRepository;
use App\Validators\PackageValidator;


class PackagesController extends Controller
{

    /**
     * @var PackageRepository
     */
    private $repository;
    /**
     * @var PackageService
     */
    private $service;

    public function __construct(PackageRepository $repository, PackageService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    public function index()
    {
        $package = $this->repository->all();
        return response()->json($package);
    }


    public function store(Request $request)
    {
      
        $package = $this->service->create($request->all());
        $response = [
            'message' => 'Package has been  created.',
            'data' => $package->toArray(),
        ];

        return response()->json($response);
    }

    public function show($id)
    {
        $package = $this->repository->find($id);

        return response()->json($package);
    }

    public function update(Request $request, $id)
    {
        $response_to_update = $this->service->update($request->all(), $id);
        return [
          'message' => 'package has been updated',
          'data' => $response_to_update->toArray()
        ];
    }

    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Package deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Package deleted.');
    }
}
