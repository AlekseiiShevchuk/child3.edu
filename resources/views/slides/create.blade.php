@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.slides.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['slides.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('slider_type', 'Тип слайда*', ['class' => 'control-label']) !!}
                    {!! Form::select('slider_type', $enum_slider_type, old('slider_type'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('slider_type'))
                        <p class="help-block">
                            {{ $errors->first('slider_type') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Название слайда*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('audio', 'Аудио файл который будет автоматически проигран при открытии слайда', ['class' => 'control-label']) !!}
                    {!! Form::file('audio', ['class' => 'form-control']) !!}
                    {!! Form::hidden('audio_max_size', 8) !!}
                    <p class="help-block"></p>
                    @if($errors->has('audio'))
                        <p class="help-block">
                            {{ $errors->first('audio') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('content', 'Контент слайда*', ['class' => 'control-label']) !!}
                    {!! Form::textarea('content', old('content'), ['class' => 'form-control editor', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('content'))
                        <p class="help-block">
                            {{ $errors->first('content') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('lesson_id', 'Какому уроку принадлежит слайд*', ['class' => 'control-label']) !!}
                    {!! Form::select('lesson_id', $lessons, request()->get('slide') ?? old('lesson_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('lesson_id'))
                        <p class="help-block">
                            {{ $errors->first('lesson_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('is_active', 'Активен ли слайд (доступен ли для просмотра пользователями)*', ['class' => 'control-label']) !!}
                    {!! Form::hidden('is_active', 0) !!}
                    {!! Form::checkbox('is_active', 1, false, ['required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('is_active'))
                        <p class="help-block">
                            {{ $errors->first('is_active') }}
                        </p>
                    @endif
                </div>
            </div>

        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent
    @include('partials.ckeditor')

@stop