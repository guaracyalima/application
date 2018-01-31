<?php

namespace App\Http\Controllers;

use Cielo\API30\Environment;
use Cielo\API30\Merchant;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\BillingCreateRequest;
use App\Http\Requests\BillingUpdateRequest;
use App\Repositories\BillingRepository;
use App\Validators\BillingValidator;


class BillingsController extends Controller
{

    /**
     * @var BillingRepository
     */
    protected $repository;

    /**
     * @var BillingValidator
     */
    protected $validator;

    public function __construct(BillingRepository $repository, BillingValidator $validator)
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
        $billings = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $billings,
            ]);
        }

        return view('billings.index', compact('billings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BillingCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(BillingCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $billing = $this->repository->create($request->all());

            $response = [
                'message' => 'Billing created.',
                'data'    => $billing->toArray(),
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
        $billing = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $billing,
            ]);
        }

        return view('billings.show', compact('billing'));
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

        $billing = $this->repository->find($id);

        return view('billings.edit', compact('billing'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  BillingUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(BillingUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $billing = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Billing updated.',
                'data'    => $billing->toArray(),
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
                'message' => 'Billing deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Billing deleted.');
    }

    public function billing (  )
    {
        $environiment = Environment::sandbox();
        $merchant = new Merchant('MERCHANT ID', 'MERCHANT KEY');
    }
}
