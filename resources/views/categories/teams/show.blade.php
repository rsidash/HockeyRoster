@extends('master')

@section('css')
    <link href={{ URL::asset('/css/hero.css') }} rel="stylesheet">
@endsection

@section('content')
    <div class="m-hero m-hero--logo">
        <div class="s-inner">
            <div class="s-inner__content">
                <div class="s-title s-title--pointer">
                    <span>{{ $team->name }}</span>
                </div>
                <div class="s-logo">
                    <img class="s-logo__img"
                         src="https://www.shutterstock.com/image-vector/ui-image-placeholder-wireframes-apps-260nw-1037719204.jpg"
                         alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="pt-4">
        <div class="d-flex justify-content-center gap-2 m-2">
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
@endsection
