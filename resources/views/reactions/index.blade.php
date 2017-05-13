@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.reactions.title')</h3>
    @can('reaction_create')
    <p>
        <a href="{{ route('reactions.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($reactions) > 0 ? 'datatable' : '' }} @can('reaction_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('reaction_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.reactions.fields.type')</th>
                        <th>@lang('quickadmin.reactions.fields.title')</th>
                        <th>@lang('quickadmin.reactions.fields.audio')</th>
                        <th>@lang('quickadmin.reactions.fields.content')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($reactions) > 0)
                        @foreach ($reactions as $reaction)
                            <tr data-entry-id="{{ $reaction->id }}">
                                @can('reaction_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $reaction->type }}</td>
                                <td>{{ $reaction->title }}</td>
                                <td>@if($reaction->audio)<a href="{{ asset('uploads/' . $reaction->audio) }}" target="_blank">Скачать файл</a>@endif</td>
                                <td>{!! $reaction->content !!}</td>
                                <td>
                                    @can('reaction_view')
                                    <a href="{{ route('reactions.show',[$reaction->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('reaction_edit')
                                    <a href="{{ route('reactions.edit',[$reaction->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('reaction_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['reactions.destroy', $reaction->id])) !!}
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
@stop

@section('javascript') 
    <script>
        @can('reaction_delete')
            window.route_mass_crud_entries_destroy = '{{ route('reactions.mass_destroy') }}';
        @endcan

    </script>
@endsection