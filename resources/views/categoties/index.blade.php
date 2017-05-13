@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.categoties.title')</h3>
    @can('categoty_create')
    <p>
        <a href="{{ route('categoties.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($categoties) > 0 ? 'datatable' : '' }} @can('categoty_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('categoty_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.categoties.fields.name')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($categoties) > 0)
                        @foreach ($categoties as $categoty)
                            <tr data-entry-id="{{ $categoty->id }}">
                                @can('categoty_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $categoty->name }}</td>
                                <td>
                                    @can('categoty_view')
                                    <a href="{{ route('categoties.show',[$categoty->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('categoty_edit')
                                    <a href="{{ route('categoties.edit',[$categoty->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('categoty_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['categoties.destroy', $categoty->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('categoty_delete')
            window.route_mass_crud_entries_destroy = '{{ route('categoties.mass_destroy') }}';
        @endcan

    </script>
@endsection