<tr data-index="{{ $index }}">
    <td>{!! Form::text('answers['.$index.'][text_answer]', old('answers['.$index.'][text_answer]', isset($field) ? $field->text_answer: ''), ['class' => 'form-control']) !!}</td>

    <td>
        <a href="#" class="remove btn btn-xs btn-danger">@lang('quickadmin.qa_delete')</a>
    </td>
</tr>