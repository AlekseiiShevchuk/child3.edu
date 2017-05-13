@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.lessons.title')</h3>
    @can('lesson_create')
    <p>
        <a href="{{ route('lessons.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($lessons) > 0 ? 'datatable' : '' }} @can('lesson_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('lesson_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

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
                                @can('lesson_delete')
                                    <td></td>
                                @endcan

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
@stop

@section('javascript') 
    <script>
        @can('lesson_delete')
            window.route_mass_crud_entries_destroy = '{{ route('lessons.mass_destroy') }}';
        @endcan

    </script>
@endsection