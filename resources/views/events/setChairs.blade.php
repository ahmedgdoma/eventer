@extends('layouts.master')
@section("title")
    set chairs
@endsection
@section("content")
    <section class="content-header">
        <h1>
            set chairs
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a class="">events</a></li>
            <li><a class="active">set chairs</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="box">
                    <div class="box-body">
                        {!! Form::open(['method'=>'PATCH', 'action' => ['eventController@update', 'id'=>$id]]) !!}

                        {{ Form::number('vip_chairs', null, ['class'=>'form-control', 'placeholder'=>'event first name'])}}

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