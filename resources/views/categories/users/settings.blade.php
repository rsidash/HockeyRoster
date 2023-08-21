@extends('master')

@section('css')

@endsection

@section('scripts')

@endsection

@section('content')
    {{--        small screens--}}
    <div class="d-lg-none accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Личные данные
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>This is the first item's accordion body.</strong> It is shown by default, until the
                    collapse plugin adds the appropriate classes that we use to style each element. These classes
                    control the overall appearance, as well as the showing and hiding via CSS transitions. You can
                    modify any of this with custom CSS or overriding our default variables. It's also worth noting
                    that just about any HTML can go within the <code>.accordion-body</code>, though the transition
                    does limit overflow.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Данные игрока
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>This is the second item's accordion body.</strong> It is hidden by default, until the
                    collapse plugin adds the appropriate classes that we use to style each element. These classes
                    control the overall appearance, as well as the showing and hiding via CSS transitions. You can
                    modify any of this with custom CSS or overriding our default variables. It's also worth noting
                    that just about any HTML can go within the <code>.accordion-body</code>, though the transition
                    does limit overflow.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Данные персонала
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>This is the third item's accordion body.</strong> It is hidden by default, until the
                    collapse plugin adds the appropriate classes that we use to style each element. These classes
                    control the overall appearance, as well as the showing and hiding via CSS transitions. You can
                    modify any of this with custom CSS or overriding our default variables. It's also worth noting
                    that just about any HTML can go within the <code>.accordion-body</code>, though the transition
                    does limit overflow.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    Настройки безопасности
                </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>This is the third item's accordion body.</strong> It is hidden by default, until the
                    collapse plugin adds the appropriate classes that we use to style each element. These classes
                    control the overall appearance, as well as the showing and hiding via CSS transitions. You can
                    modify any of this with custom CSS or overriding our default variables. It's also worth noting
                    that just about any HTML can go within the <code>.accordion-body</code>, though the transition
                    does limit overflow.
                </div>
            </div>
        </div>
    </div>

    <div class="my-4">

        <div class="d-flex flex-nowrap gap-5 me-auto">

            <div class="me-5">
                <h1>Настройки</h1>
            </div>

            <div class="">

                <div class="d-none d-lg-block">
                    <div class="row">
                        <div class="">
                            <ul class="mb-5 nav nav-underline" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link link-body-emphasis active" id="user-profile-tab"
                                            data-bs-toggle="tab" data-bs-target="#userprofile" type="button" role="tab"
                                            aria-controls="user-profile" aria-selected="true">Общие
                                    </button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link link-body-emphasis" id="profile-security-tab"
                                            data-bs-toggle="tab" data-bs-target="#profilesecurity" type="button"
                                            role="tab" aria-controls="profile-security" aria-selected="false"
                                            tabindex="-1">
                                        Безопасность
                                    </button>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content" id="myTabContent">
                            <form class="tab-pane fade active show" id="userprofile" role="tabpanel"
                                  aria-labelledby="userprofile-tab" method="post"
                                  action="{{ route('settings.store') }}">
                                @csrf
                                <div class="">
                                    <h4 class="">Личные данные</h4>

                                    <div class="row">
                                        <div class="col-6">
                                            <label for="firstName" class="form-label">Имя</label>
                                            <input type="text" class="form-control" id="firstName" name="firstName"
                                                   placeholder="" value="{{ $user->first_name }}">
                                        </div>

                                        <div class="col-6">
                                            <label for="lastName" class="form-label">Фамилия</label>
                                            <input type="text" class="form-control" id="lastName" name="lastName"
                                                   placeholder="" value="{{ $user->last_name }}">
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-6">
                                            <label for="birthdate" class="form-label">Дата рождения</label>
                                            <input type="date" class="form-control" id="birthdate" name="birthdate"
                                                   value="{{ $user->birthdate?->format('Y-m-d') }}">
                                        </div>

                                        {{--                                        <div class="col-6">--}}
                                        {{--                                            <label for="sex" class="form-label">Пол</label>--}}
                                        {{--                                            <select class="form-select" id="sex" name="sex">--}}
                                        {{--                                                <option value="male" selected>Мужской</option>--}}
                                        {{--                                                <option value="female">Женский</option>--}}
                                        {{--                                            </select>--}}
                                        {{--                                        </div>--}}
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <h4 class="">Данные игрока</h4>

                                    <div class="row">
                                        <div class="col-6">
                                            <label for="jerseyNumber" class="form-label">Предпочитаемый номер</label>
                                            <select class="form-select" id="jerseyNumber" name="jerseyNumber">
                                                <option value="null" @if($player?->jersey_number == "null") selected @endif>Не выбрано</option>
                                                @for ($i = 1; $i < 100; $i++)
                                                    <option value="{{ $i }}"
                                                            @if($player->jersey_number == $i) selected @endif>{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>

                                        <div class="col-6">
                                            <label for="playerRole" class="form-label">Предпочитаемое амплуа</label>
                                            <select class="form-select" id="playerRole" name="playerRole">
                                                <option value="null" @if($player->stick_hand == "null") selected @endif>Не выбрано</option>
                                                @foreach($positions as $position)
                                                    <option value="{{ $position->id }}"
                                                            @if($player->position_id == $position->id) selected @endif>{{ $position->name_ru }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

{{--                                    <div class="row mt-3">--}}
{{--                                        <div class="col-6">--}}
{{--                                            <label for="height" class="form-label">Рост, м</label>--}}
{{--                                            <input type="number" class="form-control" id="height" name="height" min="0"--}}
{{--                                                   max="250" value="0">--}}
{{--                                        </div>--}}

{{--                                        <div class="col-6">--}}
{{--                                            <label for="weight" class="form-label">Вес, кг</label>--}}
{{--                                            <input type="number" class="form-control" id="weight" name="weight" min="0"--}}
{{--                                                   max="250" value="0">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

                                    <div class="row mt-1">
                                        <div class="col-6 mt-3">
                                            <label for="hand" class="form-label">Хват клюшки</label>
                                            <select class="form-select" id="hand" name="hand">
                                                <option value="null" @if($player->stick_hand == "null") selected @endif>Не выбрано</option>
                                                <option value="left" @if($player->stick_hand == "Left") selected @endif>Левый</option>
                                                <option value="right" @if($player->stick_hand == "Right") selected @endif>Правый</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="mt-4">
                                    <h4 class="">Данные персонала</h4>

                                    <div class="row">
                                        <div class="col-6">
                                            <label for="specialization" class="form-label">Специализация</label>
                                            <div class="form-check" id="specialization">
                                                <input class="form-check-input" type="checkbox" value=""
                                                       id="coachCheck" @if($staff->coachCheck == true) checked @endif>
                                                <label class="form-check-label" for="coachCheck">
                                                    Тренер
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                       id="managerCheck" @if($staff->managerCheck == true) checked @endif>
                                                <label class="form-check-label" for="managerCheck">
                                                    Менеджер
                                                </label>
                                            </div>
                                        </div>

                                        {{--                                        <div class="col-6">--}}
                                        {{--                                            <label for="experience" class="form-label">Опыт, лет</label>--}}
                                        {{--                                            <input type="number" class="form-control" id="experience" name="experience"--}}
                                        {{--                                                   min="0" max="100" value="0">--}}
                                        {{--                                        </div>--}}
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <button class="btn btn-primary" type="submit">Сохранить</button>
                                </div>
                            </form>

                            <form class="tab-pane fade" id="profilesecurity" role="tabpanel"
                                  aria-labelledby="profilesecurity-tab" method="post"
                                  action="{{ route('settings.store') }}">
                                @csrf
                                <div class="">
                                    <h4 class="">Данные аккаунта</h4>

                                    <div class="row">
                                        <div class="col-6">
                                            <label class="form-label" for="oldPassword">Старый пароль</label>
                                            <input type="password" name="oldPassword" class="form-control"
                                                   id="oldPassword" placeholder="Старый пароль">
                                        </div>

                                        <div class="col-6">
                                            <label class="form-label" for="oldPassword">Новый пароль</label>
                                            <input type="password" name="newPassword" class="form-control"
                                                   id="newPassword" placeholder="Новый пароль">
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-6">
                                            <label class="form-label" for="email">E-mail</label>
                                            <input type="email" name="email" class="form-control" id="email"
                                                   value="{{ Auth::user()->email }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <button class="btn btn-primary" type="submit">Сохранить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
