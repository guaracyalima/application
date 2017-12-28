<?php
/**
 * Created by PhpStorm.
 * User: guabirabadev
 * Date: 10/12/2017
 * Time: 20:34
 */

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\App;

class ReportController extends  Controller
{
    public function index (  )
    {
        $data = ["fg" => "Fuck God"];
        $pdf = PDF::loadView('pdf.invoice', $data);
        return $pdf->download('invoice.pdf');
    }

}