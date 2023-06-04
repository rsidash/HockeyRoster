@extends('layouts.html-head')

@section('css')
    <link href={{ URL::asset('/css/signin.css') }} rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#firstName').focus(function () {
                $('#firstNameHelp').show();
            }).blur(function () {
                $('#firstNameHelp').hide();
            });

            $('#lastName').focus(function () {
                $('#lastNameHelp').show();
            }).blur(function () {
                $('#lastNameHelp').hide();
            });

            $('#password').focus(function () {
                $('#passwordHelp').show();
            }).blur(function () {
                $('#passwordHelp').hide();
            });
        });
    </script>
@endsection

@section('body')
    <body class="text-center">
    <div class="form-signin">
        <div class="mt-3">
            <div class="row">
                <div class="col-md-12">
                    <a class="d-flex justify-content-center align-items-center link-underline link-underline-opacity-0"
                       href="{{ route('google.redirect') }}">
                        <img src="https://img.icons8.com/color/16/000000/google-logo.png" alt="google">Зарегистрироваться
                        с
                        помощью Google
                    </a>
                </div>
            </div>

            <div class="or-container">
                <div class="line-separator"></div>
                <div class="or-label text-uppercase">ИЛИ</div>
                <div class="line-separator"></div>
            </div>
        </div>

        <form method="post" action="{{ route('register.store') }}">
            @csrf
            <div class="form-floating mt-2 user-select-none">
                <input type="text" class="rounded form-control @error('firstName') is-invalid @enderror" id="firstName"
                       name="firstName" placeholder="Имя" value="{{ old('firstName') }}" pattern="[A-Za-z]+">
                <label for="firstName" class="user-select-none text-secondary">Имя</label>
                <div id="firstNameHelp" class="form-text" style="display: none;">Имя может содержать только буквы
                    латинского алфавита (A–z)
                </div>
                @error('firstName')
                <div class="alert alert-danger mt-1" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-floating mt-2 user-select-none">
                <input type="text" class="rounded form-control @error('lastName') is-invalid @enderror" id="lastName"
                       name="lastName" placeholder="Фамилия" value="{{ old('lastName') }}">
                <label for="lastName" class="user-select-none text-secondary">Фамилия</label>
                <div id="lastNameHelp" class="form-text" style="display: none;">Фамилия может содержать только буквы
                    латинского алфавита (A–z)
                </div>
                @error('lastName')
                <div class="alert alert-danger mt-1" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <script>
                function restrictToAlphabetic(inputField) {
                    inputField.addEventListener('keypress', function (event) {
                        let keyCode = event.keyCode || event.which;
                        let key = String.fromCharCode(keyCode);

                        let regex = /[A-Za-z]/;

                        if (!regex.test(key)) {
                            event.preventDefault();
                        }
                    });
                }

                document.addEventListener('DOMContentLoaded', function () {
                    let firstNameInput = document.getElementById('firstName');
                    let lastNameInput = document.getElementById('lastName');

                    restrictToAlphabetic(firstNameInput);
                    restrictToAlphabetic(lastNameInput);
                });
            </script>

            <div class="form-floating mt-2 user-select-none">
                <input type="email" class="rounded form-control @error('email') is-invalid @enderror" id="email"
                       name="email" placeholder="Email" value="{{ old('email') }}">
                <label for="email" class="user-select-none text-secondary">Email</label>
                @error('email')
                <div class="alert alert-danger mt-1" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="input-group mt-2 user-select-none">
                <div class="form-floating">
                    <input type="password" name="password"
                           class="rounded form-control @error('password') is-invalid @enderror"
                           id="password" placeholder="Пароль" style="margin-bottom: 0;">
                    <label class="user-select-none text-secondary" for="password">Пароль</label>
                    <div id="passwordHelp" class="form-text" style="display: none;">Пароль должен содержать не менее 8
                        символов
                    </div>
                </div>
                <div class="input-group-append">
                    <span class="input-group-text show-hide-icon bg-body border-0 p-0" onclick="showHidePassword()">
                        <i id="showHidePasswordIcon" class="bi bi-eye"></i>
                    </span>
                </div>
            </div>

            <div class="input-group mt-2 user-select-none">
                <div class="form-floating">
                    <input type="password" name="password_confirmation"
                           class="rounded form-control @error('password') is-invalid @enderror"
                           id="password_confirmation" placeholder="Подтвердите пароль" style="margin-bottom: 0;">
                    <label class="user-select-none text-secondary" for="password_confirmation">Подтвердите
                        пароль</label>
                </div>
                <div class="input-group-append">
                                <span class="input-group-text show-hide-icon bg-body border-0 p-0"
                                      onclick="showHidePassword()">
                                    <i id="showHideConfirmedPasswordIcon" class="bi bi-eye"></i>
                                </span>
                </div>
            </div>

            @error('password')
            <div class="alert alert-danger mt-1" role="alert">
                {{ $message }}
            </div>
            @enderror

            <div class="d-grid gap-2 mt-2">
                <button class="w-100 btn btn-lg btn-primary" type="submit">Регистрация</button>
                <div class="d-flex justify-content-center align-items-center">
                    <span>Есть аккаунт?</span>
                    <a class="btn btn-link link-underline link-underline-opacity-0" href="{{ route('auth.create') }}">Вход</a>
                </div>
            </div>
        </form>
    </div>
    </body>
@endsection
