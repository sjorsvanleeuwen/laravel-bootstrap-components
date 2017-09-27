@php
$route = Route::getCurrentRoute()->getName();
$breadcrumbs = [];
array_push($breadcrumbs, [
    'name' => substr($route, 0, strpos($route, '.')),
    'route' => $route,
    'action' => substr($route, strpos($route, '.') + 1)
]);
if(substr($route, strpos($route, '.') + 1) != 'index')
{
    array_unshift($breadcrumbs, [
        'name' => substr($route, 0, strpos($route, '.')),
        'route' => substr($route, 0, strpos($route, '.')) . '.index',
        'action' => 'index'
    ]);
}
@endphp
<ol class="breadcrumb pull-right">
    @foreach($breadcrumbs as $breadcrumb)
        @php
            if($breadcrumb['action'] != 'index')
            {
                $breadcrumb['title'] = trans('general.form.' . $breadcrumb['action'], ['type' => trans_choice($breadcrumb['name'] . '.title', 1)]);
            }
            else
            {
                $breadcrumb['title'] = trans_choice($breadcrumb['name'] . '.title', 2);
            }
        @endphp
        @if($loop->last)
            <li class="active">{{ $breadcrumb['title'] }}</li>
        @else
            <li><a href="{{ route($breadcrumb['route']) }}">{{ $breadcrumb['title'] }}</a></li>
        @endif
    @endforeach
</ol>