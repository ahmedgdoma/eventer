<?php

namespace App\Http\Controllers;

use App\Material;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Response;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materials = Material::where('type', 'image')->get();
        return view('materials.index', compact('materials'));
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
       $input = $this->upload($input);
       Material::create($input);
       session()->flash('material_added', 'material added successfully');
       return redirect('/events/'. $input['event_id']);
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
        $sliders = Material::where('slider', 1)->get();

        foreach ($sliders as $slider){
            $slider->update(['slider'=>0]);
        }
        foreach ($request->all() as $key => $value){
            if($value == 'on'){
                $slider = Material::find($key);
                if(!$slider){
                    session()->flash('error_slider', 'image not found');
                    return redirect('/materials/');
                }else{
                    $slider->update(['slider'=> 1]);
                    session()->flash('updated_slider', 'slider updated successfully');
                    return redirect('/materials/');
                }
            }
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
        //
    }


    public function download($id)
    {
        $file = Material::find($id);
        if(!$file){
            session()->flash('file_error', 'file not found');
            return redirect('/events');
        }else{
            $my_file= resource_path('assets/uploads/materials/'. $file->link);
            $headers = [
                'Content-Type'=> 'application/'. $file->extension,
            ];
            $name = $file->material_name.'.'.$file->extension;

            return Response()->download($my_file,$name , $headers);
        }
    }
    public function  addMaterialForEvent($id)
    {
        $event_id = $id;
        return view('materials.create', compact('event_id'));
    }



    public function upload($array)
    {
        $array['extension'] = $array['link']->getClientOriginalExtension();
        if(in_array($array['extension'], ['png', 'jpg', 'jpeg', 'gif'])){
            $array['type'] = 'image';
        }elseif(in_array($array['extension'], ['pdf', 'doc', 'xls'])){
            $array['type'] = 'document';
        }
        $sha1 = sha1($array['link']->getClientOriginalName());
        $date = date('Y-m-d-h-i-s');
        $filename = $date . "_" . $sha1 . "." . $array['extension'];
        $path = base_path('resources/assets/uploads/materials');
        $array['link']->move($path, $filename);
        $array['link'] = $filename;
        return $array;
    }
}
