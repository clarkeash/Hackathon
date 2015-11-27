@extends('layout')

@section('content')

<h3>Create new ticket</h3>

<section class="new-ticket">
    <form action="{{ route('tickets.store') }}" method="post">
        {{ csrf_field() }}

        <select>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <textarea id="new-ticket-body"></textarea>

        <button class="btn btn-primary" type="submit">Create ticket</button>
    </form>
</section>

@endsection