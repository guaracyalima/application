@extends('layouts.app')
@section('content')

    <div class=" col-md-12 section-body">
        <div class="card">
            <div class="card-head style-primary">
                <header> Editar profissão</header>
            </div>
            <div class="card-body">
                {{ Form::model($education, ['route' => ['update_schooling', 'id' => $education->id], 'novalidate', 'name' => 'fromio']) }}

                @include('admin.educations._formedit')
                {!! Form::submit('Atualizar', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection