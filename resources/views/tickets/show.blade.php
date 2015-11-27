@extends('layout')

@section('content')
    Subject:
    {{$ticket->subject}}
    <br>
    Status:
    {{$ticket->status}}
    <br>
    Created:
    {{$ticket->created_at}}
    <br>
    User:
    {{\OVH\User::find($ticket->user_id)->name}}
    <br><br>
    Comments:
    <br>
    @foreach($comments as $comment)
        {{$comment->person_type}}:
        {{$comment->person->name}}
        ({{$comment->created_at}})
        <br>
        {{$comment->content}}
        <br>
        <br>
    @endforeach
@endsection