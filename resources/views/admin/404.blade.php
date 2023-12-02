<div id="right-panel" class="right-panel">
@include('admin.header')
@if($view_name == 'admin-index')
@else
<h1 align="center" class="display-404">{{ Helper::translation(3852,$translate,'') }}</h1>
<h3 align="center" class="mt-3 pt-3">{{ Helper::translation(3855,$translate,'') }}</h3>
@endif
</div>