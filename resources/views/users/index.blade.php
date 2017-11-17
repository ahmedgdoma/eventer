@extends('layouts.master')
@section("title")
    users
@endsection
@section("content")
    <section class="content-header">
        <h1>
            users Table
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a class="active">users</a></li>
        </ol>
    </section>
    <section>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    @if(session('error'))
                        <div class="box-header">
                            <div class="callout callout-danger">
                                <h4>error!</h4>
                                <p>{{session('error')}}</p>
                            </div>
                        </div>
                    @endif
                    @if(session('deleted'))
                        <div class="box-header">
                            <div class="callout callout-info">
                                <h4>congratulations</h4>
                                <p>{{session('deleted')}}</p>
                            </div>
                        </div>
                    @endif
                        @if(session('added'))
                            <div class="box-header">
                                <div class="callout callout-info">
                                    <h4>congratulations</h4>
                                    <p>{{session('added')}}</p>
                                </div>
                            </div>
                        @endif
                        @if(session('updated'))
                            <div class="box-header">
                                <div class="callout callout-info">
                                    <h4>congratulations</h4>
                                    <p>{{session('updated')}}</p>
                                </div>
                            </div>
                        @endif
                    <div class="box-header">
                        <a href="{{url('users/create')}}" class="btn btn-info">add user</a>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>name</th>
                                <th>image</th>
                                <th>email</th>
                                <th>phone</th>
                                <th>business role</th>
                                <th>type</th>
                                <th>create date</th>
                                <th>update date</th>
                                <th>edit</th>
                                <th>delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i =1;?>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td><a href="{{url('users/'. $user->id) }}">{{$user->first_name .' '.$user->last_name }}</a></td>
                                    <td>
                                        <img src="{{url('resources/assets/uploads/users')}}/{{$user->image}}" class="user-image" alt="user Image" width="25" height="25">
                                    </td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->business_role}}</td>
                                    <td>{{$user->type}}</td>
                                    <td>{{$user->created_at}}</td>
                                    <td>{{$user->updated_at}}</td>
                                    <td class="form-holder">
                                        <a class="btn btn-primary" href="{{url('users/'. $user->id .'/edit') }}"><i class="fa fa-edit"></i></a>
                                    </td>
                                    <td class="form-holder">

                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="{{'#modal-danger-'.$user->id}}">
                                            X
                                        </button>

                                    </td>
                                </tr>
                            @endforeach


                            </tbody>

                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>

    @foreach ($users as $user)
        <div class="modal modal-danger fade in" id="{{'modal-danger-'.$user->id}}" style=" padding-right: 17px;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">alert</h4>
                    </div>
                    <div class="modal-body">
                        <p>do you realy want to delete user <strong style="color: #000;">{{$user->first_name}}</strong></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                        {!! Form::open(['url' => 'users/'.$user->id, 'method' => 'delete']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach

@endsection