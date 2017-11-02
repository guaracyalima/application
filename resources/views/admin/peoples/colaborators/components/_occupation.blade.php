<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            {!! Form::select('occupation_id', $educations ,['class' => 'form-control']) !!}
            {!! Form::label('occupation_id', 'Escolaridade:') !!}
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            {!! Form::select('education_id', $ocupations ,['class' => 'form-control']) !!}
            {!! Form::label('education_id', 'Profissao:') !!}
        </div>
    </div>
</div>