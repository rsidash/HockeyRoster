@extends('master')

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
@endsection

@section('scripts')

@endsection

@section('content')
{{--    <h4 class="mb-3 mt-3">Настройки</h4>--}}

    <div class="d-flex flex-nowrap gap-5 mt-2">
        <div class="d-none d-lg-block flex-shrink-0 p-3" style="width: 280px;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <span class="fs-4">Настройки</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <button class="nav-link link-body-emphasis active" id="userprofile-tab" data-bs-toggle="tab" data-bs-target="#userprofile"
                            type="button" role="tab" aria-controls="roster" aria-selected="true">Профиль пользователя
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link link-body-emphasis" id="coach-tab" data-bs-toggle="tab" data-bs-target="#coach"
                            type="button" role="tab" aria-controls="coach" aria-selected="false">Профиль тренера
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link link-body-emphasis" id="security-tab" data-bs-toggle="tab" data-bs-target="#security"
                            type="button" role="tab" aria-controls="security" aria-selected="false">Безопасность
                    </button>
                </li>
            </ul>
        </div>

        <div class="row g-4">
            <div class="col-sm-6">
                <label for="firstName" class="form-label">Имя</label>
                <input type="text" class="form-control" id="firstName"
                       name="firstName" placeholder=""
                       value="{{ old('firstName') ? old('firstName') : Auth::user()->first_name }}" disabled readonly>
            </div>

            <div class="col-sm-6">
                <label for="lastName" class="form-label">Фамилия</label>
                <input type="text" class="form-control" id="lastName"
                       name="lastName" placeholder=""
                       value="{{ old('lastName') ? old('lastName') : Auth::user()->last_name }}" disabled readonly>
            </div>

            <div class="col-sm-6">
                <label for="jerseyNumber" class="form-label">Предпочитаемый игровой номер</label>
                <select class="form-select" id="jerseyNumber" name="jerseyNumber" disabled>
                    <option value="" selected>1</option>
                </select>
            </div>

            <div class="col-sm-6">
                <label for="birthdate" class="form-label">Дата рождения</label>
                <input type="date" class="form-control @error('birthdate') is-invalid @enderror" id="birthdate"
                       name="birthdate"
                       value="{{ old('birthdate') }}" disabled readonly>
            </div>

            <div class="col-sm-6">
                <label for="playerRole" class="form-label">Предпочитаемое амплуа</label>
                <select class="form-select" id="playerRole" name="playerRole" disabled>
                    <option value="" selected>Вратарь</option>
                </select>
            </div>

            <div class="col-sm-6">
                <label for="hand" class="form-label">Хват клюшки</label>
                <select class="form-select" id="hand" name="hand" disabled>
                    <option value="" selected>Левый</option>
                </select>
            </div>

            <div class="col-sm-6">
                <label for="height" class="form-label">Рост, м</label>
                <input type="number" class="form-control" id="height"
                       name="height" value="11" disabled readonly>
            </div>

            <div class="col-sm-6">
                <label for="weight" class="form-label">Вес, кг</label>
                <input type="number" class="form-control" id="weight"
                       name="weight" value="100" disabled readonly>
            </div>
        </div>
    </div>


@endsection
