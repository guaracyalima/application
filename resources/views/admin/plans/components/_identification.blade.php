<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::text('sms_quantity', null ,['class' => 'form-control','required' => true, 'onkeyup' => 'this_number(this)'
 ]) !!}
            {!! Form::label('sms_quantity', 'Quantiade de SMS:') !!}
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::text('emails_quantity', null ,['class' => 'form-control', 'required' => true, 'onkeyup' => 'this_number(this)'
]) !!}
            {!! Form::label('emails_quantity', 'Quantidade de E-mail:') !!}
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group">
            {!! Form::text('price', null ,['class' => 'form-control', 'required' => true, 'onkeyup' => 'this_number(this)'
]) !!}
            {!! Form::label('price', 'Preço:') !!}
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group">
            {!! Form::text('renewal_frequency', null ,['class' => 'form-control', 'required' => true, 'onkeyup' => 'this_number(this)'
]) !!}
            {!! Form::label('renewal_frequency', 'Frequencia de renovação:') !!}
        </div>
    </div>
</div>