<?php
/**
 * Created by PhpStorm.
 * User: guabirabadev
 * Date: 10/02/2018
 * Time: 15:04
 */

namespace App\Services;
use App\Repositories\GamificationRepository;
use App\Validators\GamificationValidator;

class GamificationsService
{
    /**
     * @var GamificationRepository
     */
    private $repository;
    /**
     * @var GamificationValidator
     */
    private $validator;

    public function __construct ( GamificationRepository $repository,
                                  GamificationValidator $validator )
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function collaborator ( $id )
    {
        return $this->repository->findByField ('collaborator_id', $id);
    }

    public function create ( array $data )
    {
        $this->repository->create ($data);
    }

    public function myposition ( $id )
    {
        $this->repository->findByField ('collaborator_id', $id);
    }
}