<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::text('voter_title', null ,['class' => 'form-control', 'required' => true, 'id' => 'title'
]) !!}
            {!! Form::label('voter_title', 'Titulo de eleitor:') !!}
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::text('zone_id', null ,['class' => 'form-control', 'maxlength' => 3, 'required' => true, 'onkeyup' => 'this_number(this)'
]) !!}
            {!! Form::label('zone_id', 'Zona Eleitoral:') !!}
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::text('session_id', null ,['class' => 'form-control',  'maxlength' => 3, 'required' => true, 'onkeyup' => 'this_number(this)'
]) !!}
            {!! Form::label('session_id', 'Seçao eleitoral:') !!}
        </div>
    </div>
</div>