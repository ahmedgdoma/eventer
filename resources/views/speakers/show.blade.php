@extends('layouts.master')
@section('title')
    speaker profile
@endsection
@section('content')

    <section class="content-header">
        <h1>
            {{$speaker->name}} Profile
        </h1>

        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">speakers</a></li>
            <li class="active">profile</li>
        </ol>
    </section>
    <Section class="content">
        <div class="row">
            <div class='col-md-6 col-md-offset-3'>
                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="{{url('resources\assets\uploads\speakers\\'). $speaker->image}}" alt="User profile picture">

                        <h3 class="profile-username text-center">{{$speaker->name}}</h3>

                        <p class="text-muted text-center"></p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>title</b> <span class="pull-right">{{$speaker->title}}</span>
                            </li>
                            <li class="list-group-item">
                                <b>description</b> <span class="text-right">{{$speaker->description}}</span>
                            </li>
                        </ul>

                        <a href="{{url('speakers/'. $speaker->id . '/edit')}}" class="btn btn-primary btn-block"><b>Edit</b></a>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </Section>






@endsection