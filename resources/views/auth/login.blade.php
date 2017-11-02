
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>StartUI - Premium Bootstrap 4 Admin Dashboard Template</title>
    <link rel="stylesheet" href="{{ asset('assets/css/login.min.css') }}">
</head>
<body>
<div class="page-center">
    <div class="page-center-in">
        <div class="container-fluid">
            <form class="sign-box" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="sign-avatar">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="">
                </div>
                <header class="sign-title">Eleja-se</header>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email">E-Mail Address</label>


                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif

                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password">Senha</label>


                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                </div>

                <div class="form-group">
                    <div class="checkbox float-left">
                        <input type="checkbox" id="signed-in" name="remember" {{ old('remember') ? 'checked' : '' }}/>
                        <label>Lembrar de min</label>
                    </div>
                    <div class="float-right reset">
                        <a href="{{ route('password.request') }}">Esqueci minha senha</a>
                    </div>
                </div>
                <button type="submit" class="btn btn-rounded">Entrar</button>
                <p class="sign-note">Ainda nao tem conta? <a href="sign-up.html">Ciar minha conta</a></p>

            </form>
        </div>
    </div>
</div>
<script src="{{ asset('assets/js/login.min.js') }}"></script>
<script>
    $(function() {
        $('.page-center').matchHeight({
            target: $('html')
        });

        $(window).resize(function(){
            setTimeout(function(){
                $('.page-center').matchHeight({ remove: true });
                $('.page-center').matchHeight({
                    target: $('html')
                });
            },100);
        });
    });
</script>
<script src="js/app.js"></script>
</body>
</html>