@php
    $panelType = isset($panelType) ? $panelType : 'default';
    $includeBreadcrumb = isset($includeBreadcrumb) ? $includeBreadcrumb : true;
@endphp
<div class="panel panel-{{ $panelType }}">
    @isset($title)
        <div class="panel-heading">
            <h2>
                {{ $title }}
                @if($includeBreadcrumb)
                    @component('bc::components.breadcrumb')
                    @endcomponent
                @endif
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