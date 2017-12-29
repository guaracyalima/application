<?php
/**
 * Created by PhpStorm.
 * User: guabirabadev
 * Date: 14/12/2017
 * Time: 23:17
 */

namespace App\Services;
class ReportService
{
    /**
     * @var CandidateService
     */
    private $candidateService;
    /**
     * @var CollaboratorService
     */
    private $collaboratorService;
    /**
     * @var VoterService
     */
    private $voterService;
    /**
     * @var PlanService
     */
    private $planService;
    /**
     * @var AdvancedSearch
     */
    private $advancedSearch;

    public function __construct ( CandidateService $candidateService,
                                  CollaboratorService $collaboratorService,
                                  VoterService $voterService,
                                  PlanService $planService,
                                  AdvancedSearch $advancedSearch)
    {
        $this->candidateService = $candidateService;
        $this->collaboratorService = $collaboratorService;
        $this->voterService = $voterService;
        $this->planService = $planService;
        $this->advancedSearch = $advancedSearch;
    }

    public function number_of_voters (  )
    {
        return count($this->voterService->all ());
    }

    public function voters_with_mail (  )
    {
        return count($this->voterService->voters_with_email ());
    }

    public function voters_female (  )
    {
        return count ($this->voterService->voters_female ());
    }

    public function voter_man (  )
    {
        return count ($this->voterService->voters_man ());
    }

    public function furuncu (  )
    {
        return $this->planService->plans_ids ()->toArray();
    }

    public function agetoage (  array $data)
    {
        return $this->voterService->agetoage($data);
    }

    public function advancedSearchAll (  )
    {
        return $this->advancedSearch->all ();
    }

    public function voters_created_today (  )
    {
        return $this->voterService->created_in_last_day();
    }

    public function created_in_last_month (  )
    {
        return $this->voterService->created_in_last_month ();
    }

    public function created_in_last_year (  )
    {
        return $this->voterService->created_in_last_year ();
    }

    public function created_in_last_week (  )
    {
        return $this->voterService->created_in_last_week ();
    }
}