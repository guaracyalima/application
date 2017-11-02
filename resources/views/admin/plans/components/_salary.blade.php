<div class="row">
    <div class="col-sm-2">
        <div class="form-group">
            {!! Form::text('interest', null ,['class' => 'form-control']) !!}
            {!! Form::label('interest', 'Interesses:') !!}
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::text('whatsapp', null , ['class' => 'form-control']) !!}
            {!! Form::label('whatsapp', 'Whatsapp') !!}
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::text('salary', null , ['class' => 'form-control']) !!}
            {!! Form::label('salary', 'Salario a ser pago') !!}
        </div>
    </div>
</div>