@extends('layouts.master')
@section("title")
    speakers
@endsection
@section("content")
    <section class="content-header">
        <h1>
            speakers Table
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a class="active">speakers</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="box">
                    <div class="box-body">
                        {{ Form::open(['action' => 'sessionController@store', 'files'=>'true ']) }}

                        {{ Form::label('event') }}
                        @if(isset($event_id) )
                            {{ Form::select('event_id',$events ,$event_id, ['class'=>'form-control', 'placeholder'=>'session speaker'])}}
                        @else
                            {{ Form::select('event_id',$events ,null, ['class'=>'form-control', 'placeholder'=>'session speaker'])}}
                        @endif
                        {{ Form::label('session title') }}
                        {{ Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'session title'])}}

                        {{ Form::label('session start time') }}
                        <input type="datetime-local" value="{{Carbon\Carbon::now()->format('Y-m-d\Th:i')}}"  name="start_time" class="form-control">

                        {{ Form::label('session duration in hours') }}
                        {{ Form::number('duration', null, ['class'=>'form-control', 'placeholder'=>'session duration in hours'])}}

                        {{ Form::label('session speaker') }}
                        {{ Form::select('speaker_id',$speakers ,null, ['class'=>'form-control', 'placeholder'=>'session speaker'])}}

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