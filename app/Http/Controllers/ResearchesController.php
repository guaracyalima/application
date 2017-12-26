<?php

namespace App\Http\Controllers;

use App\Services\ResearchService;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ResearchCreateRequest;
use App\Http\Requests\ResearchUpdateRequest;
use App\Repositories\ResearchRepository;
use App\Validators\ResearchValidator;


class ResearchesController extends Controller
{
    /**
     * @var ResearchService
     */
    private $service;

    public function __construct( ResearchService $service)
    {
        $this->service = $service;
    }

    public function index (  )
    {
        return $this->service->index ();
    }

    public function store(Request $request)
    {
        return $this->service->create ($request->all ());
    }

    public function supports_by_candidate ( $id )
    {
        return $this->service->supports_by_candidate ($id);
    }

}
