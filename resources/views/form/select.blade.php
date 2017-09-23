<div class="form-group @if($errors->has($name)) has-error @endif">
    {{ Form::label($name, $label) }}
    {{ Form::select($name, $options, $value, array_merge(['class' => 'form-control'], $attributes), $optionAttributes) }}
    @if($errors->has($name))
        @foreach($errors->get($name) as $message)
            <p class="help-block">{{ $message }}</p>
        @endforeach
    @endif
</div>