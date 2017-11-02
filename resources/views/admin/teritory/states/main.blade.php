@extends('layouts.app')
@section('content')

    <!-- BEGIN CONTENT-->
    <div id="content">
        <section>
            <div class="section-body">
                <div class="card">

                    <!-- BEGIN SEARCH HEADER -->
                    <div class="card-head style-primary">
                        <header class="text-center">
                            Gerenciamento de candidatos
                        </header>
                        <div class="tools pull-left">
                            <form class="navbar-search" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="contactSearch" placeholder="Buscar por nome">
                                </div>
                                <button type="submit" class="btn btn-icon-toggle ink-reaction">
                                    <i class="fa fa-search"></i>
                                </button>
                            </form>
                        </div>
                        <div class="tools">
                            <a class="btn btn-floating-action btn-default-light" href="{{ route('new_candidate') }}">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div><!--end .card-head -->
                    <!-- END SEARCH HEADER -->

                    <!-- BEGIN SEARCH RESULTS -->
                    <div class="card-body">
                        <table class="table  table-striped table-hover dataTable table-bordered">
                            <thead>
                            <tr>
                                <th>
                                    <b>Foto</b>
                                </th>
                                <th>
                                    <b>Nome</b>
                                </th>
                                <th>
                                    <b>CPF</b>
                                </th>
                                <th>
                                    <b>Dados eleitorais</b>
                                </th>
                                <th>
                                    <b>Endereço</b>
                                </th>
                                <th>
                                    <b>Plano</b>
                                </th>
                                <th>
                                    <b>Partido</b>
                                </th>
                                <th>
                                    <b>Criado por</b>
                                </th>
                                <th>
                                    <b>Ações</b>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($candidates as $item)
                                <tr>
                                    <td>
                                        <img class="img-circle width-1" src="{{ asset ('assets/img/avatar2.jpg') }}" alt="" />
                                    </td>
                                    <td>{{ $item->politic_name }}</td>
                                    <td>{{ $item->cpf }}</td>
                                    <td>Titulo {{ $item->voter_title }}, Zona {{ $item->zone_id }}, Seção {{ $item->session_id }}</td>
                                    <td>Bairro {{ $item->neighborhood }}, Cidade {{ $item->city }} - {{ $item->uf }}</td>
                                    <td>{{ $item->plan_id }}</td>
                                    <td>{{ $item->broken_id }}</td>
                                    <td>{{ $item->created_by }}</td>
                                    <td class="text-right">

                                        <div class="btn-group">
                                            <button type="button" class="btn btn-block ink-reaction btn-info">
                                                <i class="fa fa-pencil"></i>
                                                Editar
                                            </button>
                                            <button type="button" class="btn btn-block ink-reaction btn-danger">
                                                <i class="fa fa-trash-o"></i>
                                                Excluir
                                            </button>
                                        </div>


                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>



                        {{ $candidates->links() }}
                    </div><!--end .card-body -->
                    <!-- END SEARCH RESULTS -->

                </div><!--end .card -->
            </div><!--end .section-body -->
        </section>
    </div><!--end #content-->
    <!-- END CONTENT -->
@endsection