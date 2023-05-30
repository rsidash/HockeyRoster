@extends('layouts.html-head')

@section('css')
    <link href={{ URL::asset('/css/signin.css') }} rel="stylesheet">
@endsection

@section('body')
    <body class="text-center">
    <div class="form-signin">
        <form method="post" action="{{ route('verification.send') }}">
            @csrf
            <a href="{{ route('main') }}" data-bs-toggle="tooltip" data-bs-placement="bottom" class="user-select-none"
               title="{{ __('header.goToHomepage') }}"><img class="mb-4"
                                                            src={{ URL::asset('/images/silhouette-hockey-01.svg') }}  alt="{{ __('header.goToHomepage') }}"
                                                            width="72" height="57"></a>
            <h1 class="h3 mb-3 fw-normal user-select-none">Подтверждение почты</h1>

            @if (session('status'))
                <div class="alert alert-success my-2" role="alert">
                    {{ session('status') }}
                </div>
                @else
                <div class="alert alert-primary my-2 text-wrap" role="alert">
                    Необходимо подтвердить почту. Ссылка будет отправлена на указанную Вами почту
                </div>
            @endif

            <div class="d-grid gap-2">
                <button class="w-100 btn btn-lg btn-primary" type="submit">Отправить ссылку</button>
            </div>

        </form>
    </div>
    </body>
@endsection
