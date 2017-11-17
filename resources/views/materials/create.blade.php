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
                        {{ Form::open(['route' => 'materials.store', 'files'=>true])}}

                            {{ Form::hidden('event_id' ,$event_id)}}
                        <div class="form-group">
                            {{ Form::label('material name') }}
                            {{ Form::text('material_name', null, ['class'=>'form-control', 'placeholder'=>'material name'])}}
                        </div>
                        <div class="form-group">
                            {{ Form::label('material') }}
                            {{ Form::file('link')}}
                        </div>
                        <div class="form-group">
                            {{ Form::label('type') }}
                            {{ Form::select('type',array('image'=>'image', 'document'=>'document') ,null, ['class'=>'form-control', 'placeholder'=>'type'])}}
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