<?php
/**
 * Created by PhpStorm.
 * User: guabirabadev
 * Date: 27/12/2017
 * Time: 23:02
 */

namespace App\Services;
use Illuminate\Support\Facades\DB;
use function MongoDB\BSON\toJSON;

class AdvancedSearch
{
    /**
     * @var VoterService
     */
    private $voterService;

    public function __construct ( VoterService $voterService )
    {
        $this->voterService = $voterService;
    }

    public function all (  )
    {

        $all = $this->voterService->all ();
        return [
            'all' => $all,
            'numeric_all' => count ($all)
        ];
    }

    public function agetoage ( array $data  )
    {
        return DB::table('voters')->whereBetween('age', [$data['minage'], $data['maxage']])->get()->toArray();
    }

    public function byoccupation ( array $data )
    {
        return $this->voterService->byoccupation ($data);
    }

    public function byeducation ( array $array )
    {
        return $this->voterService->byeducation ($array);
    }

    public function multiples ( array $array)
    {
        return $this->voterService->multiples ($array);
    }
}