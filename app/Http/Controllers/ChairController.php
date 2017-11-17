<?php

namespace App\Http\Controllers;

use App\Chair;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class ChairController extends Controller
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
    public function create($num, $event_id)
    {
        $users = User::all('first_name','last_name'  ,'id');
        $u = [];
        foreach ($users as $user){
            $u[$user->id] = $user->first_name . ' '. $user->last_name;
        }
        return view('chairs.create', compact('u', 'num', 'event_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Chair::create($request->all());
        session()->flash('chair_reserved', 'chair reserved successfully');
        return redirect('/events/'. $request->event_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chair = Chair::with('event', 'user')->where('chair_number', $id)->first();
        if(!$chair){}
        else{
            return view('chairs.show', compact('chair'));
        }
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
