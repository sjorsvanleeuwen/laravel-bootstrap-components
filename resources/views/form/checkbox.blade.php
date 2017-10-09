@php
    $form_group_classes = [
        'form-group',
        'checkbox'
    ];
    if($errors->has($name))
    {
        $form_group_classes[] = 'has-error';
    }
@endphp
<div class="{{ implode(' ', $form_group_classes) }}">
    <label for="{{ $name }}">
        {{ Form::checkbox($name, $value, $checked, array_merge_recursive(['id' => $name], $attributes)) }} {{ $label }}
    </label>
</div>