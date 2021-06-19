@extends('layouts.app')

@section('content')

    <div class="list-section">
        <ul>
        @foreach ($persons as $person)
            <li>{{ $person['Name'] }}</li>
        @endforeach
        </ul>
    </div>

@endsection
