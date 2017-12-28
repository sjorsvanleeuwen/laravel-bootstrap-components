@php
    $iconMap = [
        'create' => 'plus',
        'edit' => 'pencil',
        'delete' => 'trash',
        'cancel' => 'ban-circle',
        'save' => 'floppy-disk',
        'index' => 'th-list'
    ];
    $linkTitle = '';
    $title = trans('bc::form.' . $type, ['type' => $title]);
    $icon = '<span class="glyphicon glyphicon-' . $iconMap[$type] . '"></span>';
    $linkBuilder = [];
    if($show_icon)
    {
        $linkBuilder[] = $icon;
    }
    if($show_title)
    {
        $linkBuilder[] = $title;
    }
@endphp
{{ Html::link($url, implode(' ', $linkBuilder), array_merge_recursive(['class' => 'btn btn-default'], $attributes), null, false) }}