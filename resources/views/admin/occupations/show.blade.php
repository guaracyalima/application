@extends('layouts.app')
@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-printable style-default-light">
                 
                    <div class="card-body style-default-bright">


                        <div class="row">
                            <div class="col-xs-8">
                                <h1 class="text-light">
                                    <i class="fa fa-credit-card fa-fw fa-2x text-accent-dark"></i>
                                    <strong class="text-accent-dark">
                                        {{$package->id}}
                                    </strong>
                                </h1>
                            </div>
                            <div class="col-xs-4 text-right">
                                <h1 class="text-light text-default-light">R$ {{ $package->price }},00</h1>
                            </div>
                        </div>


                        <br>


                        <div class="row">


                            <div class="col-md-3">
                                <div class="card card-bordered style-primary">
                                    <div class="card-head">
                                        <header>
                                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                            E-mail
                                        </header>
                                    </div>
                                    <div class="card-body style-default-bright">

                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <th>{{ $package->mails }}</th>
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
                                            <i class="fa fa-comments" aria-hidden="true"></i>
                                            SMS
                                        </header>
                                    </div>
                                    <div class="card-body style-default-bright">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <th>{{ $package->sms }}</th>
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
                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                                            Expira em
                                        </header>
                                    </div>
                                    <div class="card-body style-default-bright">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <th>{{ $package->time_to_expiration }}</th>
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
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            Vencimento
                                        </header>
                                    </div>
                                    <div class="card-body style-default-bright">
                                        <table class="table">
                                            <tbody>
                                            <tr>

                                                <th>
                                                    {{date('d/m/Y', strtotime($package->date_of_expiration))}}
                                                </th>
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
        </div>
    </div>
@endsection