@extends('layouts.app')
@section('content')

    <!-- BEGIN CONTENT-->
    <div id="content">
        <section>
            <div class="section-body">
                <div class="card">

                    <div class="card-header">
                        <div class="fixed-table-toolbar"><div class="bars pull-left">
                                <div id="toolbar">
                                    <a class="btn btn-primary ks-rounded" href="{{ route('new_colaborator') }}">
                                        Novo colaborador
                                    </a>

                                </div>
                            </div>
                            <div class="columns columns-right btn-group pull-right">
                                <button class="btn btn-default" type="button" name="paginationSwitch" title="Hide/Show pagination">
                                    <i class="font-icon font-icon-arrow-square-down"></i>
                                </button>
                                <button class="btn btn-default" type="button" name="refresh" title="Refresh">
                                    <i class="font-icon font-icon-refresh"></i>
                                </button>
                                <button class="btn btn-default" type="button" name="toggle" title="Toggle">
                                    <i class="font-icon font-icon-list-square"></i>
                                </button>
                                <div class="keep-open btn-group" title="Columns">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                        <i class="font-icon font-icon-list-rotate"></i>
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <span class="checkbox">
                                                <input id="datatable-columns-checkbox-1" type="checkbox" data-field="id" value="1" checked="checked">
                                                <label for="datatable-columns-checkbox-1">Item ID</label>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="checkbox">
                                                <input id="datatable-columns-checkbox-2" type="checkbox" data-field="name" value="2" checked="checked">
                                                <label for="datatable-columns-checkbox-2">Status</label>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="checkbox">
                                                <input id="datatable-columns-checkbox-3" type="checkbox" data-field="price" value="3" checked="checked">
                                                <label for="datatable-columns-checkbox-3">Item Price</label>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="checkbox">
                                                <input id="datatable-columns-checkbox-4" type="checkbox" data-field="operate" value="4" checked="checked">
                                                <label for="datatable-columns-checkbox-4">Item Operate</label>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="export btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown" type="button">
                                        <i class="font-icon font-icon-download"></i>
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li data-type="json">
                                            <a href="javascript:void(0)">JSON</a>
                                        </li>
                                        <li data-type="xml">
                                            <a href="javascript:void(0)">XML</a>
                                        </li>
                                        <li data-type="csv">
                                            <a href="javascript:void(0)">CSV</a>
                                        </li>
                                        <li data-type="txt">
                                            <a href="javascript:void(0)">TXT</a>
                                        </li>
                                        <li data-type="sql">
                                            <a href="javascript:void(0)">SQL</a>
                                        </li>
                                        <li data-type="excel">
                                            <a href="javascript:void(0)">MS-Excel</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="pull-right search">
                                <input class="form-control" type="text" placeholder="Buscar">
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table id="table-edit" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>
                                    <b>Foto</b>
                                </th>
                                <th>
                                    <b>Nome</b>
                                </th>
                                <th>
                                    <b>Apelido</b>
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
                                    <b>Area de atuação</b>
                                </th>
                                <th>
                                    <b>Votos propostos</b>
                                </th>
                                <th>
                                    <b>Criado po</b>
                                </th>
                                <th>
                                    <b>Ações</b>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($colaborator as $item)
                                <tr>
                                    <td>
                                        <img class="img-circle width-1" src="{{ asset ('assets/img/photo-64-1.jpg') }}" alt="" />
                                    </td>
                                    <td>
                                        <a href="{{ route ('show_colaborator', ['id' => $item->id]) }}">
                                            {{ $item->name }} {{ $item->last_name }}
                                        </a>
                                    </td>
                                    <td>{{ $item->nickname }}</td>
                                    <td>{{ $item->cpf }}</td>
                                    <td>Titulo {{ $item->voter_title }}, Zona {{ $item->zone_id }}, Seção {{ $item->session_id }}</td>
                                    <td>Bairro {{ $item->neighborhood }}, Cidade {{ $item->city }} - {{ $item->uf }}</td>
                                    <td>Bairro {{ $item->operation_neighborhoods }}, Cidade {{ $item->operation_city }} - {{ $item->operation_state }}</td>
                                    <td>{{ $item->proposed_leads }}</td>
                                    <td>{{ $item->created_by }}</td>

                                    <td style="white-space: nowrap; width: 1%;">
                                        <div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                                            <div class="btn-group btn-group-sm" style="float: none;">
                                                <a href="{{ route('show_colaborator', ['id' => $item->id]) }}" class="tabledit-edit-button btn btn-sm btn-success" style="float: none;">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{ route('edit_colaborator', ['id' => $item->id]) }}" class="tabledit-edit-button btn btn-sm btn-warning" style="float: none;">
                                                    <span class="glyphicon glyphicon-pencil"></span>
                                                </a>

                                                <a href="{{ route('destroy_colaborator', ['id' => $item->id]) }}" class="tabledit-delete-button btn btn-sm btn-danger" style="float: none;">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                </a>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{ $colaborator->links() }}
                    </div><!--end .card-body -->
                    <!-- END SEARCH RESULTS -->

                </div><!--end .card -->
            </div><!--end .section-body -->
        </section>
    </div><!--end #content-->
    <!-- END CONTENT -->
@endsection