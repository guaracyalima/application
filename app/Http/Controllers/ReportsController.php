<?php

namespace App\Http\Controllers;

use App\Services\CandidateService;
use App\Services\ReportService;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    /**
     * @var CandidateService
     */
    private $candidateService;
    /**
     * @var ReportService
     */
    private $service;

    public function __construct ( CandidateService $candidateService,
                                  ReportService $service )
    {
        $this->candidateService = $candidateService;
        $this->service = $service;
    }

    public function numeric_report (  )
    {
        $data = array ();

        return [
            'candidates' => $this->candidateService->number_of_candidates (),
            'candidates_per_plan' => $this->candidateService->number_of_candidades_per_plans (),
            'supporters' => $this->candidateService->supporters (),
            'number_off_voters' => $this->service->number_of_voters (),
            'voters_with_mail' => $this->service->voters_with_mail (),
            'voters_female' => $this->service->voters_female (),
            'voters_man' => $this->service->voter_man (),
        ];


    }

    public function supporters (  )
    {

    }

}
