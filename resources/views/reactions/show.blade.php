@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.reactions.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.reactions.fields.type')</th>
                            <td>{{ $reaction->type }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.reactions.fields.title')</th>
                            <td>{{ $reaction->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.reactions.fields.audio')</th>
                            <td>@if($reaction->audio)<a href="{{ asset('uploads/' . $reaction->audio) }}" target="_blank">Скачать файл</a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.reactions.fields.content')</th>
                            <td>{!! $reaction->content !!}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('reactions.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop