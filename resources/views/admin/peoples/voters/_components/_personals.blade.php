<h1>Dados pessoais</h1>
<div class="row">

                    <div class="col-sm-4">
                        <div class="form-group">
                            {!! Form::label('name', 'Nome:') !!}
                            {!! Form::text('name', null ,['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            {!! Form::label('last_name', 'Sobrenome:') !!}
                            {!! Form::text('last_name', null ,['class' => 'form-control']) !!}
                        </div>
                    </div>


                    <div class="col-sm-2">
                        <div class="form-group">
                            {!! Form::label('nickname', 'Apelido:') !!}
                            {!! Form::text('nickname', null ,['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            {!! Form::label('genre', 'Genero:') !!}
                            {!! Form::text('genre', null ,['class' => 'form-control']) !!}
                        </div>
                    </div>

                </div>

<div class="row">
    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('birth', 'Nascimento:') !!}
            {!! Form::date('birth', null ,['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('cpf', 'CPF:') !!}
            {!! Form::text('cpf', null ,['class' => 'form-control',  'minlength' => 11, 'maxlength' => 11,  'required' , 'id' => 'cpf']) !!}

        </div>
    </div>

    <div class="col-sm-2">
        <div class="form-group">
            {!! Form::label('rg', 'RG:') !!}
            {!! Form::text('rg', null ,['class' => 'form-control', 'minlength' => 3, 'required' , 'onkeyup' => 'this_number(this)'
]) !!}
        </div>
    </div>


    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('voter_title', 'Titulo de eleitor:') !!}
            {!! Form::text('voter_title', null ,['class' => 'form-control', 'required' , 'aria-required' , 'required' , 'id' => 'title'
]) !!}
        </div>
    </div>

</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            {!! Form::label('zone_id', 'Zona Eleitoral') !!}
            {!! Form::text('zone_id', null ,['class' => 'form-control', 'maxlength' => 3, 'required' , 'onkeyup' => 'this_number(this)'
]) !!}
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('session_id', 'Seçào:') !!}
            {!! Form::text('session_id', null ,['class' => 'form-control', 'maxlength' => 3, 'required' , 'onkeyup' => 'this_number(this)'
]) !!}
        </div>
    </div>


</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            {!! Form::label('education_id', 'Grau de escolaridade') !!}
            {!! Form::select('education_id', $educations ,['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('occupation_id', 'Profissào:') !!}
            {!! Form::select('occupation_id', $occupations ,['class' => 'form-control']) !!}
        </div>
    </div>


</div>