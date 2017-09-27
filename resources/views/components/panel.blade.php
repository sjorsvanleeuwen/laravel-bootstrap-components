@php
    $panelType = $panelType ? $panelType : 'default';
@endphp
<div class="panel panel-{{ $panelType }}">
    @isset($title)
        <div class="panel-heading">
            <h2>
                {{ $title }}
                @component('bc::components.breadcrumb')
                @endcomponent
            </h2>
        </div>
    @endisset
    {{ $slot }}
    @isset($footer)
        <div class="panel-footer text-right">
            {{ $footer }}
        </div>
    @endisset
</div>