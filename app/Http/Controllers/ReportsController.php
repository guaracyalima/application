<?php

namespace App\Http\Controllers;

use App\Services\CandidateService;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    /**
     * @var CandidateService
     */
    private $candidateService;

    public function __construct ( CandidateService $candidateService )
    {
        $this->candidateService = $candidateService;
    }

    public function numeric_report (  )
    {
        $data = array ();
        return [
            'candidates' => $this->candidateService->number_of_candidates (),
            'candidates_per_plan' => $this->candidateService->number_of_candidades_per_plans ()
        ];
    }

}
