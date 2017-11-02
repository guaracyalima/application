<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::text('name', null ,['class' => 'form-control']) !!}
            {!! Form::label('name', 'Nome:') !!}
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::text('last_name', null ,['class' => 'form-control']) !!}
            {!! Form::label('last_name', 'Sobrenome:') !!}
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::text('nickname', null ,['class' => 'form-control']) !!}
            {!! Form::label('nickname', 'Apelido:') !!}
        </div>
    </div>
</div>