<div class="row">
    <h5 class="m-t-lg with-border">Usuario de acesso ao sistema</h5>
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('email', 'E-mail:') !!}
            {!! Form::text('email', null ,['class' => 'form-control', 'required']) !!}

        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('password', 'Senha') !!}
            <input type="password" class="form-control" name="password" id="password" required>

        </div>
    </div>

    <div class="col-sm-4">
    <div class="form-group">
        {!! Form::label('plan_id', 'Plano:') !!}
        {!! Form::select('plan_id', $plans ,['class' => 'form-control', 'required' => true, 'aria-required' => true]) !!}
    </div>
</div>

</div>