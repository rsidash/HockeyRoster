@extends('master')

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
@endsection

@section('scripts')
    <script src={{ URL::asset('/js/showHidePassword.js') }} crossorigin="anonymous"></script>

    <!-- JQUERY JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
@endsection

@section('content')
    <h4 class="mb-3 mt-3">Регистрация нового пользователя</h4>
    <form method="post" action="{{ route('register.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row g-3">
            <div class="col-sm-6">
                <label for="firstName" class="form-label">Имя</label>
                <input type="text" class="form-control @error('firstName') is-invalid @enderror" id="firstName"
                       name="firstName" placeholder="" value="{{ old('firstName') }}">
                <div id="usernameHelp" class="form-text">Имя может содержать только буквы
                    латинского алфавита (A–z)
                </div>
                @error('firstName')
                <div class="alert alert-danger mt-1" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-sm-6">
                <label for="lastName" class="form-label">Фамилия</label>
                <input type="text" class="form-control @error('lastName') is-invalid @enderror" id="lastName"
                       name="lastName" placeholder="" value="{{ old('lastName') }}">
                <div id="usernameHelp" class="form-text">Фамилия может содержать только буквы
                    латинского алфавита (A–z)
                </div>
                @error('lastName')
                <div class="alert alert-danger mt-1" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>

