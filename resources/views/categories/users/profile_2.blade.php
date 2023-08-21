@extends('master')

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
@endsection

@section('scripts')

@endsection

@section('content')
    {{--    <h4 class="mb-3 mt-3">Настройки</h4>--}}

    <div class="d-flex flex-nowrap gap-5 mt-2">
        <div class="d-none d-lg-block flex-shrink-0 p-3"> {{-- style="width: 280px;"--}}
            <h4 class="">Настройки</h4>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <button class="nav-link link-body-emphasis active" id="user-profile-tab" data-bs-toggle="tab"
                            data-bs-target="#userprofile"
                            type="button" role="tab" aria-controls="user-profile" aria-selected="true">Профиль
                        пользователя
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link link-body-emphasis" id="player-profile-tab" data-bs-toggle="tab"
                            data-bs-target="#playerprofile"
                            type="button" role="tab" aria-controls="player-profile" aria-selected="true">Профиль игрока
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link link-body-emphasis" id="coach-profile-tab" data-bs-toggle="tab"
                            data-bs-target="#coachprofile"
                            type="button" role="tab" aria-controls="coach-profile" aria-selected="false">Профиль тренера
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link link-body-emphasis" id="profile-security-tab" data-bs-toggle="tab"
                            data-bs-target="#profilesecurity"
                            type="button" role="tab" aria-controls="profile-security" aria-selected="false">Безопасность
                    </button>
                </li>
            </ul>
        </div>

        <div class="d-none d-md-block tab-content w-100" id="myTabContent">
            <div class="tab-pane fade show active" id="userprofile" role="tabpanel" aria-labelledby="userprofile-tab">
                <div class="row g-4">
                    <div class="col-6">
                        <label for="firstName" class="form-label">Имя</label>
                        <input type="text" class="form-control" id="firstName"
                               name="firstName" placeholder=""
                               value="{{ Auth::user()->first_name ? : 'Не заполнено' }}" disabled
                               readonly>
                    </div>

                    <div class="col-6">
                        <label for="lastName" class="form-label">Фамилия</label>
                        <input type="text" class="form-control" id="lastName"
                               name="lastName" placeholder=""
                               value="{{ Auth::user()->last_name ? : 'Не заполнено' }}" disabled
                               readonly>
                    </div>

                    <div class="col-6">
                        <label for="birthdate" class="form-label">Дата рождения</label>
                        <input type="date" class="form-control" id="birthdate"
                               name="birthdate"
                               value="{{ Auth::user()->birthdate }}" disabled readonly>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="playerprofile" role="tabpanel"
                 aria-labelledby="playerprofile-tab">
                <div class="row g-4">
                    <div class="col-sm-6">
                        <label for="jerseyNumber" class="form-label">Предпочитаемый игровой номер</label>
                        <select class="form-select" id="jerseyNumber" name="jerseyNumber" disabled>
                            <option value="" selected>1</option>
                        </select>
                    </div>

                    <div class="col-sm-6">
                        <label for="playerRole" class="form-label">Предпочитаемое амплуа</label>
                        <select class="form-select" id="playerRole" name="playerRole" disabled>
                            <option value="" selected>Вратарь</option>
                        </select>
                    </div>

                    <div class="col-sm-6">
                        <label for="height" class="form-label">Рост, м</label>
                        <input type="number" class="form-control" id="height"
                               name="height" value="{{ Auth::user()->height ? : 0 }}" disabled readonly>
                    </div>

                    <div class="col-sm-6">
                        <label for="weight" class="form-label">Вес, кг</label>
                        <input type="number" class="form-control" id="weight"
                               name="weight" value="{{ Auth::user()->weight ? : 0 }}" disabled readonly>
                    </div>

                    <div class="col-sm-6">
                        <label for="hand" class="form-label">Хват клюшки</label>
                        <select class="form-select" id="hand" name="hand" disabled>
                            <option value="" selected>Левый</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="coachprofile" role="tabpanel"
                 aria-labelledby="coachprofile-tab">
                <div class="row g-4">
                    <div class="col-6">
                        <label for="firstName" class="form-label">Имя</label>
                        <input type="text" class="form-control" id="firstName"
                               name="firstName" placeholder=""
                               value="{{ Auth::user()->first_name ? : 'Не заполнено' }}" disabled
                               readonly>
                    </div>

                    <div class="col-6">
                        <label for="firstName" class="form-label">Имя</label>
                        <input type="text" class="form-control" id="firstName"
                               name="firstName" placeholder=""
                               value="{{ Auth::user()->first_name ? : 'Не заполнено' }}" disabled
                               readonly>
                    </div>

                    <div class="col-6">
                        <label for="firstName" class="form-label">Имя</label>
                        <input type="text" class="form-control" id="firstName"
                               name="firstName" placeholder=""
                               value="{{ Auth::user()->first_name ? : 'Не заполнено' }}" disabled
                               readonly>
                    </div>

                    <div class="col-6">
                        <label for="lastName" class="form-label">Фамилия</label>
                        <input type="text" class="form-control" id="lastName"
                               name="lastName" placeholder=""
                               value="{{ Auth::user()->last_name ? : 'Не заполнено' }}" disabled
                               readonly>
                    </div>

                    <div class="col-6">
                        <label for="birthdate" class="form-label">Дата рождения</label>
                        <input type="date" class="form-control" id="birthdate"
                               name="birthdate"
                               value="{{ Auth::user()->birthdate }}" disabled readonly>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="profilesecurity" role="tabpanel"
                 aria-labelledby="profilesecurity-tab">
                <div class="row g-4">
                    <div class="col-sm-6">
                        <label for="jerseyNumber" class="form-label">Предпочитаемый игровой номер</label>
                        <select class="form-select" id="jerseyNumber" name="jerseyNumber" disabled>
                            <option value="" selected>1</option>
                        </select>
                    </div>

                    <div class="col-sm-6">
                        <label for="playerRole" class="form-label">Предпочитаемое амплуа</label>
                        <select class="form-select" id="playerRole" name="playerRole" disabled>
                            <option value="" selected>Вратарь</option>
                        </select>
                    </div>

                    <div class="col-sm-6">
                        <label for="height" class="form-label">Рост, м</label>
                        <input type="number" class="form-control" id="height"
                               name="height" value="{{ Auth::user()->height ? : 0 }}" disabled readonly>
                    </div>

                    <div class="col-sm-6">
                        <label for="weight" class="form-label">Вес, кг</label>
                        <input type="number" class="form-control" id="weight"
                               name="weight" value="{{ Auth::user()->weight ? : 0 }}" disabled readonly>
                    </div>

                    <div class="col-sm-6">
                        <label for="hand" class="form-label">Хват клюшки</label>
                        <select class="form-select" id="hand" name="hand" disabled>
                            <option value="" selected>Левый</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
