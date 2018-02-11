<?php

namespace App\Http\Controllers;

use App\Services\CandidateService;
use App\Services\ReportService;
use App\Services\SendmailService;
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
                                  ReportService $service)
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
            'percent_voters_with_mail' => ($this->service->number_of_voters () * ($this->service->voters_with_mail () / 100)) * 100,
            'voters_female' => $this->service->voters_female (),
            'percent_voters_female' =>( $this->service->number_of_voters () * (  $this->service->voters_female () / 100)) * 100,
            'voters_man' => $this->service->voter_man (),
            'percent_voters_man' => ( $this->service->number_of_voters () *  ( $this->service->voter_man () / 100)) * 100,
            'voters_created_today' => $this->service->voters_created_today (),
            'number_of_voters_created_today' => count ($this->service->voters_created_today ()),
            'created_in_last_month' => $this->service->created_in_last_month (),
            'number_of_created_in_last_month' => count ($this->service->created_in_last_month ()),
            'created_in_last_year' => $this->service->created_in_last_year (),
            'number_of_created_in_last_year' => count ($this->service->created_in_last_year ()),
            'created_in_last_week' => $this->created_in_last_week (),
            'number_of_created_in_last_week' => count ($this->created_in_last_week ()),
        ];


    }

    public function supporters (  )
    {
        return $this->service->furuncu ();
    }

    public function advances_search_all (  )
    {
        return $this->service->advancedSearchAll ();
    }

    public function voters_created_today (  )
    {
        return $this->service->voters_created_today ();
    }

    public function created_in_last_month (  )
    {
        return $this->service->created_in_last_month ();
    }

    public function created_in_last_year (  )
    {
        return $this->service->created_in_last_year ();
    }

    public function created_in_last_week (  )
    {
        return $this->service->created_in_last_week ();
    }

    public function voter_of_birth_is_in_the_month ($id)
    {
        return $this->service->voter_of_birth_is_in_the_month ($id);
    }

    public function mysupporters ( $id )
    {
        return $this->service->supporters ($id);
    }

    public function myvoters ( $id )
    {
        return $this->service->myvoretes ($id);
    }

    public function collaborator_voters ( $id )
    {
        return $this->service->collaborator_voters ($id);
    }

    public function collaborator_messages ( $id )
    {
        return $this->service->collaborator_messages ($id);
    }

    public function my_meta ( $id )
    {
        return $this->service->my_meta ($id);
    }

    public function my_recents_voters ( $id )
    {
        return $this->service->my_recents_voters ($id);
    }

}
