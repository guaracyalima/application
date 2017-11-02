<h5 class="m-t-lg with-border">Dados pessoais</h5>
<div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            {!! Form::label('title', 'Titulaçào:') !!}
                            {!! Form::text('title', null ,['class' => 'form-control']) !!}
                        </div>
                    </div>

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

                </div>

<div class="row">
    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('politic_name', 'Nome politico:') !!}
            {!! Form::text('politic_name', null ,['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('cpf', 'CPF:') !!}
            {!! Form::text('cpf', null ,['class' => 'form-control', 'minlength' => 11, 'maxlength' => 11, 'required' => true, 'id' =>'cpf', 'required']) !!}
        </div>
    </div>

    <div class="col-sm-2">
        <div class="form-group">
            {!! Form::label('rg', 'RG:') !!}
            {!! Form::text('rg', null ,['class' => 'form-control', 'minlength' => 3, 'maxlength' => 14, 'required' => true, 'onkeyup' => 'this_number(this)']) !!}
        </div>
    </div>


    <div class="col-sm-3">
        <div class="select2-photo">
            {!! Form::label('broken_id', 'Partido:') !!}
            {!! Form::select('broken_id', $brokens ,['class' => 'bootstrap-select', 'required' => true, 'aria-required' => true]) !!}
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