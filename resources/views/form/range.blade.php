@php
    $value = $value ? $value : round($max / 2);
    $form_group_classes = [
        'form-group'
    ];
    if($errors->has($name))
    {
        $form_group_classes[] = 'has-error';
    }
@endphp
<div class="{{ implode(' ', $form_group_classes) }}">
    {{ Form::label($name, $label) }}
    <output name="output_{{ $name }}">{{ $value }}</output>
    {{ Form::input('range', $name, $value, array_merge(['class' => 'form-control', 'min' => $min, 'max' => $max, 'oninput' => 'output_' . $name . '.value = ' . $name . '.value'], $attributes)) }}
    @if($errors->has($name))
        @foreach($errors->get($name) as $message)
            <p class="help-block">{{ $message }}</p>
        @endforeach
    @endif
</div>