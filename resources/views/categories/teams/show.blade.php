@extends('master')

@section('content')
    <div>
        <div class="d-flex justify-content-center mb-2">
            <h1>{{ $team->name }}</h1>
        </div>
        <div>
            <div class="d-flex justify-content-center gap-2 mb-2">
                <a href="#" class="btn btn-primary disabled">Вступить</a>
                <a href="#" class="btn btn-secondary disabled">Редактировать</a>
                <a href="#" class="btn btn-danger disabled">Удалить</a>
            </div>
            <div class="mb-2">
                <h3>Игроки</h3>
                <span>No data to display</span>
            </div>
            <div class="">
                <h3>Официальные лица команды</h3>
                <span>No data to display</span>
            </div>
        </div>
    </div>
@endsection
