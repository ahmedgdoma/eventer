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
                        {{ Form::open(['action' => 'speakerController@store', 'files'=>'true ']) }}
                        {{ Form::label('name') }}
                        {{ Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'speaker name']) }}
                        {{ Form::label('title') }}
                        {{ Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'speaker title']) }}
                        {{ Form::label('description') }}
                        {{ Form::textarea('description', null, ['class'=>'form-control', 'placeholder'=>'speaker name']) }}
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