@extends('layouts.app')
@section('content')
    <!-- BEGIN CONTENT-->
    <div class=" col-md-12 section-body">
        <div class="card">
            <div class="card-head style-primary">
                <header>Cdastrar novo grau de escolaridade</header>
            </div>
            <div class="card-body">
                {{ Form::open(['route' => 'add_schooling', 'novalidate', 'name' => 'fromio']) }}

                @include('admin.educations._form')
                {!! Form::submit('Cadastrar', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
                {!! Form::close() !!}

            </div>
        </div>
    </div><!--end .col -->
@endsection