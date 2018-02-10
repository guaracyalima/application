<?php

namespace App\Http\Controllers;

use App\Entities\User;
use App\Repositories\CandidateRepository;
use App\Repositories\CollaboratorRepository;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * @var CandidateRepository
     */
    private $candidateRepository;
    /**
     * @var CollaboratorRepository
     */
    private $collaboratorRepository;

    public function __construct ( CandidateRepository $candidateRepository ,
                                  CollaboratorRepository $collaboratorRepository )
    {
        $this->candidateRepository = $candidateRepository;
        $this->collaboratorRepository = $collaboratorRepository;
    }

    public function auth ( Request $request )
    {
        $credentials = $request->only ( 'email' , 'password' );
        $user = User::where ( 'email' , $credentials[ 'email' ] )
            ->get ()
            ->toArray ();
        foreach ( $user as $u ) {
            $name = $u[ 'name' ];
            $email = $u[ 'email' ];
            $role = $u[ 'type' ];
            $id = $u[ 'id' ];
        }
        switch ( $role ) {
            case 'candidate':
                $k = $this->candidateRepository->findByField ( 'user_id' , $id );
                foreach ( $k as $item ) {
                    $candidate_id = $item[ 'id' ];
                    $candidate_name = $item[ 'name' ];
                    $candidate_plan = $item[ 'plan_id' ];
                }
                $customClaims = [
                    'name' => $name ,
                    'email' => $email ,
                    'id' => $id ,
                    'role' => $role ,
                    'candidate_id' => $candidate_id ,
                    'candidate_name' => $candidate_name ,
                    'candidate_plan' => $candidate_plan
                ];
                break;
            case 'collaborator':
                $collaborator = $this->collaboratorRepository->find ( $id )->toArray ();
                $my_candidate_supper_is = $this->candidateRepository->find ( $collaborator[ 'candidate_id' ] )->toArray ();
                $customClaims = [
                    'name' => $name ,
                    'email' => $email ,
                    'id' => $id ,
                    'role' => $role ,
                    'proposed_leads' => $collaborator[ 'proposed_leads' ] ,
                    'candidate_id' => $my_candidate_supper_is[ 'id' ] ,
                    'candidate_name' => $my_candidate_supper_is[ 'name' ] ,
                    'candidate_plan' => $my_candidate_supper_is[ 'plan_id' ] ,
                    'candidate_broken' => $my_candidate_supper_is[ 'broken_id' ] ,
                    'candidate_broken' => $my_candidate_supper_is[ 'broken_id' ] ,
                ];
                break;
            default:
                $name = $u[ 'name' ];
                $email = $u[ 'email' ];
                $role = $u[ 'type' ];
                $id = $u[ 'id' ];
                $customClaims = [
                    'name' => $name ,
                    'email' => $email ,
                    'id' => $id ,
                    'role' => $role ,
                ];
                break;
        }
        try {
            $token = JWTAuth::attempt ( $credentials , $customClaims );

        } catch ( JWTException $exception ) {
            return response ()->json ( [ 'error' => 'Não foi possivel criar o token' ] , 500 );
        }
        if ( !$token ) {
            return response ()->json ( [ 'error' => 'Credenciais invalidas' ] , 401 );
        }
        return response ()->json ( compact ( 'token' ) );

    }

    public function getAuthenticatedUser ()
    {

        try {

            if ( !$user = JWTAuth::parseToken ()->authenticate () ) {
                return response ()->json ( [ 'user_not_found' ] , 404 );
            }

        } catch ( Tymon\JWTAuth\Exceptions\TokenExpiredException $e ) {

            return response ()->json ( [ 'token_expired' ] , $e->getStatusCode () );

        } catch ( Tymon\JWTAuth\Exceptions\TokenInvalidException $e ) {

            return response ()->json ( [ 'token_invalid' ] , $e->getStatusCode () );

        } catch ( Tymon\JWTAuth\Exceptions\JWTException $e ) {

            return response ()->json ( [ 'token_absent' ] , $e->getStatusCode () );

        }
        // the token is valid and we have found the user via the sub claim
        return response ()->json ( compact ( 'user' ) );
    }
}
