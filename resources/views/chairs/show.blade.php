@extends('layouts.master')
@section('title')
    chair info
@endsection
@section('content')

    <section class="content-header">
        <h1>
            chair info
        </h1>

        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">event</a></li>
            <li class="active">chair</li>
        </ol>
    </section>
    <Section class="content">
        <div class="row">
            <div class='col-md-6 col-md-offset-3'>
                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">

                        <h3 class="profile-username text-center">{{$chair->chair_number}}</h3>

                        <p class="text-muted text-center"></p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>user</b> <span class="pull-right">{{$chair->user->first_name . $chair->user->last_name}}</span>
                            </li>
                            <li class="list-group-item">
                                <b>event</b> <a href="{{url('/events/'. $chair->event->id)}}" class="pull-right">{{$chair->event->title}}</a>
                            </li>
                        </ul>

                        {{--<a href="{{url('speakers/'. $speaker->id . '/edit')}}" class="btn btn-primary btn-block"><b>Edit</b></a>--}}
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </Section>






@endsection