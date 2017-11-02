<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            {!! Form::text('email', null ,['class' => 'form-control']) !!}
            {!! Form::label('email', 'E-mail:') !!}
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">

            {!! Form::password('password', null , ['class' => 'form-control']) !!}
            {!! Form::label('password', 'Senha') !!}
        </div>
    </div>


</div>