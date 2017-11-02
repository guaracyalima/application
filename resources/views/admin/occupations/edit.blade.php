@extends('layouts.app')
@section('content')

    <div class=" col-md-12 section-body">
        <div class="card">
            <div class="card-head style-primary">
                <header> Editar profissão</header>
            </div>
            <div class="card-body">
                {{ Form::model($occupation, ['route' => ['update_occupations', 'id' => $occupation->id], 'novalidate', 'name' => 'fromio']) }}

                @include('admin.occupations._formedit')
                {!! Form::submit('Atualizar', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection