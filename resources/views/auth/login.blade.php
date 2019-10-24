<!DOCTYPE html>
<html lang="{{ config('app.locale', 'en') }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>RESU-SDI | Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">

    <style>
        html {
            margin: 0px;
            height: 100%;
            width: 100%;
        }

        body {
            margin: 0px;
            min-height: 100%;
            width: 100%;
            background-color: gray;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }

        body .container {
            width: 100%;
            height: 100vh;
        }

        body .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.75);
        }
    </style>

</head>

<body>
    <div class="overlay"></div>
    <div class="container">
        <div class="row h-100 justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 my-auto">
                <div class="card card-login mx-auto mt-5 border-0 shadow-sm">
                    <div class="card-header bg-danger border-0 text-light text-center">
                        <h3>WELCOME</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="text" id="inputEmail" class="form-control{{ $errors->has('uid') || $errors->has('email') ? ' is-invalid' : '' }}" placeholder="NIK / Email address" required="required" autofocus="autofocus" name="login" value="{{ old('uid') ?: old('email') }}">
                                    @if($errors->has('uid') ?: $errors->has('email'))
                                        <span class="has-error">
                                            <strong>{{ $errors->first('uid') ?: $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="password" id="inputPassword" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" required="required" name="password">
                                    @if($errors->has('password'))
                                        <span class="has-error">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="remember-me">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                            <button class="btn btn-danger btn-block" type="submit">Login</button>
                        </form>
                        <div class="mt-2 text-right">
                            <a class="d-block small text-danger" href="{{ route('password.request') }}">Forgot Password?</a>
                        </div>
                    </div>
                </div>
                <p class="text-center text-white small mt-5">{{ config('resu.copyright') }}</p>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('js/core/jquery.3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/core/popper.min.js') }}"></script>

</body>

</html>
