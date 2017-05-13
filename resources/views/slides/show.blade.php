@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.slides.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.slides.fields.slider-type')</th>
                            <td>{{ $slide->slider_type }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.slides.fields.name')</th>
                            <td>{{ $slide->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.slides.fields.audio')</th>
                            <td>@if($slide->audio)<a href="{{ asset('uploads/' . $slide->audio) }}" target="_blank">Download file</a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.slides.fields.content')</th>
                            <td>{!! $slide->content !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.slides.fields.lesson')</th>
                            <td>{{ $slide->lesson->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.slides.fields.is-active')</th>
                            <td>{{ Form::checkbox("is_active", 1, $slide->is_active == 1, ["disabled"]) }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#answers" aria-controls="answers" role="tab" data-toggle="tab">Варианты ответов</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="answers">
<table class="table table-bordered table-striped {{ count($answers) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.answers.fields.text-answer')</th>
                        <th>@lang('quickadmin.answers.fields.image-answer')</th>
                        <th>@lang('quickadmin.answers.fields.is-correct')</th>
                        <th>@lang('quickadmin.answers.fields.slide')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($answers) > 0)
            @foreach ($answers as $answer)
                <tr data-entry-id="{{ $answer->id }}">
                    <td>{{ $answer->text_answer }}</td>
                                <td>@if($answer->image_answer)<a href="{{ asset('uploads/' . $answer->image_answer) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $answer->image_answer) }}"/></a>@endif</td>
                                <td>{{ Form::checkbox("is_correct", 1, $answer->is_correct == 1, ["disabled"]) }}</td>
                                <td>{{ $answer->slide->name or '' }}</td>
                                <td>
                                    @can('answer_view')
                                    <a href="{{ route('answers.show',[$answer->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('answer_edit')
                                    <a href="{{ route('answers.edit',[$answer->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('answer_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['answers.destroy', $answer->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="8">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('slides.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop