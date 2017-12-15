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

    public function __construct ( CandidateService $candidateService,
                                  CollaboratorService $collaboratorService,
                                  VoterService $voterService )
    {
        $this->candidateService = $candidateService;
        $this->collaboratorService = $collaboratorService;
        $this->voterService = $voterService;
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
}