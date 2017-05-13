@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.answers.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.answers.fields.text-answer')</th>
                            <td>{{ $answer->text_answer }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.answers.fields.image-answer')</th>
                            <td>@if($answer->image_answer)<a href="{{ asset('uploads/' . $answer->image_answer) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $answer->image_answer) }}"/></a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.answers.fields.is-correct')</th>
                            <td>{{ Form::checkbox("is_correct", 1, $answer->is_correct == 1, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.answers.fields.slide')</th>
                            <td>{{ $answer->slide->name or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('answers.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop