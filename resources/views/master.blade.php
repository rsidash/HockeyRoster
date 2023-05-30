@extends('layouts.html-head')

@section('body')
    <body class="" style="font-family: 'Roboto', sans-serif; font-style: normal;">
    <header class="bg-light sticky-top">
        <!-- First header row not collapsed -->
        <div class="navbar navbar-expand-lg navbar-light">
            <div class="container-xxl">

            <!-- Navbar toggler -->
                <div class="navbar-toolbar d-flex flex-shrink-0 align-items-center">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarCollapse" aria-controls="#navbarCollapse" aria-expanded="false"
                            aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>

                <!-- Brand name -->
                <a class="navbar-brand d-flex justify-content-center me-0 me-md-2" href="{{ route('main') }}"
                   data-bs-toggle="tooltip" data-bs-placement="bottom"
                   title="На главную">
                    <img src={{ URL::asset('/images/silhouette-hockey-01.svg') }} alt="" width="40" height="34"
                         class="d-inline-block align-text-top">
                    <span class="d-none d-md-inline-flex">Hockey Roster App</span>
                </a>

                <!-- Profile -->
{{--                            <a class="" href="#" data-bs-toggle="tooltip" data-bs-placement="bottom"--}}
{{--                               title="Профиль">--}}
{{--                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"--}}
{{--                                     fill="#0094fd" class="bi bi-person-circle" viewBox="0 0 16 16">--}}
{{--                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>--}}
{{--                                    <path fill-rule="evenodd"--}}
{{--                                          d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>--}}
{{--                                </svg>--}}
{{--                            </a>--}}

                <!-- User profile on small displays -->
                 @auth
                <!-- Authorized user -->
                    <div class="d-lg-none flex-shrink-0 dropdown">
                        <a href="#" class="link-secondary text-decoration-none d-flex align-items-center"
                           id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                            @if (isset(Auth::user()->avatar_path))
                                <img
                                    src="{{ Storage::url(Auth::user()->avatar_path) }}"
                                    alt="{{ Auth::user()->email }}" width="32" height="32"
                                    class="rounded-circle">
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                     fill="#0094fd" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                    <path fill-rule="evenodd"
                                          d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                </svg>
                            @endif
                            <span
                                class="d-none d-md-inline-flex align-items-center fw-bold me-1 p-2">{{ Auth::user()->email }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end text-small shadow"
                            aria-labelledby="dropdownUser">
                            <li><a class="dropdown-item" href="#">Сообщения<span
                                        class="badge bg-primary ms-1">4</span></a></li>
                            <li><a class="dropdown-item" href="#">Профиль</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form id="logout-form-small" action="{{ route('auth.logout') }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item" type="submit">Выйти</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endauth

                @guest
                    <a href="{{ route('auth.create') }}" class="d-lg-none" tabindex="-1" role="button"
                       aria-disabled="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                             fill="#575b5e" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path fill-rule="evenodd"
                                  d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                        </svg>
                    </a>
                @endguest

            <!-- Collapsed -->
                <div class="w-100 navbar-nav-scroll">
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <!-- Primary menu -->
                        <ul class="navbar-nav ms-lg-auto">
                            <li class="nav-item">
                                <a class="nav-link {{ str_contains(Route::current()->getName(), 'teams') ? 'active' : '' }}"
                                   href="{{ route('teams.index') }}">Команды</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ str_contains(Route::current()->getName(), 'players') ? 'active' : '' }}"
                                   href="{{ route('players.index') }}">Игроки</a>
                            </li>
                        </ul>

                        <!-- City selector and profile buttons -->
                        <div class="d-lg-flex align-items-center ms-lg-auto">

                            <!-- User profile on large displays -->
                            <div class="d-lg-flex d-none">
                            @guest
                                <!-- User not authorized -->
                                    <a class="btn btn-outline-secondary me-1"
                                       href="{{ route('auth.create') }}">Войти</a>
                                    <a class="btn btn-primary"
                                       href="{{ route('register.create') }}">Регистрация</a>
                            @endguest
                            @auth
                                <!-- Authorized user -->
                                    <div class="flex-shrink-0 dropdown">
                                        <a href="#"
                                           class="link-secondary text-decoration-none d-flex align-items-center"
                                           id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span
                                            class="d-flex align-items-center fw-bold mx-2">{{ Auth::user()->email }}</span>
                                            @if (isset(Auth::user()->avatar_path))
                                                <img
                                                    src="{{ Storage::url(Auth::user()->avatar_path) }}"
                                                    alt="" width="32" height="32"
                                                    class="rounded-circle">
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                     fill="#0094fd" class="bi bi-person-circle" viewBox="0 0 16 16">
                                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                                    <path fill-rule="evenodd"
                                                          d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                                </svg>
                                            @endif
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end text-small shadow"
                                            aria-labelledby="dropdownUser" style="">
                                            <li><a class="dropdown-item" href="#">Сообщения<span
                                                        class="badge bg-primary ms-1">4</span></a></li>
                                            <li><a class="dropdown-item" href="#">Профиль</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li>
                                                <form id="logout-form" action="{{ route('auth.logout') }}"
                                                      method="POST">
                                                    @csrf
                                                    <button class="dropdown-item"
                                                            type="submit">Выйти
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                @endauth
                            </div>

                            <!-- User profile on small displays -->
                            {{--                        <div class="d-lg-none d-flex align-items-center">--}}
                            {{--                        @guest--}}
                            {{--                            <!-- User not authorized -->--}}
                            {{--                                <a class="btn btn-outline-primary me-1 col"--}}
                            {{--                                   href="#">Войти</a>--}}
                            {{--                                <a class="btn btn-primary col"--}}
                            {{--                                   href="#">Регистрация</a>--}}
                            {{--                            @endguest--}}
                            {{--                        </div>--}}

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>

    <div class="container-xxl">
        @yield('content')
    </div>
    </body>
@endsection
