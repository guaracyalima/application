@extends('layouts.app')
@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-printable style-default-light">
                    <div class="card-head">
                        <div class="tools">
                            <div class="btn-group">
                                <a class="btn btn-floating-action btn-primary" href="javascript:void(0);" onclick="javascript:window.print();">
                                    <i class="md md-print"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body style-default-bright">


                        <div class="row">
                            <div class="col-xs-8">
                                <h1 class="text-light">
                                    <i class="fa fa-user-circle-o fa-fw fa-2x text-accent-dark"></i>
                                    <strong class="text-accent-dark">
                                        {{$collaborator->name}} {{ $collaborator->last_name }}
                                    </strong>
                                </h1>
                            </div>
                            <div class="col-xs-4 text-right">
                                <h1 class="text-light text-default-light">{{ $collaborator->nickname }}</h1>
                            </div>
                        </div>


                        <br>


                        <div class="row">


                            <div class="col-md-3">
                                <div class="card card-bordered style-primary">
                                    <div class="card-head">
                                        <header>
                                            <i class="fa fa-address-card" aria-hidden="true"></i>
                                            Identificação
                                        </header>
                                    </div><!--end .card-head -->
                                    <div class="card-body style-default-bright">

                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <th>CPF</th>
                                                <td>{{ $collaborator->cpf }}</td>
                                            </tr>
                                            <tr>
                                                <th>RG</th>
                                                <td>{{ $collaborator->rg }}</td>
                                            </tr>
                                            <tr>
                                                <th>Nascimento</th>
                                                <td>{{ date('d/m/Y', strtotime($collaborator->birth)) }}</td>
                                            </tr>

                                            </tbody>
                                        </table>

                                    </div><!--end .card-body -->
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card card-bordered style-primary">
                                    <div class="card-head">
                                        <header>
                                            <i class="fa fa-balance-scale" aria-hidden="true"></i>
                                            Dados eleitorais
                                        </header>
                                    </div>
                                    <div class="card-body style-default-bright">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <th>Titulo de eleitor</th>
                                                <td>{{ $collaborator->voter_title }}</td>
                                            </tr>
                                            <tr>
                                                <th>Zona Eleitoral</th>
                                                <td>{{ $collaborator->zone_id }}</td>
                                            </tr>
                                            <tr>
                                                <th>Sessão Eleitoral</th>
                                                <td>{{ $collaborator->session_id }}</td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card card-bordered style-primary">
                                    <div class="card-head">
                                        <header>
                                            <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                            Pessoais
                                        </header>
                                    </div>
                                    <div class="card-body style-default-bright">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <th>Escolaridade</th>
                                                <td>{{ $collaborator->education_id }}</td>
                                            </tr>
                                            <tr>
                                                <th>Profissão</th>
                                                <td>{{ $collaborator->occupation_id }}</td>
                                            </tr>
                                            <tr>
                                                <th>Nascimento</th>
                                                <td>{{ date('d/m/Y', strtotime($collaborator->birth)) }}</td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card card-bordered style-primary">
                                    <div class="card-head">
                                        <header>
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                            Endereço
                                        </header>
                                    </div>
                                    <div class="card-body style-default-bright">
                                        <table class="table">
                                            <tbody>
                                            <tr>

                                                <td>
                                                    Rua {{ $collaborator->stret }},
                                                    Bairro {{ $collaborator->neighborhood }},
                                                    {{ $collaborator->city }}, {{ $collaborator->uf }},
                                                    CEP {{ $collaborator->cep }}
                                                </td>
                                            </tr>




                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-4">

                                <div class="well">
                                    Contatos
                                    <div class="clearfix">
                                        <div class="pull-left">
                                            <i class="fa fa-mobile" aria-hidden="true"></i>
                                            Celular:
                                        </div>
                                        <div class="pull-right">
                                            {{$collaborator->cellphone}}
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="pull-left">
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                            Telefone:
                                        </div>
                                        <div class="pull-right">
                                            {{$collaborator->telephone}}
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="pull-left">
                                            <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                            Whatsapp:
                                        </div>
                                        <div class="pull-right">
                                            {{$collaborator->whatsapp}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <br>


                        <div class="row">




                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection