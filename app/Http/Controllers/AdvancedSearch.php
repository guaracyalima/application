<?php
/**
 * Created by PhpStorm.
 * User: guabirabadev
 * Date: 27/12/2017
 * Time: 23:30
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class AdvancedSearch
{
    /**
     * @var \App\Services\AdvancedSearch
     */
    private $search;

    public function __construct ( \App\Services\AdvancedSearch $search )
    {
        $this->search = $search;
    }

    public function agetoage ( Request $request)
    {
        return [
            'all' => $this->search->agetoage($request->all ()),
            'numeric' => count ($this->search->agetoage($request->all ()))
        ];
    }

    public function byoccupation ( Request $request )
    {
        return [
            'all' => $this->search->byoccupation($request->all ()),
            'numeric' => count ($this->search->byoccupation($request->all ()))
        ];
    }

    public function byeducation ( Request $request )
    {
        return [
            'all' => $this->search->byeducation($request->all ()),
            'numeric' => count ($this->search->byeducation($request->all ()))
        ];
    }

    public function multiples ( Request $request )
    {
        return [
            'all' => $this->search->multiples($request->all ()),
            'numeric' => count ($this->search->multiples($request->all ()))
        ];
    }
}