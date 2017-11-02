<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::text('name', null ,['class' => 'form-control']) !!}
            {!! Form::label('name', 'Região:') !!}
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::text('initials', null ,['class' => 'form-control', 'maxlength' => 2]) !!}
            {!! Form::label('initials', 'Sigla:') !!}
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::text('region_id', $region ,['class' => 'form-control']) !!}
            {!! Form::label('region_id', 'Região:') !!}
        </div>
    </div>
</div>