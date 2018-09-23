<?php
$route = Route::current();
$name = $route->getName();
$actionName = $route->getActionName();

?>
<div class="list-group">
    <a href="{{ URL::route('dashboard.index') }}" class="list-group-item @if ($name == 'dashboard.index') active @endif">Dashboard</a>
    <a href="{{ URL::route('flim.index') }}" class="list-group-item @if ($name == 'flim.index' || $name == 'flim.add' || $name == 'flim.update') active @endif">Manage Films</a>
</div>