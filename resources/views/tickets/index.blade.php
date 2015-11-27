@extends('layout')

@section('content')
<div class="col-xs-12 col-sm-12 col-lg-12">

    <h3>Your tickets</h3>

    <section class="latest-tickets">
        @forelse($tickets as $ticket)
            <div class="ticket-subject">
                {{$ticket->subject}}
            </div>

            <div class="ticket-status {{$ticket->status}}">
                {{strtoupper($ticket->status)}}
            </div>

            <div class="ticket-body">
                <p>{{str_limit(\OVH\Comment::where('ticket_id', $ticket->id)->first()->content, 250)}}</p>
                <p><small>Created on {{$ticket->created_at}} by {{$ticket->user->name}}</small></p>
                <p>
                    <a href="/tickets/{{$ticket->id}}" title="View ticket">View replies</a>
                    @if ($ticket->status !== 'closed' && auth()->user()->type === 'customer')
                        | <a href="/tickets/{{$ticket->id}}/close" title="Close ticket">Close the ticket</a>
                    @endif
                </p>
            </div>
        @empty
            <h4>No Tickets Found</h4>
        @endforelse

        {!! $tickets->render() !!}

    </section>

</div>
@endsection