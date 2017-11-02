<h5 class="m-t-lg with-border">Edereço</h5>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('address', 'Endereço:') !!}
            {!! Form::text('address', null ,['class' => 'form-control', 'minlength' => 5, 'maxlength' => 80, 'required' => true]) !!}
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('stret', 'Logradouro:') !!}
            {!! Form::text('stret', null ,['class' => 'form-control', 'minlength' => 5, 'maxlength' => 80, 'required' => true]) !!}
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('neighborhood', 'Bairro:') !!}
            {!! Form::text('neighborhood', null ,['class' => 'form-control', 'minlength' => 5, 'maxlength' => 80, 'required' => true]) !!}
        </div>
    </div>


    <div class="col-sm-2">
        <div class="form-group">
            {!! Form::label('cep', 'CEP:') !!}
            {!! Form::text('cep', null ,['class' => 'form-control', 'minlength' => 8, 'maxlength' => 8, 'required', 'id' => 'cep']) !!}
        </div>
    </div>

</div>

<div class="row">
    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('city', 'Cidade:') !!}
            {!! Form::text('city', null ,['class' => 'form-control', 'minlength' => 3, 'maxlength' => 80, 'required' => true]) !!}
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
            {!! Form::text('ddd_cellphone', null ,['class' => 'form-control', 'minlength' => 3, 'maxlength' => 3, 'reuired' => true, 'onkeyup' => 'this_number(this)']) !!}
        </div>
    </div>


    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('cellphone', 'Celular:') !!}
            {!! Form::text('cellphone', null ,['class' => 'form-control', 'required' => true, 'aria-required' => true, 'minlength' => 9, 'maxlength' => 9, 'reuired' => true, 'id' => 'cell']) !!}
        </div>
    </div>

</div>

<div class="row">
    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('ddd_telephone', 'DDD:') !!}
            {!! Form::text('ddd_telephone', null ,['class' => 'form-control', 'minlength' => 3, 'maxlength' => 3, 'reuired' => true, 'onkeyup' => 'this_number(this)']) !!}
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('telephone', 'Telefone:') !!}
            {!! Form::text('telephone', null ,['class' => 'form-control', 'minlength' => 8, 'maxlength' => 8, 'reuired' => true, 'id' => 'tel']) !!}
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
            {!! Form::text('whatsapp', null ,['class' => 'form-control', 'required' => true, 'aria-required' => true, 'minlength' => 11, 'maxlength' => 13, 'reuired' => true, 'id' => 'valtizapio']) !!}
        </div>
    </div>

</div>