<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::text('name', null ,['class' => 'form-control']) !!}
            {!! Form::label('name', 'Nome:') !!}
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::text('max_users', null ,['class' => 'form-control', 'required' => true, 'onkeyup' => 'this_number(this)'
]) !!}
            {!! Form::label('max_users', 'Maximo de usuarios:') !!}
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::text('max_electors', null ,['class' => 'form-control', 'required' => true, 'onkeyup' => 'this_number(this)'
]) !!}
            {!! Form::label('max_electors', 'maximo de eleitores:') !!}
        </div>
    </div>
</div>