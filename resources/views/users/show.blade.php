@extends('layouts.master')
@section('title')
    user profile
@endsection
@section('content')

    <section class="content-header">
        <h1>
            {{$user->name}} Profile
        </h1>

        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">users</a></li>
            <li class="active">profile</li>
        </ol>
    </section>
    <Section class="content">
        <div class="row">
            <div class='col-md-6 col-md-offset-3'>
                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="{{url('resources\assets\uploads\users\\'). $user->image}}" alt="User profile picture">

                        <h3 class="profile-username text-center">{{$user->first_name}}</h3>

                        <p class="text-muted text-center"></p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>email</b> <a class="pull-right">{{$user->email}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>phone</b> <a class="pull-right">{{$user->phone}}</a>
                            </li>
                        </ul>

                        <a href="{{url('users/'. $user->id . '/edit')}}" class="btn btn-primary btn-block"><b>Edit</b></a>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </Section>






@endsection