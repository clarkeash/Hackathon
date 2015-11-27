<?php

namespace OVH\Http\Controllers;

use Illuminate\Http\Request;

use OVH\Category;
use OVH\Http\Requests;
use OVH\Http\Controllers\Controller;
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
        ]);

        $name = $request->get('name');
        $email = $request->get('email');

        if(!$user = User::findByEmail($email))
        {
            $user = User::create(compact('name', 'email'));
        }

        Ticket::create([
            'subject' => $request->get('subject'),
            'user_id' => $user->id,
            'category_id' => $request->get('category_id') // Need to validate
        ]);

        return redirect('tickets.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show($ticket)
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
