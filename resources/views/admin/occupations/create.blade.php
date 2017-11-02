@extends('layouts.app')
@section('content')

    <div class=" col-md-12 section-body">
        <div class="card">
            <div class="card-head style-primary">
                <header>Cdastrar nova profissão</header>
            </div>
            <div class="card-body">
                {{ Form::open(['route' => 'add_occupations', 'novalidate', 'name' => 'fromio']) }}

                @include('admin.occupations._form')
                {!! Form::submit('Cadastrar', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection