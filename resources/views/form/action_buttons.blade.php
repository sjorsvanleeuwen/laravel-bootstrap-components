{{ Html::bsActionLink($cancelUrl, trans('bc::form.cancel'), 'cancel', true, false) }}
{{ Form::submit(trans('bc::form.save'), ['class' => 'btn btn-primary']) }}