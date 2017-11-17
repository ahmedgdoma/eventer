@extends('layouts.master')
@section("title")
    add user
@endsection
@section("content")
    <section class="content-header">
        <h1>
            add user
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
                        {{ Form::open(['action'=>'userController@store', 'files'=>'true ']) }}
                        {{ Form::label('first name') }}
                        @if(count($errors->first('first_name')) > 0)
                            <span class="text-danger">{{$errors->first('first_name')}}</span>
                        @endif
                        {{ Form::text('first_name', null, ['class'=>'form-control', 'placeholder'=>'user first name'])}}

                        {{ Form::label('last name') }}
                        @if(count($errors->first('last_name')) > 0)
                            <span class="text-danger">{{$errors->first('last_name')}}</span>
                        @endif
                        {{ Form::text('last_name', null, ['class'=>'form-control', 'placeholder'=>'user last name'])}}

                        {{ Form::label('business role')}}
                        @if(count($errors->first('business_role')) > 0)
                            <span class="text-danger">{{$errors->first('business_role')}}</span>
                        @endif
                        {{ Form::text('business_role', null, ['class'=>'form-control', 'placeholder'=>'business role'])}}

                        {{ Form::label('type')}}
                        @if(count($errors->first('type')) > 0)
                            <span class="text-danger">{{$errors->first('type')}}</span>
                        @endif
                        {{ Form::select('type',['vip'=>'vip','normal'=>'normal','public'=>'public','admin'=>'admin'] ,null, ['class'=>'form-control', 'placeholder'=>'type']) }}

                        {{ Form::label('email')}}
                        @if(count($errors->first('email')) > 0)
                            <span class="text-danger">{{$errors->first('email')}}</span>
                        @endif
                        {{ Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'email'])}}

                        {{ Form::label('phone')}}
                        @if(count($errors->first('phone')) > 0)
                            <span class="text-danger">{{$errors->first('phone')}}</span>
                        @endif
                        {{ Form::number('phone', null, ['class'=>'form-control', 'placeholder'=>'phone'])}}

                        {{ Form::label('password')}}
                        @if(count($errors->first('password')) > 0)
                            <span class="text-danger">{{$errors->first('password')}}</span>
                        @endif
                        {{ Form::password('password', ['class'=>'form-control', 'placeholder'=>'password'])}}

                        {{ Form::label('confirm password')}}
                        {{ Form::password('password_confirmation', ['class'=>'form-control', 'placeholder'=>'confirm password'])}}
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