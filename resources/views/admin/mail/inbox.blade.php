@extends('layouts.app')
@section('content')
    <section class="has-actions style-default-bright">

        <!-- BEGIN INBOX -->
        <div class="section-body">
            <div class="row">

                <!-- BEGIN INBOX NAV -->
                <div class="col-sm-4 col-md-3 col-lg-2">
                    <form class="navbar-search margin-bottom-xxl" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" name="contactSearch" placeholder="Enter your keyword">
                        </div>
                        <button type="submit" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-search"></i></button>
                    </form>
                    <ul class="nav nav-pills nav-stacked nav-icon">
                        <li><small>MAILBOXES</small></li>
                        <li class="active"><a href="../../html/mail/inbox.html"><span class="glyphicon glyphicon-inbox"></span>Inbox <small>(45)</small></a></li>
                        <li><a href="../../html/mail/inbox.html" class="text-default-light">Starred</a></li>
                        <li><a href="../../html/mail/inbox.html" class="text-default-light">Important</a></li>
                        <li><a href="../../html/mail/inbox.html">Sent</a></li>
                        <li><a href="../../html/mail/inbox.html" class="text-default-light">Draft</a></li>
                        <li><a href="../../html/mail/inbox.html"><span class="glyphicon glyphicon-trash"></span>Trash</a></li>
                        <li><a href="../../html/mail/inbox.html"><span class="glyphicon glyphicon-paperclip"></span>Attachments</a></li>
                        <li><small>Tags</small></li>
                        <li><a href="#"><i class="fa fa-dot-circle-o text-info"></i>Unread</a></li>
                        <li><a href="#"><i class="fa fa-dot-circle-o text-danger"></i>Important</a></li>
                        <li><a href="#"><i class="fa fa-dot-circle-o text-success"></i>Success</a></li>
                    </ul>
                </div><!--end . -->
                <!-- END INBOX NAV -->

                <div class="col-sm-8 col-md-9 col-lg-10">
                    <div class="text-divider visible-xs"><span>Email list</span></div>
                    <div class="row">

                        <!-- BEGIN INBOX EMAIL LIST -->
                        <div class="col-md-5 col-lg-4 height-6 scroll-sm">
                            <div class="list-group list-email list-gray">
                                <a href="../../html/mail/inbox.html" class="list-group-item">
                                    <h5>Jonathan Smith</h5>
                                    <h4>I am on my way</h4>
                                    <p class="hidden-xs hidden-sm">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit...</p>
                                    <div class="stick-top-right small-padding text-default-light text-sm">12:46 am</div>
                                    <div class="stick-bottom-right small-padding"><span class="glyphicon glyphicon-paperclip"></span></div>
                                </a>
                                <a href="../../html/mail/inbox.html" class="list-group-item focus">
                                    <div class="stick-top-left small-padding"><i class="fa fa-dot-circle-o text-info"></i></div>
                                    <h5>Alicia Spinnet</h5>
                                    <h4>Reaching the top</h4>
                                    <div class="stick-top-right small-padding text-default-light text-sm">08:12 am</div>
                                    <p class="hidden-xs hidden-sm">We are already halfway there. There are still some obstacles that we must take, but I do not expect any problems...</p>
                                </a>
                                <a href="../../html/mail/inbox.html" class="list-group-item">
                                    <h5>Peter Pitt</h5>
                                    <h4>Seeing the top</h4>
                                    <div class="stick-top-right small-padding text-default-light text-sm">Yesterday</div>
                                    <p class="hidden-xs hidden-sm">Please check the new headlines of the magazine. They are quite insignificant compared with...</p>
                                </a>
                                <a href="../../html/mail/inbox.html" class="list-group-item">
                                    <div class="stick-top-left small-padding"><i class="fa fa-dot-circle-o text-info"></i></div>
                                    <h5>Alicia Spinnet</h5>
                                    <h4>Meeting next monday</h4>
                                    <div class="stick-top-right small-padding text-default-light text-sm">Jul 12</div>
                                    <p class="hidden-xs hidden-sm">Proin nonummy, lacus eget pulvinar lacinia, pede felis dignissim leo, vitae tristique magna lacus...</p>
                                    <div class="stick-bottom-right small-padding"><span class="glyphicon glyphicon-paperclip"></span></div>
                                </a>
                                <a href="../../html/mail/inbox.html" class="list-group-item">
                                    <h5>Dennis Riker</h5>
                                    <h4>I'm on my way</h4>
                                    <div class="stick-top-right small-padding text-default-light text-sm">Jul 07</div>
                                </a>
                                <a href="../../html/mail/inbox.html" class="list-group-item">
                                    <h5>John West</h5>
                                    <h4>The great escape</h4>
                                    <div class="stick-top-right small-padding text-default-light text-sm">Jun 24</div>
                                    <p class="hidden-xs hidden-sm">Proin nonummy, lacus eget pulvinar lacinia, pede felis dignissim leo, vitae tristique magna lacus...</p>
                                </a>
                                <a href="../../html/mail/inbox.html" class="list-group-item">
                                    <div class="stick-top-left small-padding"><i class="fa fa-dot-circle-o text-info"></i></div>
                                    <h5>George Williams</h5>
                                    <h4>I'm at the gym at 9 pm</h4>
                                    <div class="stick-top-right small-padding text-default-light text-sm">Jun 22</div>
                                </a>
                            </div><!--end .list-group -->
                        </div><!--end .col -->
                        <!-- END INBOX EMAIL LIST -->

                        <!-- BEGIN EMAIL CONTENT -->
                        <div class="col-md-7 col-lg-8">
                            <div class="text-divider hidden-md hidden-lg"><span>Email</span></div>
                            <h1 class="no-margin">Reaching the top</h1>
                            <div class="btn-group stick-top-right">
                                <a href="../../html/mail/reply.html" class="btn btn-icon-toggle btn-default"><i class="md md-delete"></i></a>
                                <a href="../../html/mail/reply.html" class="btn btn-icon-toggle btn-default"><i class="md md-reply"></i></a>
                                <a href="../../html/mail/reply.html" class="btn btn-icon-toggle btn-default"><i class="md md-reply-all"></i></a>
                                <a href="../../html/mail/reply.html" class="btn btn-icon-toggle btn-default"><i class="md md-forward"></i></a>
                            </div>
                            <span class="pull-right text-default-light">Today, 08:12 am</span>
                            <strong>Alicia Spinnet</strong>
                            <hr/>
                            <p class="lead">We are already halfway there. There are still some obstacles that we must take, but I do not expect any problems. Dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <p><img class="img-responsive" src="../../assets/img/img14.jpg?1404589160" alt="" /></p>
                            <p>Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum consequat mi. Donec fermentum. Pellentesque malesuada nulla a mi. Duis sapien sem, aliquet nec, commodo eget, consequat quis, neque. Aliquam faucibus, elit ut dictum aliquet, felis nisl adipiscing sapien, sed malesuada diam lacus eget erat. Cras mollis scelerisque nunc. Nullam arcu. Aliquam consequat. Curabitur augue lorem, dapibus quis, laoreet et, pretium ac, nisi. Aenean magna nisl, mollis quis, molestie eu, feugiat in, orci. In hac habitasse platea dictumst.</p>
                            <p>Fusce convallis, mauris imperdiet gravida bibendum, nisl turpis suscipit mauris, sed placerat ipsum urna sed risus. In convallis tellus a mauris. Curabitur non elit ut libero tristique sodales. Mauris a lacus. Donec mattis semper leo. In hac habitasse platea dictumst. Vivamus facilisis diam at odio. Mauris dictum, nisi eget consequat elementum, lacus ligula molestie metus, non feugiat orci magna ac sem. Donec turpis. Donec vitae metus. Morbi tristique neque eu mauris. Quisque gravida ipsum non sapien. Proin turpis lacus, scelerisque vitae, elementum at, lobortis ac, quam. Aliquam dictum eleifend risus. In hac habitasse platea dictumst. Etiam sit amet diam. Suspendisse odio. Suspendisse nunc. In semper bibendum libero.</p>
                            <p>Proin nonummy, lacus eget pulvinar lacinia, pede felis dignissim leo, vitae tristique magna lacus sit amet eros. Nullam ornare. Praesent odio ligula, dapibus sed, tincidunt eget, dictum ac, nibh. Nam quis lacus. Nunc eleifend molestie velit. Morbi lobortis quam eu velit. Donec euismod vestibulum massa. Donec non lectus. Aliquam commodo lacus sit amet nulla. Cras dignissim elit et augue. Nullam non diam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In hac habitasse platea dictumst. Aenean vestibulum. Sed lobortis elit quis lectus. Nunc sed lacus at augue bibendum dapibus.</p>
                            <p>Aliquam vehicula sem ut pede. Cras purus lectus, egestas eu, vehicula at, imperdiet sed, nibh. Morbi consectetuer luctus felis. Donec vitae nisi. Aliquam tincidunt feugiat elit. Duis sed elit ut turpis ullamcorper feugiat. Praesent pretium, mauris sed fermentum hendrerit, nulla lorem iaculis magna, pulvinar scelerisque urna tellus a justo. Suspendisse pulvinar massa in metus. Duis quis quam. Proin justo. Curabitur ac sapien. Nam erat. Praesent ut quam.</p>
                        </div><!--end .col -->
                        <!-- END EMAIL CONTENT -->

                    </div><!--end .row -->
                </div><!--end .col -->
            </div><!--end .row -->
        </div><!--end .section-body -->
        <!-- END INBOX -->

        <!-- BEGIN SECTION ACTION -->
        <div class="section-action style-primary">
            <div class="section-action-row">
                <a class="btn ink-reaction btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Delete mail">
                    <span class="glyphicon glyphicon-trash"></span>
                </a>
                <a class="btn ink-reaction btn-icon-toggle" href="../../html/mail/reply.html" data-toggle="tooltip" data-placement="top" data-original-title="Reply to this mail">
                    <i class="fa fa-reply"></i>
                </a>
            </div>
            <div class="section-floating-action-row">
                <a class="btn ink-reaction btn-floating-action btn-lg btn-accent" href="../../html/mail/compose.html" data-toggle="tooltip" data-placement="top" data-original-title="Compose">
                    <i class="md md-add"></i>
                </a>
            </div>
        </div><!--end .section-action -->
        <!-- END SECTION ACTION -->

    </section>
    @endsection