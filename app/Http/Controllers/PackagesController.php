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


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $package = $this->repository->paginate(3);
        return view('admin.packages.main', ['packages' => $package]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PackageCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('admin.packages.create');
    }

    public function store(Request $request)
    {
        $package = $this->service->create($request->all());

        $response = [
            'message' => 'Candidate created.',
            'data' => $package->toArray(),
        ];

        return redirect()->route('packages');
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
        $package = $this->repository->find($id);

        return view('admin.packages.show', ['package' => $package]);
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

        $package = $this->repository->find($id);

        return view('admin.packages.edit', ['package' => $package]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  PackageUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(PackageUpdateRequest $request, $id)
    {

//        try {
//
//            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $package = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Package updated.',
                'data'    => $package->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
//        } catch (ValidatorException $e) {
//
//            if ($request->wantsJson()) {
//
//                return response()->json([
//                    'error'   => true,
//                    'message' => $e->getMessageBag()
//                ]);
//            }
//
//            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        //}
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
                'message' => 'Package deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Package deleted.');
    }
}
