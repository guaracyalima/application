<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::text('cpf', null ,['class' => 'form-control', 'minlength' => 11, 'maxlength' => 11, 'required', 'id' => 'cpf'
]) !!}
            {!! Form::label('cpf', 'CPF:') !!}
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::text('rg', null ,['class' => 'form-control', 'minlength' => 5, 'maxlength' => 80,  'required', 'id' => 'rg'
]) !!}
            {!! Form::label('rg', 'RG:') !!}
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::date('birth', null ,['class' => 'form-control', 'required']) !!}
            {!! Form::label('birth', 'Nascimento:') !!}
        </div>
    </div>
</div>