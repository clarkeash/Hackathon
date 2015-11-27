<?php

namespace OVH\Http\Controllers;

use Illuminate\Http\Request;

use OVH\Category;
use OVH\Comment;
use OVH\Http\Requests;
use OVH\Http\Controllers\Controller;
use OVH\Http\Requests\ShowTicketRequest;
use OVH\Ticket;
use OVH\User;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('tickets.create')->with(compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'category' => 'required|numeric',
        ]);

        $name = $request->get('name');
        $email = $request->get('email');

        if(!$user = User::findByEmail($email))
        {
            $user = User::create(compact('name', 'email'));
        }

        $cat = Category::findOrFail($request->get('category'));

        $ticket = Ticket::create([
            'subject' => $request->get('subject'),
            'user_id' => $user->id,
            'category_id' => $cat->id,
        ]);

        return redirect()->route('tickets.show', [$ticket->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param ShowTicketRequest $request
     * @param  Ticket           $ticket
     *
     * @return \Illuminate\Http\Response
     */
    public function show(ShowTicketRequest $request, $ticket)
    {
        $comments = $ticket->comments;

        return view('tickets.show')
            ->withTicket($ticket)
            ->withComments($comments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ticket)
    {
        $comment = new Comment;
        $comment->content = $request->input('content');
        $comment->user_id = auth()->user()->id;

        $ticket->comments()->save($comment);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
