@extends('layouts.html-head')

@section('css')
    <link href={{ URL::asset('/css/signin.css') }} rel="stylesheet">
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
                {{ __('validation.loginError.fail') }}
            </div>
            @enderror

            @if($errors->has('login') || $errors->has('password'))
                <div class="alert alert-danger my-2" role="alert">
                    {{ __('validation.loginError.login_password_not_filled') }}
                </div>
            @endif

{{--            @error('login')--}}
{{--                <div class="alert alert-danger my-2" role="alert">--}}
{{--                    {{ __('validation.loginError.login_not_filled') }}--}}
{{--                </div>--}}
{{--            @enderror--}}

{{--            @error('password')--}}
{{--                <div class="alert alert-danger my-2" role="alert">--}}
{{--                    {{ __('validation.loginError.password_not_filled') }}--}}
{{--                </div>--}}
{{--            @enderror--}}

            <div class="form-floating user-select-none">
                <input type="text"
                       class="form-control @error('login') is-invalid @enderror"
                       id="floatingInput" placeholder="Имя пользльзователя или Email"
                       name="login" value="{{ old('login') }}">
                <label for="floatingInput" class="user-select-none text-secondary">Имя пользльзователя или Email</label>
            </div>
            <div class="form-floating mt-2 user-select-none">
                <input type="password"
                       class="form-control @error('password') is-invalid @enderror"
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
                        <a href="{{ route('password.request') }}">{{ __('login.forgotPassword') }}</a>
{{--                    @endif--}}
                </div>
            </div>

            <div class="d-grid gap-2">
                <button class="w-100 btn btn-lg btn-primary" type="submit">{{ __('header.user.logIn') }}</button>
                <a class="w-100 btn btn-link" href="{{ route('register.create') }}">{{ __('header.user.signUp') }}</a>
            </div>
        </form>
    </div>
    </body>
@endsection
