@extends('layouts.master')
@section('title')
    event
@endsection
@section('content')

    <section class="content-header">
        <h1>
            {{$event->title}} event
        </h1>

        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">events</a></li>
            <li class="active">profile</li>
        </ol>
    </section>
    <Section class="content">
        <div class="row">
            <div class='col-md-12'>
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
                    @if(session('material_added'))
                        <div class="box-header">
                            <div class="callout callout-info">
                                <h4>congratulations</h4>
                                <p>{{session('material_added')}}</p>
                            </div>
                        </div>
                    @endif
                    @if(session('chair_reserved'))
                        <div class="box-header">
                            <div class="callout callout-info">
                                <h4>congratulations</h4>
                                <p>{{session('chair_reserved')}}</p>
                            </div>
                        </div>
                    @endif
                    @if(session('mails'))
                        <div class="box-header">
                            <div class="callout callout-info">
                                <h4>congratulations</h4>
                                <p>{{session('mails')}}</p>
                            </div>
                        </div>
                    @endif
                <table class="table table-bordered table-responsive event-table">
                    <tbody>
                    <tr>
                        <th>title</th>
                        <td>{{$event->title}}</td>
                    </tr>
                    <tr>
                        <th>image</th>
                        <td><img src="{{url('resources/assets/uploads/events\/') . $event->image}}" width="200" height="100"></td>
                    </tr>
                    <tr>
                        <th>description</th>
                        <td>{{$event->description}}</td>
                    </tr>
                    <tr>
                        <th>type</th>
                        <td>
                            {{$event->type}}
                            @if($event->type == 'private')
                                <a href="{{url('/sendmails/'.$event->id)}}" class="btn btn-info">send emails</a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>attendance</th>
                        <td>{{$event->attendance}}</td>
                    </tr>
                    <tr>
                        <th>location</th>
                        <td>{{$event->location}}</td>
                    </tr>
                    <tr>
                        <th>code</th>
                        <td>{{$event->code}}</td>
                    </tr>
                    <tr>
                        <th>attendance list</th>
                        <td><a href="{{url('/events/attendance/'.$event->id)}}" class="btn btn-primary">view attendance list</a></td>
                    </tr>
                    <tr>
                        <th>edit</th>
                        <td><a href="{{url('events/'. $event->id .'/edit') }}" class="btn btn-primary">edit</a></td>
                    </tr>
                    @if($event->attendance == 'complete')
                        <tr>
                            <th>event speaker</th>
                            <td><strong>session title</strong>: <span>speaker name</span><br>
                                @foreach($event->sessions as $session)
                                    <strong>{{$session->title}}</strong>: <span>{{$session->speaker->name}}</span><br>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
                    @else
                    </tbody>
                </table>
                    <div class="panel panel-default">
                        <div class="panel-heading">Sessions</div>
                        <div class="panel-body">
                            @foreach($event->sessions as $session)
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        {{$session->title}}
                                    </div>
                                    <div class="panel-body">
                                        <strong>speaker name</strong>: <span>{{$session->speaker['name']}}</span><br>
                                        <strong>speaker start time</strong>: <span>{{$session->start_time}}</span><br>
                                        <strong>speaker duration</strong>: <span>{{$session->duration}}</span><br>
                                    </div>
                                    <div class="panel-footer text-right">
                                        <a href="{{url('/sessions/'.$session->id . '/edit')}}" class="btn btn-primary">edit session</a>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="{{'#modal-danger-'.$session->id}}">
                                            Delete session
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="panel-footer"><a href="{{url('/addSessionForEvent/'.$event->id)}}" class="btn btn-primary">add session</a></div>
                    </div>
                    @endif

                    <div class="panel panel-default">
                        <div class="panel-heading">materials</div>
                        <div class="panel-body">
                                <div class="panel panel-default">
                                    <div class="panel-heading">documents</div>
                                    <div class="panel-body">
                                        <ul>
                                    @foreach($event->materials as $material)
                                        @if($material->type == 'document')
                                            <li><a href="{{url('download/'.$material->id)}}">{{$material->material_name.'.' .$material->extension}}</a></li>
                                        @endif
                                    @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel  panel-default">
                                    <div class="panel-heading">images</div>
                                    <div class="panel-body">
                                    @foreach($event->materials as $material)
                                        @if($material->type == 'image')
                                            <img class="img-thumbnail" src="{{url('/resources/assets/uploads/materials/'. $material->link)}}" width="200" height="200">
                                        @endif
                                    @endforeach
                                    </div>
                                </div>

                        </div>
                        <div class="panel-footer"><a href="{{url('/addMaterialForEvent/'.$event->id)}}" class="btn btn-primary">add material</a></div>
                    </div>
                    @if($event->type == 'private')
                        <div class="panel  panel-default">
                            <div class="panel-heading">chairs</div>
                            <div class="panel-body">
                                @if(isset($event->vip_chairs) && $event->vip_chairs > 0)
                                    @for($i = 1;$i <= $event->vip_chairs; $i++)
                                        @if(in_array($i, $chair_num))
                                            <a href="{{url('/chairs/'. $i)}}" class="btn btn-success">{{$i}}</a>
                                        @else
                                            <a href="{{url('/chairs/create/'. $i . '/'. $event->id)}}" class="btn btn-danger">{{$i}}</a>
                                        @endif
                                    @endfor
                                @endif
                            </div>
                            <div class="panel-footer">
                                <a href="{{url('/addChairs/'. $event->id)}}" class="btn btn-info">set number of vip chairs</a>
                            </div>
                        </div>
                @endif
                @if(count($event->questions()) > 0)
                        <div class="panel panel-default">
                            <div class="panel-heading">questions</div>
                            <div class="panel-body">
                                <ol>
                                    @foreach($event->questions as $question)
                                        <li style="margin: 3px 0;">
                                            {{$question->question}}
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="{{'#modal-danger-'.$question->id}}">
                                                Delete
                                            </button>
                                        </li>
                                    @endforeach
                                </ol>
                            </div>
                            <div class="panel-footer"><a href="{{url('/addQuestionForEvent/'.$event->id)}}" class="btn btn-primary">add questions</a></div>
                        </div>
                @endif

                <!-- /.box -->
            </div>
        </div>
    </Section>


    @foreach ($event->sessions as $session)
        <div class="modal modal-danger fade in" id="{{'modal-danger-'.$session->id}}" style=" padding-right: 17px;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">alert</h4>
                    </div>
                    <div class="modal-body">
                        <p>do you realy want to delete session <strong style="color: #000;">{{$session->name}}</strong></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                        {!! Form::open(['url' => 'sessions/'.$session->id, 'method' => 'delete']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach


    @foreach ($event->questions as $question)
        <div class="modal modal-danger fade in" id="{{'modal-danger-'.$question->id}}" style=" padding-right: 17px;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">alert</h4>
                    </div>
                    <div class="modal-body">
                        <p>do you realy want to delete question</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                        {!! Form::open(['url' => 'questions/'.$question->id, 'method' => 'delete']) !!}
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