{{--            <div class="col-sm-6">--}}
{{--                <label for="username" class="form-label">Имя пользователя</label>--}}
{{--                <div class="input-group">--}}
{{--                    <span class="input-group-text">@</span>--}}
{{--                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"--}}
{{--                           name="username" placeholder="username" value="{{ old('username') }}">--}}
{{--                </div>--}}
{{--                <div id="usernameHelp" class="form-text">Имя пользователя может содержать только строчные буквы--}}
{{--                    латинского алфавита (a–z), цифры--}}
{{--                    (0-9), символ '_' и должно быть длиной от 2 до 20 символов--}}
{{--                </div>--}}
{{--                @error('username')--}}
{{--                <div class="alert alert-danger mt-1" role="alert">--}}
{{--                    {{ $message }}--}}
{{--                </div>--}}
{{--                @enderror--}}
{{--            </div>--}}

            <div class="col-sm-12">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                       name="email" placeholder="you@example.com" value="{{ old('email') }}">
                @error('email')
                <div class="alert alert-danger mt-1" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-sm-6">
                <label for="password" class="form-label">Пароль</label>
                <div class="input-group">
                    <input type="password" name="password"
                           class="form-control @error('password') is-invalid @enderror"
                           id="password">
                    <a id="showHidePassword" class="link-underline link-underline-opacity-0 input-group-text bi bi-eye"
                       onclick="showHidePassword()"></a>
                </div>
            </div>

            <div class="col-sm-6">
                <label for="password_confirmation" class="form-label">Повторите пароль</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror"
                       id="password_confirmation" name="password_confirmation">
            </div>

            <div class="col-12">
                @error('password')
                <div class="alert alert-danger mt-1" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="country" class="form-label">Страна</label>
                <select class="form-select @if($errors->has('country') || $errors->has('city')) is-invalid @endif"
                        id="country" name="country">
                    <option value="">Выберите страну...</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label for="city" class="form-label">Город</label>
                <select class="form-select @error('city') is-invalid @enderror" id="city" name="city">
                    <option value="">Выберите город...</option>
                </select>
                <input type="hidden" id="getCitiesByCountry" url="{{ url('get-cities-by-country-id') }}"
                       token="{{ csrf_token() }}"/>
                <script src="js/getCitiesByCountry.js"></script>
            </div>

            <div class="col-12">
                @if(($errors->has('country') || $errors->has('city')) || (strlen(old('country')) > 0))
                    <div class="alert alert-danger mt-1" role="alert">
                        Необходимо выбрать страну и город
                    </div>
                @endif
            </div>

            <div class="col-sm-2">
                <label for="phoneCode" class="form-label">Код страны<span
                        class="text-muted"> (Опционально)</span></label>
                <input type="hidden" id="getPhoneCodeByCountry" url="{{ url('get-phone-code-by-country-id') }}"
                       token="{{ csrf_token() }}"/>
                <script src="js/getPhoneCodeByCountry.js"></script>
                <select class="form-select" id="phoneCode" name="phoneCode">
                    <option value="">Выберите код...</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->country_code }} {{ $country->phone_code }}"
                                @if(old('phoneCode') == $country->country_code . ' ' . $country->phone_code)
                                selected
                            @endif>
                            {{ $country->country_code }} {{ $country->phone_code }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-sm-10">
                <label for="phone" class="form-label">Номер телефона<span
                        class="text-muted"> (Опционально)</span></label>
                <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone"
                       placeholder="XXX XXX-XXXX"
                       value="{{ old('phone') }}">
                @error('phone')
                <div class="alert alert-danger mt-1" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-12">
                <label for="jerseyNumber" class="form-label">Предпочитаемый игровой номер<span class="text-muted"> (Опционально)</span></label>
                <select class="form-select" id="jerseyNumber" name="jerseyNumber">
                    <option value="">Выберите предпочитаемый игровой номер...</option>
                    @for ($i = 1; $i < 100; $i++)
                        <option value="{{ $i }}" @if(old('jerseyNumber') == $i) selected @endif>{{ $i }}</option>
                    @endfor
                </select>
            </div>

            <div class="col-12">
                <label for="birthdate" class="form-label">Дата рождения<span
                        class="text-muted"> (Опционально)</span></label>
                <input type="date" class="form-control @error('birthdate') is-invalid @enderror" id="birthdate"
                       name="birthdate"
                       value="{{ old('birthdate') }}">
                @error('birthdate')
                <div class="alert alert-danger mt-1" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-sm-6">
                <label for="playerRole" class="form-label">Предпочитаемое амплуа<span
                        class="text-muted"> (Опционально)</span></label>
                <select class="form-select" id="playerRole" name="playerRole">
                    <option value="">Выберите амплуа...</option>
                    <option value="1" @if(old('playerRole') == 'Вратарь') selected @endif>Вратарь</option>
                    <option value="2" @if(old('playerRole') == 'Защитник') selected @endif>Защитник</option>
                    <option value="3" @if(old('playerRole') == 'Левый нападающий') selected @endif>Левый
                        нападающий
                    </option>
                    <option value="4" @if(old('playerRole') == 'Правый нападающий') selected @endif>Правый
                        нападающий
                    </option>
                    <option value="5" @if(old('playerRole') == 'Центральный нападающий') selected @endif>Центральный
                        нападающий
                    </option>
                </select>
            </div>

            <div class="col-sm-6">
                <label for="hand" class="form-label">Хват клюшки<span
                        class="text-muted"> (Опционально)</span></label>
                <select class="form-select" id="hand" name="hand">
                    <option value="">Выберите хват клюшки...</option>
                    <option value="Left" @if(old('hand') == 'Левый') selected @endif>Левый</option>
                    <option value="Right" @if(old('hand') == 'Правый') selected @endif>Правый</option>
                </select>
            </div>

            <div class="col-sm-6">
                <label for="height" class="form-label">Рост, м<span class="text-muted"> (Опционально)</span></label>
                <input type="number" class="form-control @error('height') is-invalid @enderror" id="height"
                       name="height" value="{{ old('height') }}">
                @error('height')
                <div class="alert alert-danger mt-1" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-sm-6">
                <label for="weight" class="form-label">Вес, кг<span class="text-muted"> (Опционально)</span></label>
                <input type="number" class="form-control @error('weight') is-invalid @enderror" id="weight"
                       name="weight" value="{{ old('weight') }}">
                @error('weight')
                <div class="alert alert-danger mt-1" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-12">
                <label for="fileToUpload" class="form-label">Аватар пользователя<span
                        class="text-muted"> (Опционально)</span></label>
                <input type="file" accept=".jpg,.gif,.png"
                       class="form-control @error('fileToUpload') is-invalid @enderror"
                       name="fileToUpload" id="fileToUpload">
                @error('fileToUpload')
                <div class="alert alert-danger mt-1" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-12 mb-1">
                <button class="w-100 btn btn-primary btn-lg mt-3" type="submit">Создать пользователя</button>
            </div>

        </div>
    </form>

    <a class="w-100 btn btn-link" href="{{ route('main') }}">Отмена регистрации</a>


    <script>
        $(document).ready(function () {
            $('#phone').mask('000 000-0000');
        });
    </script>
@endsection
