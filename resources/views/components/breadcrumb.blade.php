@php
    $route = Route::getCurrentRoute()->getName();
    $routeParts = explode('.', $route);
    $showBreadcrumb = count($routeParts) > 1;
    $routeParams = Route::getCurrentRoute()->parameters();

    $breadcrumbs = [];
    if($showBreadcrumb)
    {
        do {
            $objectType = $routeParts[count($routeParts) - 2];
            $param = \Illuminate\Support\Arr::get($routeParams, $objectType);
            $action = array_last($routeParts);
            $title = trans_choice($objectType . '.title', 2);

            if($action == 'create' || $action == 'edit' || $action == 'delete')
            {
                $title = trans('bc::form' . $action, ['type' => trans_choice($objectType . '.title', 1)]);
            }
            else if($action == 'show')
            {
                $title = $param->name;
            }
            array_unshift($breadcrumbs, [
                'route' => $route,
                'title' => $title,
                'params' => $routeParams
            ]);

            array_pop($routeParts);
            unset($routeParams[$objectType]);

            if($action != 'index')
            {
                if(count($routeParts) > 1)
                {
                    array_pop($routeParts);
                    array_push($routeParts, 'show');
                }
                else
                {
                    array_push($routeParts, 'index');
                }
                $route = implode('.', $routeParts);
            }
        }
        while(count($routeParts) > 1);
    }
@endphp
@if($showBreadcrumb)
<ol class="breadcrumb pull-right">
    @foreach($breadcrumbs as $breadcrumb)
        @if($loop->last)
            <li class="active">{{ $breadcrumb['title'] }}</li>
        @else
            <li><a href="{{ route($breadcrumb['route'], $breadcrumb['params']) }}">{{ $breadcrumb['title'] }}</a></li>
        @endif
    @endforeach
</ol>
@endif