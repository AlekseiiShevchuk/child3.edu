@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.slides.title')</h3>
    @can('slide_create')
    <p>
        <a href="{{ route('slides.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($slides) > 0 ? 'datatable' : '' }} @can('slide_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('slide_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

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
                                @can('slide_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $slide->slider_type }}</td>
                                <td>{{ $slide->name }}</td>
                                <td>@if($slide->audio)<a href="{{ asset('uploads/' . $slide->audio) }}" target="_blank">Download file</a>@endif</td>
                                <td>{!! $slide->content !!}</td>
                                <td>{{ $slide->lesson->name or '' }}</td>
                                <td>{{ Form::checkbox("is_active", 1, $slide->is_active == 1, ["disabled"]) }}</td>
                                <td>
                                    @can('slide_view')
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
@stop

@section('javascript') 
    <script>
        @can('slide_delete')
            window.route_mass_crud_entries_destroy = '{{ route('slides.mass_destroy') }}';
        @endcan

    </script>
@endsection