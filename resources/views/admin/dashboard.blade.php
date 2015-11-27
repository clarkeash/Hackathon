@extends('layout')

@section('content')

<ul>

    @foreach($cats as $item)

        <li>{{ $item->name }} ({{ collect($item->tickets)->where('status', 'open')->count() }})</li>

    @endforeach

</ul>


@endsection