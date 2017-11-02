<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::text('time_to_expiration', null ,['class' => 'form-control', 'required' => true, 'onkeyup' => 'this_number(this)']) !!}
            {!! Form::label('time_to_expiration', 'Expira em:') !!}
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::date('date_of_expiration', null ,['class' => 'form-control']) !!}
            {!! Form::label('date_of_expiration', 'Data de expiração:') !!}
        </div>
    </div>
</div>