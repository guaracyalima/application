@extends('layouts.app')
@section('content')
    <!-- BEGIN CONTENT-->
    <div class=" col-md-12 section-body">
        <div class="card">
            <div class="card-head style-primary">
                <header> Editar plano</header>
            </div>
            <div class="card-body">
                {{ Form::model($plan, ['route' => ['update_plans', 'id' => $plan->id], 'novalidate', 'name' => 'fromio']) }}

                @include('admin.plans._formedit')
                {!! Form::submit('Atualizar', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
                {!! Form::close() !!}

            </div>
        </div>
    </div><!--end .col -->
@endsection