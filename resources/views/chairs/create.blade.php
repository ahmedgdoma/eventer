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
                        <h2>chair number {{$num}}</h2>
                        {{ Form::open(['action' => 'ChairController@store']) }}
                        <div class="form-group">
                            {{Form::hidden('event_id', $event_id)}}
                            {{Form::hidden('chair_number', $num)}}
                            {{Form::label('select user')}}
                            {{Form::select('user_id', $u, null, ['class'=>'form-control'])}}
                        </div>
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