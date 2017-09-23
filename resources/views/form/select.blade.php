@php
    $form_group_classes = [
        'form-group'
    ];
    if($errors->has($name))
    {
        $form_group_classes[] = 'has_error';
    }
@endphp
<div class="{{ implode(' ', $form_group_classes) }}">
    {{ Form::label($name, $label) }}
    {{ Form::select($name, $options, $value, array_merge(['class' => 'form-control'], $attributes), $optionAttributes) }}
    @if($errors->has($name))
        @foreach($errors->get($name) as $message)
            <p class="help-block">{{ $message }}</p>
        @endforeach
    @endif
</div>