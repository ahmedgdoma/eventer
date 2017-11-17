@extends('layouts.master')
@section("title")
    add question
@endsection
@section("content")
    <section class="content-header">
        <h1>
            add question
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a class="active">speakers</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="box">
                    <div class="box-body">
                        {{ Form::open(['action' => ['QuestionController@store']]) }}
                        {{Form::hidden('event_id',$event_id)}}
                        <div class="form-group">
                            {!! Form::label('old questions') !!}
                            {!! Form::select('questions[]', $questions, null, ['class'=>'form-control', 'multiple']) !!}
                        </div>
                            <div class="session-holder" data-value="0">
                                <div class="form-group">
                                    {{ Form::label('question') }}
                                    {{ Form::text('question[]', null, ['class'=>'form-control', 'placeholder'=>'question', ]) }}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('type') !!}
                                    {!! Form::select('type[]', [
                                'textarea' =>'textarea',
                                'text' =>'text',
                                'select' =>'select',
                                'radio' =>'radio',
                                'checkbox' =>'checkbox',
                                ], null, ['class'=>'form-control q', 'placeholder'=>'choose type']) !!}
                                </div>
                                <div class="answers">
                                    {!! Form::label('answers') !!}
                                    <div class="row">
                                        <div class="col-md-3">
                                            {!! Form::text('answers[0][]', null, ['class'=>'form-control']) !!}
                                        </div>
                                        <div class="col-md-3">
                                            {!! Form::text('answers[0][]', null, ['class'=>'form-control']) !!}
                                        </div>
                                        <div class="col-md-3">
                                            {!! Form::text('answers[0][]', null, ['class'=>'form-control']) !!}
                                        </div>
                                        <div class="col-md-3">
                                            {!! Form::text('answers[0][]', null, ['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="form-group">
                            <span class="btn-primary btn add-question">add new question</span>
                        </div>
                        <div class="box-footer">
                            {!! Form::submit('submit', ['class' => 'btn btn-primary']); !!}
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
            $('.add-question').on('click' ,function (){
                var data = $('.session-holder').last().data('value') + 1;
                $(this).parent().before("<div class='session-holder' data-value="+ data +">"+$('.session-holder').html()+'</div>');
                $('.session-holder').last().find('.answers input').attr('name', 'answers['+ data +'][]')
            });
            $('.session-holder').on('change','.q' ,function(){
                var value = $(this).val();
                if(value == 'radio' ||value == 'select' ||value == 'checkbox'){
                    alert(value);
                    $(this).parents('.session-holder').find('.answers').show();
                }else{
                    $(this).parents('.session-holder').find('.answers').hide();
                }
            });

        });
    </script>
@endsection