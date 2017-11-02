<div class="row">
    <h3>Contato</h3>
    <div class="col-sm-6">
        <div class="form-group">
            {!! Form::text('cellphone', null ,['class' => 'form-control', 'minlength' => 9, 'maxlength' => 14,  'required', 'id' => 'cell'
]) !!}
            {!! Form::label('cellphone', 'Celular:') !!}
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            {!! Form::text('telephone', null , ['class' => 'form-control', 'minlength' => 8, 'maxlength' => 14,  'required', 'id' => 'tel'
]) !!}
            {!! Form::label('telephone', 'Telefone') !!}
        </div>
    </div>
</div>