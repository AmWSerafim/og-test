@extends('layouts.app')

@section('content')

    <h1>Array</h1>
    @foreach($data as $key => $value)
        <p>{{$key}} : {{ $value }}</p>
    @endforeach
    <h1>Sum of Bets:</h1>
    <p>{{ $sum }}</p>

@endsection
