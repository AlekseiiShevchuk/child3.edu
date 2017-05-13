@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.lessons.title')</h3>

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.lessons.fields.name')</th>
                            <td>{{ $lesson->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.lessons.fields.description')</th>
                            <td>{{ $lesson->description }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.lessons.fields.category')</th>
                            <td>{{ $lesson->category->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>Управление уроком</th>
                            <td>
                                @can('lesson_view')
                                    <a href="{{ route('slides.create') }}?lesson_id={{$lesson->id}}" class="btn btn-xs btn-success">Добавить слайд к этому уроку</a>
                                    <a href="{{ route('lessons.show',[$lesson->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                @endcan
                                @can('lesson_edit')
                                    <a href="{{ route('lessons.edit',[$lesson->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                @endcan
                                @can('lesson_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['lessons.destroy', $lesson->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                            </td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#slides" aria-controls="slides" role="tab" data-toggle="tab">Слайды</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="slides">
<table class="table table-bordered table-striped {{ count($slides) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.slides.fields.slider-type')</th>
                        <th>@lang('quickadmin.slides.fields.name')</th>
                        <th>@lang('quickadmin.slides.fields.audio')</th>
                        <th>@lang('quickadmin.slides.fields.content')</th>
                        <th>@lang('quickadmin.slides.fields.lesson')</th>
                        <th>@lang('quickadmin.slides.fields.is-active')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($slides) > 0)
            @foreach ($slides as $slide)
                <tr data-entry-id="{{ $slide->id }}">
                    <td>{{ $slide->slider_type }}</td>
                                <td>{{ $slide->name }}</td>
                                <td>@if($slide->audio)<a href="{{ asset('uploads/' . $slide->audio) }}" target="_blank">Скачать файл</a>@endif</td>
                                <td>{!! $slide->content !!}</td>
                                <td>{{ $slide->lesson->name or '' }}</td>
                                <td>{{ Form::checkbox("is_active", 1, $slide->is_active == 1, ["disabled"]) }}</td>
                                <td>
                                    @can('slide_view')
                                        @if($slide->slider_type == 'test')
                                            <a href="{{ route('answers.create') }}?slide_id={{$slide->id}}" class="btn btn-xs btn-success">Добавить ответ к этому слайду</a>
                                        @endif
                                    <a href="{{ route('slides.show',[$slide->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('slide_edit')
                                    <a href="{{ route('slides.edit',[$slide->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('slide_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['slides.destroy', $slide->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="10">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

        </div>
    </div>
@stop