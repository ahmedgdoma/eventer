<?php

namespace App\Http\Controllers;

use App\Event;
use App\Session;
use App\Speaker;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class sessionController extends Controller
{

    /**
     * @param $event_id
     */
    public function addSessionForEvent($event_id){
        $events = Event::lists('title', 'id')->toArray();
        $speakers = Speaker::lists('name', 'id')->toArray();
        return view('sessions.create', compact('events', 'event_id', 'speakers'));
    }
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        Session::create($input);
        return redirect()->route('events.show', ['id' => $input['event_id']]);
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
        $speakers = Speaker::lists('name', 'id')->toArray();
        $session = Session::find($id);
        return view('sessions.edit', compact( 'speakers', 'session'));

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
        $session = Session::find($id);
        if(!$session){
            session()->flash('error', 'session not found');
            return redirect("/events");
        }
        else{
            $session->update($request->all());
            $event = $session->event_id;
            session()->flash('updated', 'session updated successfully');
            return redirect("/events/". $event);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $session = Session::find($id);
        $event = $session->event_id;
        $session->delete();
        session()->flash('deleted', 'session deleted successfully');
        return redirect("/events/". $event);
    }
}
