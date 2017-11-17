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
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <a href="{{url('speakers/create')}}" class="btn btn-info">add speaker</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>name</th>
                                <th>image</th>
                                <th>title</th>
                                <th>description</th>
                                <th>create date</th>
                                <th>update date</th>
                                <th>edit</th>
                                <th>delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i =1;?>
                            @foreach ($speakers as $speaker)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td><a href="{{url('speakers/'. $speaker->id) }}">{{$speaker->name}}</a></td>
                                    <td>
                                        <img src="{{url('resources\assets\uplaods\speakers'). $speaker->image}}" class="user-image" alt="speaker Image" width="25" height="25">
                                    </td>
                                    <td>{{$speaker->title}}</td>
                                    <td>{{$speaker->description}}</td>
                                    <td>{{$speaker->created_at}}</td>
                                    <td>{{$speaker->updated_at}}</td>
                                    <td class="form-holder">
                                        <a class="btn btn-primary" href="{{url('speakers/'. $speaker->id .'/edit') }}"><i class="fa fa-edit"></i></a>
                                    </td>
                                    <td class="form-holder">

                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="{{'#modal-danger-'.$speaker->id}}">
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

    @foreach ($speakers as $speaker)
        <div class="modal modal-danger fade in" id="{{'modal-danger-'.$speaker->id}}" style=" padding-right: 17px;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">alert</h4>
                    </div>
                    <div class="modal-body">
                        <p>do you realy want to delete speaker <strong style="color: #000;">{{$speaker->name}}</strong></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                        {!! Form::open(['url' => 'speakers/'.$speaker->id, 'method' => 'delete']) !!}
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