<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests\storeUserRequest;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeUserRequest $request)
    {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        if(isset($input['image'])){
            $input['image'] = $this->upload($input['image']);
        }else{
            $input['image'] = 'avatar.png';
        }
        User::create($input);
        session()->flash('added', 'user added successfully');
        return redirect('/users');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if(!$user){
            session()->flash('error', 'user not found');
            return redirect("/users");
        }else{
            return view("users.show", compact('user'));
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
        $user = User::find($id);
        if(!$user){
            session()->flash('error', 'user not found');
            return redirect("/users");
        }else{
            return view('users.edit', compact('user'));
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
        $user = User::find($id);
        $update = $request->all();
        if($user){
            if($request->hasFile('image')){
                $update['image'] = $this->upload($request->image);
            }
            $user->update($update);
            session()->flash('updated', 'user' . $user->name . ' updated successfully');
            return redirect('/users');
        }else{
            session()->flash('error', 'user not found');
            return redirect("/users");
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
        $user = User::find($id);
        if(!$user){
            return redirect("/users");
        }else{
            $user->delete();
            session()->flash('deleted', 'user deleted successfully');
            return redirect("/users");
        }
    }

    public function upload($file)
    {
        $extension = $file->getClientOriginalExtension();
        $sha1 = sha1($file->getClientOriginalName());
        $date = date('Y-m-d-h-i-s');
        $filename = $date . "_" . $sha1 . "." . $extension;
        $path = base_path('resources/assets/uploads/users');
        $file->move($path, $filename);
        return $filename;
    }

    public function sendmails($event_id){
        $event = Event::find($event_id);
        if(!$event){
            session()->flash('error', 'event not found');
            return redirect("/events");
        }else{
            $users = User::where('type', 'vip')->get();
            return view('emails.send', compact('event', 'users'));
        }
    }
    public function sendtousers(Request $request){
        $message = $request->message;
        foreach($request->users as $user){
        $to = $user;
        $subject = "event invitation";
        $headers = "From: ahmed.gamal@arena-egypt.com" . "\r\n";

        mail($to,$subject,$message,$headers);}
        session()->flash('mails', 'mails has been sent successfully');
        return redirect('/events/'. $request->event_id);

    }
}
