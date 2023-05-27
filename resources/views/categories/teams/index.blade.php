@extends('master')

@section('css')
    <style>
        /* Change font color on hover */
        .link-body-emphasis:hover .card-title {
            color: #0094fd;
        }
    </style>
@endsection

@section('content')
    @if ($errors->has('error'))
        <div class="alert alert-danger">
            {{ $errors->first('error') }}
        </div>
    @endif


    <!-- Control buttons -->
    <!-- Large screens -->
    <div class="d-none d-lg-flex my-4">
        <div class="">
            <h1 class="">Команды</h1>
        </div>
        <div class="align-self-center p-2">
            <a type="button" class="btn btn-outline-secondary align-items-center me-md-auto mb-2 mb-md-0"
               href="{{ route('teams.create') }}">
                <span class="me-1">Создать команду</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                     class="bi bi-plus-circle"
                     viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path
                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
            </a>
        </div>
        <div class="ms-auto align-self-center">
            <form class="input-group w-50 w-auto">
                <input class="form-control" type="text" placeholder="Поиск команды...">
                <button class="btn btn-outline-secondary" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                         class="bi bi-search" viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                    Найти
                </button>
            </form>
        </div>
    </div>

    <!-- Small screens -->
    <div class="d-lg-none my-4">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="my-2">Команды</h1>
            <a type="button" class="btn btn-sm btn-outline-primary align-items-center"
               href="{{ route('teams.create') }}">
                <span class="me-2">Создать команду</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                     class="bi bi-plus-circle"
                     viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path
                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
            </a>
        </div>
        <div class="">
            <form class="input-group w-50 w-auto">
                <input class="form-control form-control-sm" type="text" placeholder="Поиск команды...">
                <button class="btn btn-sm btn-outline-primary" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                         class="bi bi-search" viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                    Найти
                </button>
            </form>
        </div>
    </div>

    <!-- Large screens -->
    <div class="d-none d-lg-flex flex-wrap justify-content-center">
        @foreach($teams as $team)
            <a href="{{ route('teams.show', ['team' => $team->id]) }}"
               class="link-body-emphasis link-offset-2 link-underline-opacity-0 link-underline-opacity-0-hover">
                <div class="card border-0 m-2 text-center text-break" style="width: 12rem;">
                    <div class="d-flex justify-content-center">
                        <img
                            src="https://sportishka.com/uploads/posts/2021-11/thumbs/1637358523_2-sportishka-com-p-khokkei-oboi-komandnii-sport-foto-2.jpg"
                            class="object-fit-cover" alt="{{ $team->name }}"
                            style="height: 130px; width: 130px;border-radius: 100%;">
                    </div>

                    <div class="card-body pb-0">
                        <h5 class="card-title">{{ $team->name }}</h5>
                        {{--                    <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"--}}
                        {{--                       href="{{ route('teams.show', ['team' => $team->id]) }}">--}}
                        {{--                        Подробнее--}}
                        {{--                    </a>--}}
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    <!-- Small screens -->
    <div class="d-row d-lg-none">
        @foreach($teams as $team)
            <a href="{{ route('teams.show', ['team' => $team->id]) }}"
               class="link-dark link-offset-2 link-underline link-underline-opacity-0">
                <div class="card mb-1">
                    <div class="d-flex align-items-center g-0">
                        <div class="col-2">
                            <img
                                src="https://st.joinsport.io/team/1203296/logo/6202a17451719_173x173.png"
                                class="img-fluid img-thumbnail border-0" alt="{{ $team->name }}" width="64" height="64">
                        </div>
                        <div class="col-9">
                            <div class="card-body">
                                {{ $team->name }}
                            </div>
                        </div>
                        <div class="col-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-caret-right" viewBox="0 0 16 16">
                                <path
                                    d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection
