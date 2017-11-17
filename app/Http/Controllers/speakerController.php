<?php

namespace App\Http\Controllers;

use App\Speaker;
use Illuminate\Http\Request;

use App\Http\Requests;

class speakerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $speakers = Speaker::all();
        return view('speakers.index', compact('speakers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('speakers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $save = new Speaker;
        $save->name = $request->name;
        $save->title = $request->title;
        $save->description = $request->description;
        if($request->hasFile('image')){
            $save->image = $this->upload($request->image);
        }else{
            $save->image = 'avatar.png';
        }
        $save->save();
        return redirect('/speakers');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $speaker = Speaker::find($id);
        if(!$speaker){
            return redirect("/speakers");
        }else{
            return view("speakers.show", compact('speaker'));
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
        $speaker = Speaker::find($id);
        if(!$speaker){
            return redirect("/speakers");
        }else{
            return view('speakers.edit', compact('speaker'));
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
        $speaker = Speaker::find($id);
        $update = $request->all();
        if($speaker){
            if($request->hasFile('image')){
                $update['image'] = $this->upload($request->image);
            }
            $speaker->update($update);
        }
        return redirect('/speakers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $speaker = Speaker::find($id);
        if(!$speaker){
            return redirect("/speakers");
        }else{
            $speaker->delete();
            return redirect("/speakers");
        }
    }

    public function upload($file)
    {
        $extension = $file->getClientOriginalExtension();
        $sha1 = sha1($file->getClientOriginalName());
        $date = date('Y-m-d-h-i-s');
        $filename = $date . "_" . $sha1 . "." . $extension;
        $path = url('resources\assets\uplaods\speakers');
        $file->move($path, $filename);

        return $filename;
    }
}
