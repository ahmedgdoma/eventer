@extends('layouts.master')
@section("title")
     edit user
@endsection
@section("content")
    <section class="content-header">
        <h1>
            edit user
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a class="active">users</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="box">
                    <div class="box-body">
                        {!! Form::model($user, ['files'=>'true', 'method'=>'PATCH', 'action' => ['userController@update', 'id'=>$user->id]]) !!}
                        {{ Form::label('first name') }}
                        {{ Form::text('first_name', null, ['class'=>'form-control', 'placeholder'=>'user first name']) }}
                        {{ Form::label('last name') }}
                        {{ Form::text('last_name', null, ['class'=>'form-control', 'placeholder'=>'user last name']) }}
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