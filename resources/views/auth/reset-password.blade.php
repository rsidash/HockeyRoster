@extends('layouts.html-head')

@section('css')
    <link href={{ URL::asset('/css/signin.css') }} rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <style>
        form i {
            cursor: pointer;
        }

        .input-group {
            position: relative;
        }

        .input-group .show-hide-icon {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            z-index: 2; /* Adjust the z-index to make the icon appear above the input field */
        }

        .input-group input.form-control {
            padding-right: 40px; /* Adjust the padding to make space for the icon */
            z-index: 1; /* Set a lower z-index to make the input field appear below the icon */
        }
    </style>
@endsection

@section('scripts')
    <script src={{ URL::asset('/js/showHidePassword.js') }} crossorigin="anonymous"></script>
@endsection

@section('body')
    <body class="text-center">
    <div class="form-signin">
        <form method="post" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $request->token }}">

            <input type="hidden" name="email" value="{{ $request->email }}">

            <a href="{{ route('main') }}" data-bs-toggle="tooltip" data-bs-placement="bottom" class="user-select-none"
               title="{{ __('header.goToHomepage') }}"><img class="mb-4"
                                                            src={{ URL::asset('/images/silhouette-hockey-01.svg') }}  alt="{{ __('header.goToHomepage') }}"
                                                            width="72" height="57" alt="{ __('header.goToHomepage') }}"></a>
            <h1 class="h3 mb-3 fw-normal user-select-none">Смена пароля</h1>

            @if ($errors->any())
                @unless ($errors->has('password'))
                    <div class="alert alert-danger my-2" role="alert">
                        Ошибка. Повторите процедуру восстановления пароля
                    </div>
                @endunless
            @endif

            @error('password')
            <div class="alert alert-danger my-2" role="alert">
                {{ $message }}
            </div>
            @enderror

            {{--            <div class="form-floating user-select-none my-2">--}}
            {{--                <input type="text" readonly--}}
            {{--                       class="form-control rounded @error('email') is-invalid @enderror"--}}
            {{--                       id="floatingInput" placeholder="E-mail"--}}
            {{--                       name="email" value="{{ old('email', $request->email) }}">--}}
            {{--                <label for="floatingInput" class="user-select-none text-secondary">E-mail</label>--}}
            {{--            </div>--}}

            <div class="input-group my-2 user-select-none">
                <div class="form-floating">
                    <input type="password" name="password"
                           class="rounded form-control @error('password') is-invalid @enderror"
                           id="password" placeholder="Пароль" style="margin-bottom: 0;">
                    <label class="user-select-none text-secondary" for="password">Пароль</label>
                </div>
                <div class="input-group-append">
                    <span class="input-group-text show-hide-icon bg-body border-0 p-0" onclick="showHidePassword()">
                        <i id="showHidePasswordIcon" class="bi bi-eye"></i>
                    </span>
                </div>
            </div>

            <div class="input-group my-2 user-select-none">
                <div class="form-floating">
                    <input type="password" name="password_confirmation"
                           class="rounded form-control @error('password') is-invalid @enderror"
                           id="password_confirmation" placeholder="Подтвердите пароль" style="margin-bottom: 0;">
                    <label class="user-select-none text-secondary" for="password_confirmation">Подтвердите пароль</label>
                </div>
                <div class="input-group-append">
                    <span class="input-group-text show-hide-icon bg-body border-0 p-0" onclick="showHidePassword()">
                        <i id="showHideConfirmedPasswordIcon" class="bi bi-eye"></i>
                    </span>
                </div>
            </div>

            {{--            <div class="form-floating user-select-none my-2">--}}
            {{--                <input type="password" class="form-control rounded @error('password') is-invalid @enderror"--}}
            {{--                       id="password_confirmation" name="password_confirmation" placeholder="Подтвердите пароль"--}}
            {{--                       style="margin-bottom: 0;">--}}
            {{--                <label for="password_confirmation" class="user-select-none text-secondary">Подтвердите пароль</label>--}}
            {{--            </div>--}}

            <div class="d-grid gap-2 mt-2">
                <button class="w-100 btn btn-lg btn-primary" type="submit">Сменить пароль</button>
                <a class="w-100 btn btn-link" href="{{ route('auth.create') }}">Отмена</a>
            </div>
        </form>
    </div>
    </body>
@endsection
