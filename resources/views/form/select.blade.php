@php
    $form_group_classes = [
        'form-group'
    ];
    if($errors->has($name))
    {
        $form_group_classes[] = 'has-error';
    }

    $item_name = in_array('multiple', $attributes) ? $name . '[]' : $name;
@endphp
<div class="{{ implode(' ', $form_group_classes) }}">
    {{ Form::label($item_name, $label) }}
    {{ Form::select($item_name, $options, $value, array_merge_recursive(['class' => 'form-control'], $attributes), $optionAttributes) }}
    @if($errors->has($name))
        @foreach($errors->get($name) as $message)
            <p class="help-block">{{ $message }}</p>
        @endforeach
    @endif
</div>