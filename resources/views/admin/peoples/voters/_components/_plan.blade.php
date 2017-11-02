<div class="row">
    <h1>Plano de acesso ao sistema</h1>
    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('plan_id', 'Plano:') !!}
            {!! Form::select('plan_id', $plans ,['class' => 'form-control', 'required' => true, 'aria-required' => true]) !!}
        </div>
    </div>
</div>