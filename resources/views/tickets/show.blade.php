@extends('layout')

@section('content')
    <div class="col-xs-12 col-sm-12 col-lg-12">

        <section class="latest-tickets">
            <div class="ticket-subject">
                {{$ticket->subject}}
            </div>

            <div class="ticket-status {{$ticket->status}}">
                {{strtoupper($ticket->status)}}
            </div>

            <div class="ticket-body">
                <p>{{$comments->first()->content}}</p>
                <p>Created on {{$ticket->created_at}} by {{\OVH\User::find($ticket->user_id)->name}}</p>
            </div>

            <div class="ticket-replies">
                @for($i = 1; $i < count($comments); $i++)
                    <div class="reply-{{$comments[$i]->person_type == \OVH\Staff::class ? 'admin' : 'customer'}}">
                        <div class="reply-header">
                            <strong>{{$comments[$i]->person->name}} </strong> <small><em>replied on {{$comments[$i]->created_at}}</em></small>
                        </div>
                        <div class="reply-message">
                            {{$comments[$i]->content}}
                        </div>
                    </div>
                @endfor

                <a href="close.html"><button class="btn btn-primary yellow" id="close" type="submit">Close the ticket</button></a>

                <div class="reply">
                    <h2>Reply</h2>
                    <form method="POST" action="/tickets/{{$ticket->id}}">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        <textarea id="new-ticket-body" name="content"></textarea>

                        <button class="btn btn-primary" type="submit">Reply</button>
                    </form>

                </div>
            </div>

        </section>

    </div>
@endsection