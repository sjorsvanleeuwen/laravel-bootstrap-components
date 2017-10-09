@php
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
    {{ Form::email($name, $value, array_merge_recursive(['class' => 'form-control'], $attributes)) }}
    @if($errors->has($name))
        @foreach($errors->get($name) as $message)
            <p class="help-block">{{ $message }}</p>
        @endforeach
    @endif
</div>