@extends('layouts.app')
@section('content')
    <div class="box-typical box-typical-padding">
            {{ Form::model($candidate, ['route' => ['update_candidates', 'id' => $candidate->id], 'novalidate', 'name' => 'fromio']) }}
            <div class="form-body">
                @include('admin.peoples.candidates._formedit')
            </div>
            {!! Form::submit('Atualizar dados', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
            {!! Form::close() !!}
    </div>
@section('js')
    <script>
        $(document).ready(function() {
                $('#cpf').mask('000.000.000-00')
                $('#cep').mask('00000-000');
                $('#cell').mask('0 0000-0000');
                $('#valtizapio').mask('0 0000-0000');
                $('#tel').mask('0000-0000');
            }
        )
    </script>
@endsection
@endsection