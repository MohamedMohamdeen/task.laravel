<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\Ticket;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Ticket=Ticket::all();
        return view('admin.tickets.tickets')->with('Tickets',$Ticket);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Tickets_user($user)
    {
        $Ticket=user::find($user)->tickets;
        return view('admin.tickets.Ticket_user')->with('tickets',$Ticket);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tickets.add_ticket')->with('users',user::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>['required' , 'string'],
            'end_date'=>['required']
        ]);
        $Ticket=Ticket::create([
            'name'=>$request->name,
            'user_id'=>$request->user_id,
            'end_date'=>$request->end_date,
        ]);
        return redirect()->route('tickets');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Ticket=Ticket::find($id);
        return view('admin.tickets.edit')->with('Ticket',$Ticket)->with('users',user::all());
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
       $Ticket=Ticket::find($id);
       $Ticket->delete();
       return redirect()->back();
    }
}
