@extends('layouts.app')
@section('content')
    <div class="box-typical box-typical-padding">
                    {{ Form::open(['route' => 'voters_add', 'name' => 'fromio']) }}
                        <div class="form-body">
                            @include('admin.peoples.voters._form')
                        </div>
                    {!! Form::submit('Cadastrar', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
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
                $('#title').mask('0000 0000 0000 00');
            }
        )
    </script>
@endsection
@endsection