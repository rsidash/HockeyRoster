@extends('master')

@section('content')
    <div class="mt-3">
        <form action="{{ route('teams.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Название команды</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                       value="{{ old('name') }}"
                       placeholder="Название команды">
                @error('name')
                <div class="alert alert-danger mt-1" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="logo_file" class="form-label">Логотип команды<span
                        class="text-muted"> (Опционально)</span></label>
                <input type="file" accept=".jpg,.gif,.png"
                       class="form-control @error('file') is-invalid @enderror"
                       name="logo_file" id="fileToUpload">
                @error('logo_file')
                <div class="alert alert-danger mt-1" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Описание<span
                        class="text-muted"> (Опционально)</span></label>
                <textarea class="form-control  @error('description') is-invalid @enderror" name="description" id="description"
                          rows="3">{{ old('description') }}</textarea>
                @error('description')
                <div class="alert alert-danger mt-1" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Создать</button>
            <a href="{{ route('teams.index') }}" class="btn btn-outline-secondary">Отмена</a>
        </form>
    </div>
@endsection
