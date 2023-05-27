@extends('master')

@section('content')
    <div class="mt-3">
        <form action="{{ route('teams.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Название команды</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Название команды">
                @error('name')
                <div class="alert alert-danger mt-1" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Описание</label>
                <textarea class="form-control" name="description" id="description" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Создать</button>
            <a href="{{ route('teams.index') }}" class="btn btn-outline-secondary">Отмена</a>
        </form>
    </div>
@endsection
