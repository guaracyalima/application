@extends('layouts.app')
@section('content')


    <div id="content">
        <section>
            <div class="section-body">
                <div class="card">


                    <div class="card-header">
                        <div class="fixed-table-toolbar"><div class="bars pull-left">
                                <div id="toolbar">
                                    
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
                        <table class="table  table-striped table-hover dataTable table-bordered">
                            <thead>
                            <tr>
                                <th>
                                    <b>Estado</b>
                                </th>
                                <th>
                                    <b>Sigla</b>
                                </th>
                                <th>
                                    <b>Região</b>
                                </th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($states as $item)
                                <tr>

                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->initials }}</td>
                                    <td>{{ $item->region_id }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>



                        {{ $states->links() }}
                    </div>


                </div>
            </div>
        </section>
    </div>

@endsection