@extends('layouts.app')
@section('content')

    <div class=" col-md-12 section-body">
        <div class="card">
            <div class="card-head style-primary">
                <header> Editar pacote</header>
            </div>
            <div class="card-body">
                {{ Form::model($package, ['route' => ['update_packages', 'id' => $package->id], 'novalidate', 'name' => 'fromio']) }}

                @include('admin.packages._formedit')
                {!! Form::submit('Atualizar', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection