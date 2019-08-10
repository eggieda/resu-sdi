<!DOCTYPE html>
<html lang="{{ config('app.locale', 'en') }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>RESU-SDI | Forgot Password</title>

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
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
    
                            <input type="hidden" name="token" value="{{ $token }}">
    
                            <div class="form-group">
                                <label for="email" class="text-md-right">{{ __('E-Mail Address') }}</label>
    
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
    
                            <div class="form-group">
                                <label for="password" class="text-md-right">{{ __('Password') }}</label>
    
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
    
                            <div class="form-group">
                                <label for="password-confirm" class="text-md-right">{{ __('Confirm Password') }}</label>
    
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
    
                            <div class="form-group mb-0">
                                <div class="offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <p class="text-center text-white small mt-5">RESU © 2019 Project SDI - By Eggie Dear Asmara - Universitas Muhammadiyah Sidoarjo</p>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('js/core/jquery.3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/core/popper.min.js') }}"></script>

</body>

</html>
