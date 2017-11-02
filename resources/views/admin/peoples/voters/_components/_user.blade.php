<div class="row">
    <h1>Usuario de acesso ao sistema</h1>
    <div class="col-sm-6">
        <div class="form-group">
            {!! Form::text('email', null ,['class' => 'form-control']) !!}
            {!! Form::label('email', 'E-mail:') !!}
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <input type="password" class="form-control" name="password" id="password">
            {!! Form::label('password', 'Senha') !!}
        </div>
    </div>

</div>