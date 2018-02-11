<?php
/**
 * Created by PhpStorm.
 * User: guabirabaDev
 * Date: 26/08/17
 * Time: 13:25
 */

namespace App\Services;

use App\Entities\Collaborator;
use App\Repositories\CandidateRepository;
use App\Repositories\CollaboratorCandidateRepository;
use App\Repositories\CollaboratorRepository;
use App\Repositories\VoterRepository;
use App\Validators\CandidateValidator;
use App\Validators\VoterValidator;
use Carbon\Carbon;
use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\DB;

class VoterService
{
    /**
     * @var CandidateRepository
     */
    private $repository;
    /**
     * @var CandidateValidator
     */
    private $validator;
    /**
     * @var CollaboratorRepository
     */
    private $collaboratorRepository;
    /**
     * @var CollaboratorCandidateRepository
     */
    private $collaboratorCandidateRepository;
    /**
     * @var GamificationsService
     */
    private $gamificationsService;

    public function __construct ( VoterRepository $repository ,
                                  VoterValidator $validator ,
                                  CollaboratorCandidateRepository $collaboratorCandidateRepository,
                                  GamificationsService $gamificationsService)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->collaboratorCandidateRepository = $collaboratorCandidateRepository;
        $this->gamificationsService = $gamificationsService;
    }

    public function all ()
    {
        return $this->repository->all ();
    }

    public function index ($id)
    {
        return $this->repository->with (['candidate'])->findByField ('candidate_id', $id);
    }



    public function create ( array $data )
    {
        try {
            $this->validator->with ( $data )->passesOrFail ();
            $now_year_is = date ( 'Y' );
            $birth_year = substr ( $data[ 'birth' ] , - 4 );
            $data[ 'age' ] = $now_year_is - $birth_year;
            $gm = array ();
            $gm['collaborator_id'] = $data['created_by'];
            $this->gamificationsService->create ($gm);
            return $this->repository->create ( $data );
        } catch ( ValidationException $exception ) {
            return [
                'error' => true ,
                'message' => $exception->getMessage ()
            ];
        }

    }

    public function update ( array $data )
    {
        try {
            $this->validator->with ( $data )->passesOrFail ();
            return $this->repository->update ( $data );
        } catch ( ValidationException $exception ) {
            return [
                'error' => true ,
                'message' => $exception->getMessage ()
            ];
        }
    }

    public function voters_with_email ()
    {
        return $this->repository->findWhereNotIn ( 'email' , [ ' ' ] )->toArray ();
    }

    public function voters_female ()
    {
        return $this->repository->findByField ( 'genre' , 'female' );
    }

    public function voters_man ()
    {
        return $this->repository->findByField ( 'genre' , 'H' );
    }

    public function agetoage ( array $data )
    {
        return $this->repository->findWhereIn ( 'age' , [ $data[ 'minage' ] , $data[ 'maxage' ] ] );
    }

    public function byoccupation ( array $array )
    {
        return $this->repository->with ( [ 'occupation' ] )->findByField ( 'occupation_id' , $array[ 'occupation_id' ] );
    }

    public function byeducation ( array $array )
    {
        return $this->repository->with ( [ 'education' ] )->findByField ( 'education_id' , $array[ 'education_id' ] );
    }

    public function multiples ( array $array )
    {
        return $this->repository
            ->with ( [ 'education' , 'occupation' ] )
            ->findWhere ( [
                'age' => $array[ 'age' ] ,
                'education_id' => $array[ 'education_id' ] ,
                'occupation_id' => $array[ 'occupation_id' ] ,
            ] );
    }

    public function created_in_last_day ()
    {
        $date_now_is = Carbon::now ();
        $satart_create = Carbon::parse ( $date_now_is )->startOfDay ();
        $end_create = Carbon::parse ( $date_now_is )->endOfDay ();
        return DB::table ( 'voters' )->whereBetween ( 'created_at' , [ $satart_create , $end_create ] )->get ()->toArray ();
    }

    public function created_in_last_month ()
    {
        $date_now_is = Carbon::now ();
        $x = Carbon::parse ( $date_now_is )->startOfMonth ();
        $y = Carbon::parse ( $date_now_is )->endOfMonth ();
        return DB::table ( 'voters' )->whereBetween ( 'created_at' , [ $x , $y ] )->get ()->toArray ();
    }

    public function created_in_last_year ()
    {
        $date_now_is = Carbon::now ();
        $new_year = Carbon::parse ( $date_now_is )->startOfYear ();
        $end_year = Carbon::parse ( $date_now_is )->endOfYear ();
        return DB::table ( 'voters' )->whereBetween ( 'created_at' , [ $new_year , $end_year ] )->get ()->toArray ();
    }

    public function created_in_last_week ()
    {
        $date_now_is = Carbon::now ();
        $start_week = Carbon::parse ( $date_now_is )->startOfWeek ();
        $end_week = Carbon::parse ( $date_now_is )->endOfWeek ();
        return DB::table ( 'voters' )->whereBetween ( 'created_at' , [ $start_week , $end_week ] )->get ()->toArray ();
    }

    //to show on collaborators
    public function myvoters ( $id )
    {
        return $this->repository->findByField ( 'created_by' , $id )->toArray ();
    }

    public function retornameuscao ( $id )
    {
          $k = Collaborator::select('id')->where ('candidate_id' , $id )->get('id')->toArray ();
    }
    public function voterstocandidate ( $id )
    {
        $meus = $this->collaboratorCandidateRepository->findByField ('candidate_id', $id, ['id'])->toArray();
        return (object)$meus;
        foreach ($meus as $item )
        {
            $cus = $item['id'];
        }
//        return [
//            $this->repository->findByField ('created_by', $id)->toArray(),
//            'meus' => $meus
//        ];
    }

    public function voter_of_birth_is_in_the_month ($id)
    {
        $date_now_is = Carbon::now ();
        $birth_start = Carbon::parse ( $date_now_is )->startOfMonth ();
        $birth_end = Carbon::parse ( $date_now_is )->endOfMonth ();
        $start = $birth_start->day . '/'.$birth_start->month.'/'.$birth_start->year;
        $end = $birth_end->day . '/'.$birth_end->month.'/'.$birth_end->year;
        return DB::table ( 'voters' )->where('candidate_id', '='  ,$id)->whereBetween ( 'birth' , [ $start , $end ] )->get ()->toArray ();
    }

    public function collaborator_voters ( $id )
    {
        return $this->repository->findByField ('created_by', $id);
    }

    public function my_recents_voters ( $id )
    {
        $date_now_is = Carbon::now ();
        $start_week = Carbon::parse ( $date_now_is )->startOfWeek ();
        $end_week = Carbon::parse ( $date_now_is )->endOfWeek ();
        return DB::table ( 'voters' )->where('created_by', '=', $id)->whereBetween ( 'created_at' , [ $start_week , $end_week ] )->get ()->toArray ();
        //return $this->repository->findByField ('created_by', $id);
    }
}