@extends('layouts.master')
@section("title")
    edit speaker
@endsection
@section("content")
    <section class="content-header">
        <h1>
            edit speaker
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
                        {!! Form::model($session, ['files'=>'true', 'method'=>'PATCH', 'action' => ['sessionController@update', 'id'=>$session->id]]) !!}

                            {{ Form::label('session title') }}
                            {{ Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'session title'])}}

                            {{ Form::label('session start time') }}
                            <input type="datetime-local" name="start_time" value="{{Carbon\Carbon::parse($session->start_time)->format('Y-m-d\Th:i')}}" class="form-control">

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