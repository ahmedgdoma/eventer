@extends('layouts.master')
@section("title")
    events
@endsection
@section("content")
    <section class="content-header">
        <h1>
            events Table
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a class="active">events</a></li>
        </ol>
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    @if($event->attendance == 'complete')
                        <div class="box-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>first name</th>
                                        <th>last name</th>
                                        <th>business role</th>
                                        <th>email</th>
                                        <th>phone</th>
                                        <th>type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php $i =0; @endphp
                                @foreach($event->session->users as $user)

                                    <tr>
                                        <td>{{++$i}}</td>
                                        <td>{{$user->first_name}}</td>
                                        <td>{{$user->last_name}}</td>
                                        <td>{{$user->business_role}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>{{$user->type}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        @foreach($event->sessions as $session)
                            <div class="panel panel-default">
                                <div class="panel-heading">session: {{$session['title']}}</div>
                                <div class="panel-body">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>first name</th>
                                            <th>last name</th>
                                            <th>business role</th>
                                            <th>email</th>
                                            <th>phone</th>
                                            <th>type</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $i =0; @endphp
                                        @foreach($event->session->users as $user)
                                            <tr>
                                                <td>{{++$i}}</td>
                                                <td>{{$user->first_name}}</td>
                                                <td>{{$user->last_name}}</td>
                                                <td>{{$user->business_role}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->phone}}</td>
                                                <td>{{$user->type}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <!-- /.box-header -->

                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>


@endsection