<?php

namespace App\Http\Controllers;


use App\Services\TeamService;
use Illuminate\Http\Request;


class TeamsController extends Controller
{


    public function __construct( TeamService $service)
    {
        $this->service  = $service;
    }

    public function index()
    {
        return $this->service->index ();
    }

    public function store(Request $request)
    {
        return $this->service->create($request->all());
    }

    public function show($id)
    {
        return $this->service->show ($id);
    }

    public function update(Request $request, $id)
    {
        return $this->service->update($request->all(), $id);
    }

    public function destroy($id)
    {
        return $this->service->delete($id);
    }
}
