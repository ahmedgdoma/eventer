@extends('layouts.master')
@section("title")
    send emails
@endsection
@section("content")
    <section class="content-header">
        <h1>
            send email for vip users
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(['url'=>'/sendtousers']) !!}
                    <div class="row">
                        @foreach($users as $user)
                            <div class="form-group col-md-6">
                                {!! Form::checkbox('users[]', $user->email, false, ['id'=>$user->id]) !!}
                                {!! Form::label($user->id, $user->first_name. ' '.$user->last_name.'('.$user->email.')') !!}
                            </div>
                        @endforeach
                        <div class="col-md-6">
                            {!! Form::label('event code') !!}
                            <input name="code" value="{{$event->code}}" class="form-control" disabled>
                        </div>
                            <div class="col-md-6">
                                {!! Form::label('event title') !!}
                                <input name="title" value="{{$event->title}}" class="form-control" disabled>
                                <input name="event_id" value="{{$event->id}}" class="form-control" type="hidden">
                            </div>
                            <div class="col-md-12">
                                {!! Form::label('email message') !!}
                                {!! Form::textarea('message', null, ['class'=>'form-control']) !!}
                            </div>
                    </div>
                    <div class="box-footer">
                        {!! Form::submit('send emails', ['class' => 'btn btn-primary']); !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection