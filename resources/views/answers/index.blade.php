@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.answers.title')</h3>
    @can('answer_create')
    <p>
        <a href="{{ route('answers.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($answers) > 0 ? 'datatable' : '' }} @can('answer_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('answer_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

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
                                @can('answer_delete')
                                    <td></td>
                                @endcan

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
@stop

@section('javascript') 
    <script>
        @can('answer_delete')
            window.route_mass_crud_entries_destroy = '{{ route('answers.mass_destroy') }}';
        @endcan

    </script>
@endsection