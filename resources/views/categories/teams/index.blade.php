@extends('master')

@section('content')
    <h1>Команды</h1>
    @foreach($teams as $team)
        <h5>{{ $team->name }}</h5>
    @endforeach
@endsection
