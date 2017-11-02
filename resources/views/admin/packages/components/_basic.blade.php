<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::text('sms', null ,['class' => 'form-control', 'required' => true, 'onkeyup' => 'this_number(this)']) !!}
            {!! Form::label('sms', 'SMS:') !!}
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::text('mails', null ,['class' => 'form-control', 'required' => true, 'onkeyup' => 'this_number(this)']) !!}
            {!! Form::label('mails', 'E-mails:') !!}
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::text('price', null ,['class' => 'form-control', 'required' => true, 'onkeyup' => 'this_number(this)']) !!}
            {!! Form::label('price', 'Preço:') !!}
        </div>
    </div>
</div>