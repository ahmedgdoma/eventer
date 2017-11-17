@extends('layouts.master')
@section("title")
    slider
@endsection
@section("content")
    <div class="box">
        @if(session('error_slider'))
            <div class="box-header">
                <div class="callout callout-danger">
                    <h4>error!</h4>
                    <p>{{session('error_slider')}}</p>
                </div>
            </div>
        @endif
            @if(session('updated_slider'))
                <div class="box-header">
                    <div class="callout callout-success">
                        <h4>congratulations</h4>
                        <p>{{session('updated_slider')}}</p>
                    </div>
                </div>
            @endif
    </div>
    {{Form::open(['action'=>['MaterialController@update','id'=>0], 'method'=>'PATCH'])}}
        @foreach($materials as $material)
            @if($material->type == 'image')
                <div class="form-group" style="display: inline-block;margin: 10px">
                    {{Form::checkbox($material->id, null, $material->slider, ['class'=>'css-checkbox', 'id'=>$material->id])}}
                    {{Form::label($material->id,'' ,['class'=>'css-label', 'style'=>'background-image:url('. url('resources/assets/uploads/materials/'.$material->link).");"])}}

                </div>
            @endif
        @endforeach

    <div class="box-footer">
        <div class="col-md-4">
            {!! Form::submit('submit', ['class' => 'btn btn-primary']); !!}
        </div>
    </div>
    {{Form::close()}}
@endsection