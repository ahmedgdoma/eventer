@extends('layouts.master')
@section("title")
     edit event
@endsection
@section("content")
    <section class="content-header">
        <h1>
            edit event
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a class="active">events</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="box">
                    <div class="box-body">
                        {!! Form::model($event, ['files'=>'true', 'method'=>'PATCH', 'action' => ['eventController@update', 'id'=>$event->id]]) !!}
                        {{ Form::label('title') }}
                        @if(count($errors->first('title')) > 0)
                            <span class="text-danger">{{$errors->first('title')}}</span>
                        @endif
                        {{ Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'event first name'])}}

                        {{ Form::label('description') }}
                        @if(count($errors->first('description')) > 0)
                            <span class="text-danger">{{$errors->first('description')}}</span>
                        @endif
                        {{ Form::textarea('description', null, ['class'=>'form-control'])}}

                        {{ Form::label('code')}}
                        @if(count($errors->first('code')) > 0)
                            <span class="text-danger">{{$errors->first('code')}}</span>
                        @endif
                        {{ Form::text('code', null, ['class'=>'form-control', 'placeholder'=>'business role'])}}

                        {{ Form::label('type')}}
                        @if(count($errors->first('type')) > 0)
                            <span class="text-danger">{{$errors->first('type')}}</span>
                        @endif
                        {{ Form::select('type',['private'=>'private','public'=>'public'] ,null, ['class'=>'form-control', 'placeholder'=>'type']) }}


                        {{ Form::label('attendance')}}
                        @if(count($errors->first('attendance')) > 0)
                            <span class="text-danger">{{$errors->first('attendance')}}</span>
                        @endif
                        {{ Form::select('attendance',['complete'=>'complete','sessions'=>'sessions'] ,null, ['class'=>'form-control', 'placeholder'=>'attendance']) }}

                        {{ Form::label('image') }}
                        {{ Form::file('image') }}
                        <div class="box-footer">
                            {!! Form::submit('submit', ['class' => 'btn btn-primary']); !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>



@endsection