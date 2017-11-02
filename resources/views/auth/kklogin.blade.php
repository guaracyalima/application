<!DOCTYPE html>
<html lang="en">
<head>
    <title>Eleja-se</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="your,keywords">
    <meta name="description" content="Short explanation about this website">
    <link rel="stylesheet" href="{{ asset ('assets/css/app.min.css') }}">
</head>
<body class="login-page menubar-hoverable header-fixed ">
<section class="section-account">
    {{--<div class="img-backdrop" style="background-image: url('../../assets/img/img16.jpg')"></div>--}}
    <div class="spacer"></div>
    <div class="card contain-sm style-transparent">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <br/>
                    <span class="text-lg text-bold text-primary"> <h1>Eleja-se</h1></span>
                    <h6>Faça login para acessar o sistema</h6>
                    <br/><br/>
                    <form class="form floating-label"  method="POST" action="{{ route('login') }}" accept-charset="utf-8">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                <label for="username">E-mail</label>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="password" type="password" class="form-control" name="password" required>
                                <label for="password">Senha</label>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>


                        <br/>
                        <div class="row">
                            <div class="col-xs-6 text-left">
                                <div class="checkbox checkbox-inline checkbox-styled">
                                    <label>
                                        <input type="checkbox"> <span>Lembre-se de min</span>
                                    </label>
                                </div>
                            </div><!--end .col -->
                            <div class="col-xs-6 text-right">
                                <button class="btn btn-primary btn-raised" type="submit">Login</button>
                            </div><!--end .col -->
                        </div><!--end .row -->

                        <div class="row">
                            <h4>Login social</h4>
                            <p>
                                <a href="#" class="btn btn-block btn-raised btn-info">
                                    <i class="fa fa-facebook pull-left"></i>
                                    Entrar com Facebook
                                </a>
                            </p>
                            <p>
                                <a href="#" class="btn btn-block btn-raised btn-info">
                                    <i class="fa fa-twitter pull-left"></i>
                                    Entrar com Twitter
                                </a>
                            </p>
                        </div>
                    </form>
                </div><!--end .col -->
                <div class="col-sm-5 col-sm-offset-1 text-center">
                    <img src="{{ asset ('assets/img/login.jpg') }}" alt="" class="img-responsive">
                </div><!--end .col -->
            </div><!--end .row -->
        </div><!--end .card-body -->
    </div><!--end .card -->
</section>
<!-- END LOGIN SECTION -->



</body>
<script src="{{ asset('assets/js/app.js') }}"></script>
</body>
</html>
