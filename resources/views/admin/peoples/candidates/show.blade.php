@extends('layouts.app')
@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-printable style-default-light">
                    <div class="card-head">
                        <div class="tools">
                            <div class="btn-group">
                                <a class="btn btn-floating-action btn-primary" href="javascript:void(0);" onclick="javascript:window.print();"><i class="md md-print"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body style-default-bright">


                        <div class="row">
                            <div class="col-xs-8">
                                <h1 class="text-light">
                                    <i class="fa fa-user-circle-o fa-fw fa-2x text-accent-dark"></i>
                                    <strong class="text-accent-dark">
                                        {{$candidate->title}}. {{$candidate->name}}
                                    </strong>
                                </h1>
                            </div>
                            <div class="col-xs-4 text-right">
                                <h1 class="text-light text-default-light">{{ $candidate->politic_name }}</h1>
                            </div>
                        </div>


                        <br>


                        <div class="row">
                            <div class="col-xs-4">
                                <h4 class="text-light">Nivel de instrução: {{ $candidate->education_id }}</h4>
                                <h4 class="text-light">Profissão: {{ $candidate->occupation_id }}</h4>
                                <address>
                                    <strong>

                                    </strong><br>
                                    <abbr title="Phone">CPF:</abbr> {{ $candidate->cpf }} <br>
                                    <abbr title="Phone">RG:</abbr> {{ $candidate->rg }}<br>
                                    <abbr title="Phone">Partido politico:</abbr> {{ $candidate->broken_id }}
                                </address>
                            </div>
                            <div class="col-xs-4">
                                <h4 class="text-light">Endereço</h4>
                                <address>
                                    <strong>{{ $candidate->address }}</strong><br>
                                    Rua {{ $candidate->stret }}, Bairro {{ $candidate->neighborhood }}<br>
                                    {{ $candidate->city }}, {{ $candidate->uf }}, CEP {{ $candidate->cep }}<br>
                                </address>
                            </div>
                            <div class="col-xs-4">

                                <div class="well">
                                    Contatos
                                    <div class="clearfix">
                                        <div class="pull-left">
                                            <i class="fa fa-mobile" aria-hidden="true"></i>
                                            Celular:
                                        </div>
                                        <div class="pull-right">
                                            ({{ $candidate->ddd_cellphone }}) {{$candidate->cellphone}}
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="pull-left">
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                            Telefone:
                                        </div>
                                        <div class="pull-right">
                                            ({{ $candidate->ddd_telephone	 }}) {{$candidate->telephone}}
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="pull-left">
                                            <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                            Whatsapp:
                                        </div>
                                        <div class="pull-right">
                                            {{$candidate->whatsapp}}
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="pull-left">
                                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                            E-mail:
                                        </div>
                                        <div class="pull-right">
                                            {{$candidate->email}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <br>


                        <div class="row">
                            <div class="col-md-12">
                                Consumo de planos e pacotes
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th style="width:60px" class="text-center">Quantidade</th>
                                        <th class="text-left">Descrição</th>
                                        <th style="width:140px" class="text-right">Preço unitario</th>
                                        <th style="width:90px" class="text-right">TOTAL</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="text-center">2</td>
                                        <td>Nostrud exercitation 76 ullamco</td>
                                        <td class="text-right">$385.00</td>
                                        <td class="text-right">$770.00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td>Elit 9.0 sed do eiusmod</td>
                                        <td class="text-right">$215.00</td>
                                        <td class="text-right">$215.00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">4</td>
                                        <td>commodo consequat &amp; Duis aute- irure dolor</td>
                                        <td class="text-right">$405.25</td>
                                        <td class="text-right">$1,621.00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" rowspan="4">
                                            <h3 class="text-light opacity-50">Biografia</h3>
                                            <p>
                                                <small>
                                                    {{$candidate->biograph}}
                                                </small>
                                            </p>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection