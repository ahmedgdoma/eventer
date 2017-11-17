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
                        <a href="{{url('events/create')}}" class="btn btn-info">add event</a>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>title</th>
                                <th>image</th>
                                <th>description</th>
                                <th>type</th>
                                <th>attendance</th>
                                <th>location</th>
                                <th>code</th>
                                <th>create date</th>
                                <th>update date</th>
                                <th>edit</th>
                                <th>delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i =1;?>
                            @foreach ($events as $event)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td><a href="{{url('events/'. $event->id) }}">{{$event->title}}</a></td>
                                    <td>
                                        <img src="{{url('resources/assets/uploads/events')}}/{{$event->image}}" class="event-image" alt="event Image" width="25" height="25">
                                    </td>
                                    <td>{{$event->description}}</td>
                                    <td>{{$event->type}}</td>
                                    <td>{{$event->attendance}}</td>
                                    <td>{{$event->location}}</td>
                                    <td>{{$event->code}}</td>
                                    <td>{{$event->created_at}}</td>
                                    <td>{{$event->updated_at}}</td>
                                    <td class="form-holder">
                                        <a class="btn btn-primary" href="{{url('events/'. $event->id .'/edit') }}"><i class="fa fa-edit"></i></a>
                                    </td>
                                    <td class="form-holder">

                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="{{'#modal-danger-'.$event->id}}">
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

    @foreach ($events as $event)
        <div class="modal modal-danger fade in" id="{{'modal-danger-'.$event->id}}" style=" padding-right: 17px;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">alert</h4>
                    </div>
                    <div class="modal-body">
                        <p>do you realy want to delete event <strong style="color: #000;">{{$event->title}}</strong></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                        {!! Form::open(['url' => 'events/'.$event->id, 'method' => 'delete']) !!}
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