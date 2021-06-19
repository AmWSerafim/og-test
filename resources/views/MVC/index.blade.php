@extends('layouts.app')

@section('content')

    <div class="list-section">
        <table>
            <tr>
                <th>id</th>
                <th>date</th>
                <th>playerid</th>
                <th>agentid</th>
                <th>currency</th>
                <th>bet</th>
                <th>win</th>
                <th>rake</th>
                <th>tournament</th>
                <th>net</th>
                <th>fin</th>
            </tr>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->date }}</td>
                    <td>{{ $item->playerid }}</td>
                    <td>{{ $item->agentid }}</td>
                    <td>{{ $item->currency }}</td>
                    <td>{{ $item->bet }}</td>
                    <td>{{ $item->win }}</td>
                    <td>{{ $item->rake }}</td>
                    <td>{{ $item->tournament }}</td>
                    <td>{{ $item->net }}</td>
                    <td>{{ $item->fin }}</td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection
