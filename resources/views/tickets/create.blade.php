@extends('layout')

@section('content')

<h3>Create new ticket</h3>

<section class="new-ticket">
    <form action="{{ route('tickets.store') }}" method="post">
        {{ csrf_field() }}

        {{--{{ dd(auth()->user()) }}--}}

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="John Doe" value="{{ isset(auth()->user()->name) ? auth()->user()->name : ''  }}">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com" value="{{ isset(auth()->user()->email) ? auth()->user()->email : ''  }}">
        </div>

        <div class="form-group">
            <label for="subject">Subject:</label>
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Helllppp!!">
        </div>

        <div class="form-group">
            <label for="category">Category:</label>
            <select name="category" id="category">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>



        <textarea id="new-ticket-body" name="comment"></textarea>

        <button class="btn btn-primary" type="submit">Create ticket</button>
    </form>
</section>

@endsection