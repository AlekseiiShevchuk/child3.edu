<tr data-index="{{ $index }}">
    <td>{!! Form::text('lessons['.$index.'][name]', old('lessons['.$index.'][name]', isset($field) ? $field->name: ''), ['class' => 'form-control']) !!}</td>
<td>{!! Form::text('lessons['.$index.'][description]', old('lessons['.$index.'][description]', isset($field) ? $field->description: ''), ['class' => 'form-control']) !!}</td>

    <td>
        <a href="#" class="remove btn btn-xs btn-danger">@lang('quickadmin.qa_delete')</a>
    </td>
</tr>