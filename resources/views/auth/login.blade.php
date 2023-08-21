@extends('layouts.html-head')

@section('css')
    <link href={{ URL::asset('/css/signin.css') }} rel="stylesheet">

    <style>
        .or-container {
            align-items: center;

            display: flex;
            margin: 25px 0;
        }

        .line-separator {
            background-color: #ccc;
            flex-grow: 5;
            height: 1px;
        }

        .or-label {
            flex-grow: 1;
            margin: 0 15px;
            text-align: center;
        }
    </style>
@endsection

@section('body')
    <body class="text-center">
    <div class="form-signin">
        <form method="post" action="{{ route('auth.login') }}">
            @csrf
            <a href="{{ route('main') }}" data-bs-toggle="tooltip" data-bs-placement="bottom" class="user-select-none"
               title="{{ __('header.goToHomepage') }}"><img class="mb-4"
                                                            src={{ URL::asset('/images/silhouette-hockey-01.svg') }}  alt="{{ __('header.goToHomepage') }}"
                                                            width="72" height="57"></a>
            <h1 class="h3 mb-3 fw-normal user-select-none">{{ __('login.title') }}</h1>

            @if(session('status'))
                <div class="alert alert-success my-2">
                    {{ session('status') }}
                </div>
            @endif

            @error('failedLogin')
            <div class="alert alert-danger my-2">
                {{ __('validation.loginError.email_password_not_correct') }}
            </div>
            @enderror

            @if ($errors->has('email') || $errors->has('password'))
                <div class="alert alert-danger my-2">
                    {{ __('validation.loginError.data_not_correct') }}
                </div>
            @endif

            {{--            @if($errors->has('email') || $errors->has('password'))--}}
            {{--                <div class="alert alert-danger my-2" role="alert">--}}
            {{--                    {{ __('validation.loginError.email_password_not_filled') }}--}}
            {{--                </div>--}}
            {{--            @endif--}}

            <div class="form-floating user-select-none">
                <input type="email"
                       class="form-control @if ($errors->any()) is-invalid @endif"
                       id="floatingInput" placeholder="Email"
                       name="email" value="{{ old('email') }}">
                <label for="floatingInput" class="user-select-none text-secondary">Email</label>
            </div>
            <div class="form-floating mt-2 user-select-none">
                <input type="password"
                       class="form-control @if ($errors->any()) is-invalid @endif"
                       id="floatingPassword" placeholder="{{ __('login.password') }}"
                       name="password">
                <label for="floatingPassword" class="user-select-none text-secondary">{{ __('login.password') }}</label>
            </div>

            <div class="d-flex flex-wrap justify-content-between">
                <div class="checkbox mb-3 col">
                    <label class="user-select-none">
                        <input type="checkbox"
                               name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('login.rememberMe') }}
                    </label>
                </div>
                <div class="label label-default col">
                    {{--                    @if (Route::has('password.request'))--}}
                    <a class="link-underline link-underline-opacity-0"
                       href="{{ route('password.request') }}">{{ __('login.forgotPassword') }}</a>
                    {{--                    @endif--}}
                </div>
            </div>

            <div class="d-grid gap-2">
                <button class="w-100 btn btn-lg btn-primary" type="submit">{{ __('header.user.logIn') }}</button>
                <a class="w-100 btn btn-link link-underline link-underline-opacity-0"
                   href="{{ route('register.create') }}">{{ __('header.user.signUp') }}</a>
            </div>

        </form>

        <div>
            <div class="or-container">
                <div class="line-separator"></div>
                <div class="or-label text-uppercase">ИЛИ</div>
                <div class="line-separator"></div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <a class="btn btn-link link-underline link-underline-opacity-0" href="{{ route('google.redirect') }}">
                        <img
                            src="data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' viewBox='0 0 48 48'%3E%3Cdefs%3E%3Cpath id='a' d='M44.5 20H24v8.5h11.8C34.7 33.9 30.1 37 24 37c-7.2 0-13-5.8-13-13s5.8-13 13-13c3.1 0 5.9 1.1 8.1 2.9l6.4-6.4C34.6 4.1 29.6 2 24 2 11.8 2 2 11.8 2 24s9.8 22 22 22c11 0 21-8 21-22 0-1.3-.2-2.7-.5-4z'/%3E%3C/defs%3E%3CclipPath id='b'%3E%3Cuse xlink:href='%23a' overflow='visible'/%3E%3C/clipPath%3E%3Cpath clip-path='url(%23b)' fill='%23FBBC05' d='M0 37V11l17 13z'/%3E%3Cpath clip-path='url(%23b)' fill='%23EA4335' d='M0 11l17 13 7-6.1L48 14V0H0z'/%3E%3Cpath clip-path='url(%23b)' fill='%2334A853' d='M0 37l30-23 7.9 1L48 0v48H0z'/%3E%3Cpath clip-path='url(%23b)' fill='%234285F4' d='M48 48L17 24l-4-3 35-10z'/%3E%3C/svg%3E"
                            width="20px" height="20px" alt="google">
                        <span>Войти через Google</span>
                    </a>
                </div>
            </div>
        </div>

    </div>
    </body>
@endsection
