@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.answers.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['answers.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('text_answer', 'Текстовый ответ (оставить пустым если ответ картинка)', ['class' => 'control-label']) !!}
                    {!! Form::text('text_answer', old('text_answer'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('text_answer'))
                        <p class="help-block">
                            {{ $errors->first('text_answer') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('image_answer', 'Ответ-картинка (оставить пустым если ответ текстовый)', ['class' => 'control-label']) !!}
                    {!! Form::file('image_answer', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                    {!! Form::hidden('image_answer_max_size', 8) !!}
                    {!! Form::hidden('image_answer_max_width', 4000) !!}
                    {!! Form::hidden('image_answer_max_height', 4000) !!}
                    <p class="help-block"></p>
                    @if($errors->has('image_answer'))
                        <p class="help-block">
                            {{ $errors->first('image_answer') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('is_correct', 'Правильный ли это вариант ответа?*', ['class' => 'control-label']) !!}
                    {!! Form::hidden('is_correct', 0) !!}
                    {!! Form::checkbox('is_correct', 1, false) !!}
                    <p class="help-block"></p>
                    @if($errors->has('is_correct'))
                        <p class="help-block">
                            {{ $errors->first('is_correct') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('slide_id', 'Для какого слайда ответ*', ['class' => 'control-label']) !!}
                    @if(!empty(request()->get('slide_id')))
                        {!! Form::hidden('slide_id', request()->get('slide_id')) !!}
                        {!! Form::select('slide_id', $slides, request()->get('slide_id'), ['class' => 'form-control select2',  'disabled']) !!}
                    @else
                        {!! Form::select('slide_id', $slides, old('slide_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    @endif
                    <p class="help-block"></p>
                    @if($errors->has('slide_id'))
                        <p class="help-block">
                            {{ $errors->first('slide_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

