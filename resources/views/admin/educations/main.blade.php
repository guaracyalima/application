@extends('layouts.app')
@section('content')


    <div id="content">
        <section>
            <div class="section-body">
                <div class="card">


                    <div class="card-head style-primary">
                        <header class="text-center">
                           Escolaridades
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
                            <a class="btn btn-floating-action btn-default-light" href="{{ route ('new_schooling') }}">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table  table-striped table-hover dataTable table-bordered">
                            <thead>
                            <tr>
                                <th>
                                    <b>Grau de instrução</b>
                                </th>
                                <th>
                                    <b>Ações</b>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($educations as $item)
                                <tr>

                                    <td>{{ $item->description }}</td>
                                    <td class="text-right">
                                        <div class="row">
                                            <div class="btn-group">
                                                <a href="{{ route('edit_schooling', ['id' => $item->id]) }}"type="button" class="btn ink-reaction btn-floating-action btn-warning">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{ route('destroy_schooling', ['id' => $item->id]) }}" type="button" class="btn ink-reaction btn-floating-action btn-danger">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>



                        {{ $educations->links() }}
                    </div>


                </div>
            </div>
        </section>
    </div>

@endsection