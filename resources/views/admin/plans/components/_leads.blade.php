<div class="row">
    <div class="col-sm-2">
        <div class="form-group">
            {!! Form::text('proposed_leads', null ,['class' => 'form-control']) !!}
            {!! Form::label('proposed_leads', 'Leads proposto:') !!}
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::select('operation_state', $uf , ['class' => 'form-control']) !!}
            {!! Form::label('operation_state', 'Estado de atuacao') !!}
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group floating-label">
            {!! Form::text('operation_city', null , ['class' => 'form-control']) !!}
            {!! Form::label('operation_city', 'Cidade de atuacao') !!}
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group floating-label">
            {!! Form::text('operation_neighborhoods', null , ['class' => 'form-control']) !!}
            {!! Form::label('operation_neighborhoods', 'Bairro de atuacao') !!}
        </div>
    </div>
</div>