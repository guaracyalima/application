<h1>Edereço</h1>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('address', 'Endereço:') !!}
            {!! Form::text('address', null ,['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('stret', 'Logradouro:') !!}
            {!! Form::text('stret', null ,['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('neighborhood', 'Bairro:') !!}
            {!! Form::text('neighborhood', null ,['class' => 'form-control']) !!}
        </div>
    </div>


    <div class="col-sm-2">
        <div class="form-group">
            {!! Form::label('cep', 'CEP:') !!}
            {!! Form::text('cep', null ,['class' => 'form-control', 'required', 'id' => 'cep'
]) !!}
        </div>
    </div>

</div>

<div class="row">
    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('city', 'Cidade:') !!}
            {!! Form::text('city', null ,['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('uf', 'Estado:') !!}
            {!! Form::select('uf', $uf ,['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-sm-2">
        <div class="form-group">
            {!! Form::label('ddd_cellphone', 'DDD:') !!}
            {!! Form::text('ddd_cellphone', null ,['class' => 'form-control']) !!}
        </div>
    </div>


    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('cellphone', 'Celular:') !!}
            {!! Form::text('cellphone', null ,['class' => 'form-control', 'required', 'aria-required', 'id' => 'cell']) !!}
        </div>
    </div>

</div>

<div class="row">
    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('ddd_telephone', 'DDD:') !!}
            {!! Form::text('ddd_telephone', null ,['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('telephone', 'Telefone:') !!}
            {!! Form::text('telephone', null ,['class' => 'form-control', 'id' => 'tel']) !!}
        </div>
    </div>

    <div class="col-sm-2">
        <div class="form-group">
            {!! Form::label('email', 'E-mail:') !!}
            {!! Form::text('email', null ,['class' => 'form-control']) !!}
        </div>
    </div>


    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('whatsapp', 'Whatsapp:') !!}
            {!! Form::text('whatsapp', null ,['class' => 'form-control', 'required', 'aria-required' => true, 'id' => 'valtizapio']) !!}
        </div>
    </div>

</div>