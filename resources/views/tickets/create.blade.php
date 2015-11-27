@extends('layout')

@section('content')

<h3>Create new ticket</h3>

<section class="new-ticket">
    <form action="" method="post">
        <select>
            <option value="">SELECT AN OPTION</option>
            <option value="1">Web hosting</option>
            <option value="1">Domains</option>
            <option value="1">Account querry</option>
            <option value="1">Other</option>
        </select>

        <textarea id="new-ticket-body"></textarea>

        <button class="btn btn-primary" type="submit">Create ticket</button>
    </form>
</section>

@endsection