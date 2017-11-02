<div class="row">
    <div class="col-sm-10">
        <div class="form-group">
            {!! Form::text('name', null ,['class' => 'form-control']) !!}
            {!! Form::label('name', 'Cidade:') !!}
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group">
            {!! Form::select('state_id', $state ,['class' => 'form-control']) !!}
            {!! Form::label('state_id', 'Estado:') !!}
        </div>
    </div>
</div>