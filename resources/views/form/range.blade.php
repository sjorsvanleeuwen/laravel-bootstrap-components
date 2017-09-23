@php
    $value = $value ? $value : round($max / 2);
@endphp

<div class="form-group @if($errors->has($name)) has-error @endif">
    {{ Form::label($name, $label) }}
    <output name="output_{{ $name }}">{{ $value }}</output>
    {{ Form::input('range', $name, $value, array_merge(['class' => 'form-control', 'min' => $min, 'max' => $max, 'oninput' => 'output_' . $name . '.value = ' . $name . '.value'], $attributes)) }}
    @if($errors->has($name))
        @foreach($errors->get($name) as $message)
            <p class="help-block">{{ $message }}</p>
        @endforeach
    @endif
</div>