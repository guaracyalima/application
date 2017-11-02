<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            {!! Form::text('address', null ,['class' => 'form-control']) !!}
            {!! Form::label('address', 'Endereço:') !!}
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::text('stret', null ,['class' => 'form-control']) !!}
            {!! Form::label('stret', 'Rua:') !!}
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::text('neighborhood', null ,['class' => 'form-control']) !!}
            {!! Form::label('neighborhood', 'Bairro') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            {!! Form::text('cep', null ,['class' => 'form-control']) !!}
            {!! Form::label('cep', 'CEP:') !!}
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::text('city', null ,['class' => 'form-control']) !!}
            {!! Form::label('city', 'Cidade:') !!}
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group floating-label">

            {!! Form::select('uf', $uf , ['class' => 'form-control']) !!}
            {!! Form::label('uf', 'Estado') !!}
        </div>

    </div>
</div>