@extends('layouts.master')
@section("title")
    add event
@endsection
@section("content")
    <section class="content-header">
        <h1>
            add event
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a class="active">events</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="box">
                    <div class="box-body">
                        {{ Form::open(['action'=>'eventController@store', 'files'=>'true ']) }}
                        <div id="event-form">
                            {{ Form::label('title') }}
                            @if(count($errors->first('title')) > 0)
                                <span class="text-danger">{{$errors->first('title')}}</span>
                            @endif
                            {{ Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'event title'])}}

                            {{ Form::label('description') }}
                            @if(count($errors->first('description')) > 0)
                                <span class="text-danger">{{$errors->first('description')}}</span>
                            @endif
                            {{ Form::textarea('description', null, ['class'=>'form-control'])}}

                            {{ Form::label('code')}}
                            @if(count($errors->first('code')) > 0)
                                <span class="text-danger">{{$errors->first('code')}}</span>
                            @endif
                            {{ Form::text('code', null, ['class'=>'form-control', 'placeholder'=>'event code'])}}

                            {{ Form::label('type')}}
                            @if(count($errors->first('type')) > 0)
                                <span class="text-danger">{{$errors->first('type')}}</span>
                            @endif
                            {{ Form::select('type',['private'=>'private','public'=>'public'] ,null, ['class'=>'form-control ', 'placeholder'=>'type']) }}


                            {{ Form::label('attendance')}}
                            @if(count($errors->first('attendance')) > 0)
                                <span class="text-danger">{{$errors->first('attendance')}}</span>
                            @endif
                            {{ Form::select('attendance',['complete'=>'complete','sessions'=>'sessions'] ,null, ['class'=>'type form-control', 'placeholder'=>'attendance']) }}

                            {{ Form::label('image') }}
                            {{ Form::file('image') }}
                            <div class="box-footer text-center">
                                <span class="btn btn-primary change" data-toggle="session-form">next</span>
                            </div>
                        </div>
                        <div  id="session-form">
                            <div class="session-holder">
                                {{ Form::label('session title') }}
                                {{ Form::text('session_title[]', null, ['class'=>'form-control', 'placeholder'=>'session title'])}}

                                {{ Form::label('session start time') }}
                                {{ Form::time('session_time[]', \Carbon\Carbon::now(), ['class'=>'form-control', 'placeholder'=>'session start time'])}}

                                {{ Form::label('session duration in hours') }}
                                {{ Form::number('session_duration[]', null, ['class'=>'form-control', 'placeholder'=>'session duration in hours'])}}

                                {{ Form::label('session speaker') }}
                                {{ Form::select('session_speaker[]',$speakers ,null, ['class'=>'form-control', 'placeholder'=>'session speaker'])}}


                            </div>
                            <div class="box-footer">
                                <span class="btn btn-info add" >add another session</span>
                            </div>

                            <div class="box-footer text-center">
                                <span class="btn btn-primary change" data-toggle="event-form">back</span>
                                {!! Form::submit('submit', ['class' => 'btn btn-primary']); !!}
                            </div>
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
@section('script')
<script>
    $(document).ready(function () {
        $('.change').on('click', function(){
            $('#' + $(this).data('toggle')).show().siblings('div').hide();
        });
        $('.type').on('change', function(){
            if ($(this).val() == "sessions"){
                $('.add').show();
                $('.add').on('click', function (){
                    $(this).parent().before("<div class='session-holder'>"+$('.session-holder').html()+'</div>');
                    $('.remove').show();
                });
            }
        });
    });
</script>
@endsection