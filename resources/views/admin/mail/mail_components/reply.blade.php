<section class="has-actions style-default-bright">

    <!-- BEGIN INBOX -->
    <div class="section-body">
        <div class="row">

            <!-- BEGIN INBOX NAV -->
            <div class="col-sm-4 col-md-3 col-lg-2 hidden-xs">
                <form class="navbar-search margin-bottom-xxl" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" name="contactSearch" placeholder="Enter your keyword">
                    </div>
                    <button type="submit" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-search"></i></button>
                </form>
                <ul class="nav nav-pills nav-stacked nav-icon">
                    <li><small>MAILBOXES</small></li>
                    <li class="focus"><a href="../../html/mail/inbox.html"><span class="glyphicon glyphicon-inbox"></span>Inbox <small>(45)</small></a></li>
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
            </div><!--end .col -->
            <!-- END INBOX NAV -->

            <div class="col-sm-8 col-md-9 col-lg-10">
                <div class="row">

                    <!-- BEGIN INBOX EMAIL LIST -->
                    <div class="col-md-5 col-lg-4 height-6 hidden-xs hidden-sm">
                        <div class="list-group list-email list-gray">
                            <a href="../../html/mail/inbox.html" class="list-group-item">
                                <h5>Jonathan Smith</h5>
                                <h4>I am on my way</h4>
                                <p class="hidden-xs hidden-sm">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit...</p>
                                <div class="stick-top-right small-padding text-default-light text-sm">12:46 am</div>
                                <div class="stick-bottom-right small-padding"><span class="glyphicon glyphicon-paperclip"></span></div>
                            </a>
                            <a href="../../html/mail/inbox.html" class="list-group-item ">
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

                    <!-- BEGIN MAIL REPLY -->
                    <div class="col-md-7 col-lg-8">
                        <h3>Reply</h3>
                        <form class="form" id="formCompose">
                            <div class="form-group floating-label">
                                <input type="email" class="form-control" id="to1" name="to1" value="alicia.spinnet@mountainresort.com">
                                <label for="to1">To</label>
                                <a class="link-default pull-right" href="#emailOptions" data-toggle="collapse">More</a>
                            </div><!--end .form-group -->
                            <div id="emailOptions" class="collapse">
                                <div class="form-group floating-label">
                                    <input type="email" class="form-control" id="cc1" name="cc1" >
                                    <label for="cc1">CC</label>
                                </div><!--end .form-group -->
                                <div class="form-group floating-label">
                                    <input type="email" class="form-control" id="bcc1" name="bcc1" >
                                    <label for="bcc1">BCC</label>
                                </div><!--end .form-group -->
                            </div><!--end #emailOptions -->
                            <div class="form-group floating-label">
                                <input type="text" class="form-control" id="Subject1" name="Subject1"  value="Re: Reaching the top">
                                <label for="Subject1">Subject</label>
                            </div><!--end .form-group -->
                            <div class="form-group">
												<textarea id="simple-summernote" name="message" class="form-control control-10-rows" placeholder="Enter message ..." spellcheck="false">
													<br/><br/>
													<hr/>
													<p>
														<strong>From:</strong> Alicia Spinnet<br/>
														<strong>Send:</strong>  ‎‎juli‎ ‎21, 2014 ‎11‎:‎17 PM<br/>
														<strong>To:</strong> Daniel johnson
													</p>
													<p>
														We are already halfway there. There are still some obstacles that we must take, but I do not expect any problems. Dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
													</p>
												</textarea>
                            </div><!--end .form-group -->
                        </form>
                    </div><!--end .col -->

                    <!-- BEGIN MAIL REPLY -->
                </div><!--end .row -->
            </div><!--end .col -->
        </div><!--end .row -->
    </div><!--end .section-body -->
    <!-- END INBOX -->

    <!-- BEGIN SECTION ACTION -->
    <div class="section-action style-primary">
        <div class="section-action-row">
            <a class="btn ink-reaction btn-icon-toggle" href="../../html/mail/inbox.html"><i class="fa fa-chevron-left"></i></a>
        </div>
        <div class="section-floating-action-row">
            <a class="btn ink-reaction btn-floating-action btn-lg btn-accent" href="#formCompose" data-submit="form"><i class="md md-send"></i></a>
        </div>
    </div>
    <!-- END SECTION ACTION -->

</section>