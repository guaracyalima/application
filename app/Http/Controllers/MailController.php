<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public function index (  )
    {
        return view('admin.mail.inbox');
    }

    public function create (  )
    {
        return view('admin.mail.inbox');
    }

    public function show (  )
    {
        return view('admin.mail.inbox');
    }
}
