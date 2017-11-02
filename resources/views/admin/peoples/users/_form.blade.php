<div class="row">
    <div class="col-lg-12">
        <h4>Floating label</h4>
    </div><!--end .col -->
    <div class="col-lg-3 col-md-4">
        <article class="margin-bottom-xxl">
            <p>
                The vertical layout can be used in combination with a floating label.
                With floating labels, when the user engages with the input fields, the labels move to float above the field.
            </p>
        </article>
    </div><!--end .col -->
    <div class="col-lg-offset-1 col-md-8">
        <form class="form">
            <div class="card">
                <div class="card-head style-primary">
                    <header>Create an account</header>
                </div>
                <div class="card-body floating-label">
                    <div>
                        <label class="radio-inline radio-styled">
                            <input type="radio" name="gendre"><span>Male</span>
                        </label>
                        <label class="radio-inline radio-styled">
                            <input type="radio" name="gendre" checked><span>Female</span>
                        </label>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="Firstname2">
                                <label for="Firstname2">Firstname</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="Lastname2">
                                <label for="Lastname2">Lastname</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="Username2">
                        <label for="Username2">Username</label>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="Password2">
                        <label for="Password2">Password</label>
                    </div>
                    <div class="checkbox checkbox-styled">
                        <label>
                            <input type="checkbox" value="">
                            <span>Send me weekly updates</span>
                        </label>
                    </div>
                </div><!--end .card-body -->
                <div class="card-actionbar">
                    <div class="card-actionbar-row">
                        <button type="submit" class="btn btn-flat btn-primary ink-reaction">Create account</button>
                    </div>
                </div>
            </div><!--end .card -->
            <em class="text-caption">Vertical layout with floating labels</em>
        </form>
    </div><!--end .col -->
</div><!--end .row -->