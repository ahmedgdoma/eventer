<?php

namespace App\Http\Controllers;

use App\Event;
use App\Speaker;
use Illuminate\Http\Request;

use App\Http\Requests;

class eventController extends Controller
{
    public function attendance($id){
        $event = Event::with( 'sessions.users', 'session.users')->find($id);
//        foreach ($event->sessions as $session){
//            echo $session['title'];
//            foreach ($session->users as $user){
//                echo '   ' .$user['first_name'] . '<br>';
//            }
//        }
        if(!$event){
            session()->flash('error', 'event not found');
            return redirect("/events");
        }else{
            return view("events.attendance", compact('event'));
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $speakers = Speaker::lists('name', 'id');
        return view('events.create', compact('speakers'));
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
            'title' => 'required|unique:events|max:255',
            'description' => 'required',
            'code' => 'required',
            'type' => 'required|in:public,private',
            'attendance' => 'required|in:sessions,complete',
        ]);
        $input = $request->all();
        if(isset($input['image'])){
            $input['image'] = $this->upload($input['image']);
        }else{
            $input['image'] = 'avatar.png';
        }
        $sessions =[];

        $event = Event::create($input);
        for($i = 0;$i < count($input['session_title']);$i++){
            $sessions[$i]['title'] = $input['session_title'][$i];
            $sessions[$i]['start_time'] = $input['session_time'][$i];
            $sessions[$i]['duration'] = $input['session_duration'][$i];
            $sessions[$i]['speaker_id'] = $input['session_speaker'][$i];
            $event->sessions()->create($sessions[$i]);
        }
        session()->flash('added', 'event added successfully');
        return redirect('/events/'.$event->id)->with($event->all());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $event = Event::with('chairs', 'materials', 'sessions', 'questions')->find($id);
        if (count($event->chairs) > 0){
            $chair_num = [];
            foreach ($event->chairs->toArray() as $chair){
                array_push($chair_num, $chair['chair_number']);
            }
        }
            if(!$event){
            session()->flash('error', 'event not found');
            return redirect("/events");
        }else{
            return view("events.show", compact('event', 'chair_num'));
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
        $event = Event::find($id);
        if(!$event){
            session()->flash('error', 'event not found');
            return redirect("/events");
        }else{
            return view('events.edit', compact('event'));
        }
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
        $this->validate($request, [
            'title' => 'max:255|unique:events,title,'.$id,
            'type' => 'in:public,private',
            'attendance' => 'in:sessions,complete',
        ]);
        $event = Event::find($id);
        $update = $request->all();
        if($event){
            if($request->hasFile('image')){
                $update['image'] = $this->upload($request->image);
            }
            $event->update($update);
            session()->flash('updated', 'event' . $event->title . ' updated successfully');
            return redirect('/events');
        }else{
            session()->flash('error', 'event not found');
            return redirect("/events");
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
        $event = Event::find($id);
        if(!$event){
            return redirect("/events");
        }else{
            $event->delete();
            session()->flash('deleted', 'event deleted successfully');
            return redirect("/events");
        }
    }

    public function upload($file)
    {
        $extension = $file->getClientOriginalExtension();
        $sha1 = sha1($file->getClientOriginalName());
        $date = date('Y-m-d-h-i-s');
        $filename = $date . "_" . $sha1 . "." . $extension;
        $path = base_path('resources/assets/uploads/events');
        $file->move($path, $filename);
        return $filename;
    }
    public function addChairs($id){
        return view('events.setChairs', compact('id'));
    }
}
