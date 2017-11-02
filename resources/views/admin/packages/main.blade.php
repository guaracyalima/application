@extends('layouts.app')
@section('content')


    <div id="content">
        <section>
            <div class="section-body">
                <div class="card">


                    <div class="card-head style-primary">
                        <header class="text-center">
                            Gerenciamento de pacotes adicionais
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
                            <a class="btn btn-floating-action btn-default-light" href="{{ route ('new_packages') }}">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table  table-striped table-hover dataTable table-bordered">
                            <thead>
                            <tr>
                                <th>
                                    <b>#</b>
                                </th>
                                <th>
                                    <b>Quantidade de SMS</b>
                                </th>
                                <th>
                                    <b>Quantidade de  E-mails</b>
                                </th>
                                <th>
                                    <b>Preço</b>
                                </th>
                                <th>
                                    <b>Tempo para expirar</b>
                                </th>
                                <th>
                                    <b>Data de vencimento</b>
                                </th>
                                <th>
                                    <b>Ações</b>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($packages as $item)
                                <tr>
                                    <td>
                                        <a href="{{ route ('show_plans', ['id' => $item->id]) }}">
                                            {{ $item->id }}
                                        </a>
                                    </td>
                                    <td>{{ $item->sms }}</td>
                                    <td>{{ $item->mails }}</td>
                                    <td>R${{ $item->price }}</td>
                                    <td>{{ $item->time_to_expiration  }}</td>
                                    <td>{{ $item->date_of_expiration }}</td>
                                    <td class="text-right">
                                        <div class="row">
                                            <div class="btn-group">
                                                <a href="{{ route('show_packages', ['id' => $item->id]) }}" type="button" class="btn ink-reaction btn-floating-action btn-primary">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{ route('edit_packages', ['id' => $item->id]) }}"type="button" class="btn ink-reaction btn-floating-action btn-warning">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{ route('destroy_packages', ['id' => $item->id]) }}" type="button" class="btn ink-reaction btn-floating-action btn-danger">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>



                        {{ $packages->links() }}
                    </div>


                </div>
            </div>
        </section>
    </div>

@endsection