@extends('layouts.app')
@section('content')
    <!-- BEGIN CONTENT-->
    <div id="content">
        <section>
            <div class="section-header">
                <ol class="breadcrumb">
                    <li><a href="../../../html/pages/contacts/search.html">Contacts</a></li>
                    <li class="active">Add contact</li>
                </ol>
            </div>
            <div class="section-body contain-lg">
                <div class="row">

                    <!-- BEGIN ADD CONTACTS FORM -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-head style-primary">
                                <header>Novo candidato</header>
                            </div>
                            @include('admin.peoples.candidates.__form')
                        </div><!--end .card -->
                    </div><!--end .col -->
                    <!-- END ADD CONTACTS FORM -->

                </div><!--end .row -->
            </div><!--end .section-body -->
        </section>
    </div><!--end #content-->
    @endsection