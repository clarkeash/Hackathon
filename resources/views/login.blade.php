@extends('layout')

@section('content')
    <form method="POST" action="/">
        {{ csrf_field() }}

        <legend>Login with your Email</legend>
        <input type="email" name="email" placeholder="user@email.com" />

        <button type="submit">GO</button>
    </form>
@endsection