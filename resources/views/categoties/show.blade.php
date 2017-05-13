@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.categoties.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.categoties.fields.name')</th>
                            <td>{{ $categoty->name }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#lessons" aria-controls="lessons" role="tab" data-toggle="tab">Уроки</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="lessons">
<table class="table table-bordered table-striped {{ count($lessons) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.lessons.fields.name')</th>
                        <th>@lang('quickadmin.lessons.fields.description')</th>
                        <th>@lang('quickadmin.lessons.fields.category')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($lessons) > 0)
            @foreach ($lessons as $lesson)
                <tr data-entry-id="{{ $lesson->id }}">
                    <td>{{ $lesson->name }}</td>
                                <td>{{ $lesson->description }}</td>
                                <td>{{ $lesson->category->name or '' }}</td>
                                <td>
                                    @can('lesson_view')
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
            @endforeach
        @else
            <tr>
                <td colspan="7">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('categoties.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop