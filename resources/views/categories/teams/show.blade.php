@extends('master')

@section('css')
    <link href={{ URL::asset('/css/hero.css') }} rel="stylesheet">
@endsection

@section('content')
    <div class="m-hero m-hero--logo">
        <div class="s-inner">
            <div class="s-inner__content">
                <div class="s-title s-title--pointer">
                    @if($team->owner_id === Auth::user()?->id)
                        <div class="btn-group">
                            <button type="button"
                                    class="s-title s-title--pointer btn dropdown-toggle text-white border-0 p-0 m-0"
                                    data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                <span class="text-wrap text-break">{{ $team->name }}</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">Редактировать</a></li>
                                <li><a class="dropdown-item" href="#">Удалить</a></li>
                            </ul>
                        </div>
                    @else
                        <span class="text-wrap text-break">{{ $team->name }}</span>
                    @endif
                </div>
                <div class="s-logo object-fit-cover">
                    <img class="s-logo__img"
                         src="{{ Storage::url($team->logo->path) }}"
                         alt="{{ $team->name }}"
                         style="height: 130px; width: 130px;border-radius: 100%;">
                </div>
            </div>
        </div>
    </div>

    <div class="pt-1 pt-lg-5">
        <div class="row justify-content-end">
            <div class="col-12 col-md-4 d-flex justify-content-center">
                <div class="d-none d-lg-block order-md-0">
                    <ul class="nav nav-underline flex-row" style="--bs-nav-underline-link-active-color:#0d6efd;"
                        id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#roster"
                                    type="button" role="tab" aria-controls="roster" aria-selected="true">Состав
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#staff"
                                    type="button" role="tab" aria-controls="staff" aria-selected="false">Персонал
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#about"
                                    type="button" role="tab" aria-controls="about" aria-selected="false">О команде
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-md-4 d-flex justify-content-end mb-2 mb-md-0">
                @if($team->owner_id !== Auth::user()?->id)
                    <div class="flex-grow-1 flex-md-grow-0">
                        <a href="#" class="btn btn-primary w-100">Вступить</a>
                    </div>
                @endif
            </div>
        </div>

        <!-- Small screen -->
        <div class="accordion d-md-none order-1" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        Игроки
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <span>No data to display</span>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        Официальные лица команды
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <span>Основатель:</span> <a href="#"
                                                    class="link-underline link-underline-opacity-0">{{ $team->owner->first_name . ' ' . $team->owner->last_name }}</a>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseThree" aria-expanded="false"
                            aria-controls="flush-collapseThree">
                        Информация о команде
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse"
                     data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <span>{{ $team->description ? $team->description : 'Описание отсутствует' }}</span>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Large screen -->
    <div class="pt-2 d-none d-md-block tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="roster" role="tabpanel" aria-labelledby="roster-tab">
            <h3>Игроки</h3>
            <span>No data to display</span>
        </div>
        <div class="tab-pane fade" id="staff" role="tabpanel" aria-labelledby="staff-tab">
            <h3>Официальные лица команды</h3>
            <span>Основатель:</span> <a href="#"
                                      class="link-underline link-underline-opacity-0">{{ $team->owner->first_name . ' ' . $team->owner->last_name }}</a>
        </div>
        <div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="about-tab">
            <h3>Информация о команде</h3>
            <p>
                {{ $team->description ? $team->description : 'Описание отсутствует' }}
            </p>
        </div>
    </div>
@endsection
