@extends('layouts.html-head')

@section('css')
    <link href={{ URL::asset('/css/signin.css') }} rel="stylesheet">
@endsection

@section('body')
    <body class="text-center">
    <div class="form-signin">
        <form method="post" action="{{ route('password.request') }}">
            @csrf
            <a href="{{ route('main') }}" data-bs-toggle="tooltip" data-bs-placement="bottom" class="user-select-none"
               title="{{ __('header.goToHomepage') }}"><img class="mb-4"
                                                            src={{ URL::asset('/images/silhouette-hockey-01.svg') }}  alt="{{ __('header.goToHomepage') }}"
                                                            width="72" height="57"></a>
            <h1 class="h3 mb-3 fw-normal user-select-none">Восстановление пароля</h1>

            <small class="user-select-none">Укажите e-mail, указанный при регистрации, на него будет отправлена информация о восстановлении пароля</small>

            @if (session('status'))
                <div class="alert alert-success my-2" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            @error('email')
            <div class="alert alert-danger my-2" role="alert">
                {{ $message }}
            </div>
            @enderror

            @error('password_reset_failed')
            <div class="alert alert-danger my-2" role="alert">
                Ошибка. Повторите процедуру восстановления пароля
            </div>
            @enderror

            <div class="form-floating user-select-none my-2">
                <input type="email"
                       class="form-control rounded @error('email') is-invalid @enderror"
                       id="floatingInput" placeholder="E-mail"
                       name="email" value="{{ old('email') }}">
                <label for="floatingInput" class="user-select-none text-secondary">E-mail</label>
            </div>

            <div class="d-grid gap-2 mt-2">
                <button class="w-100 btn btn-lg btn-primary" type="submit">Отправить</button>
                <a class="w-100 btn btn-link" href="{{ route('auth.create') }}">Отмена</a>
            </div>
        </form>
    </div>
    </body>
@endsection
