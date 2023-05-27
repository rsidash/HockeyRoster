@extends('master')

@section('css')
    <style>
        body {
            background: url({{ URL::asset('/images/fon.webp') }}) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;

            overflow-y:hidden;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-12 d-flex align-items-center justify-content-start" style="min-height: 100vh;">
            <div>
                <!-- Content within the centered div -->
                <h1 class="text-white text-uppercase text-break">Стань частью истории побед</h1>
                <div class="d-flex flex-column flex-md-row justify-content-center gap-2 gap-md-5">
                    <a class="btn btn-light" href="{{ route('teams.create') }}">Создать команду</a>
                    <a class="btn btn-light" href="{{ route('teams.index') }}">Смотреть команды</a>
                </div>
            </div>
        </div>
    </div>
@endsection
