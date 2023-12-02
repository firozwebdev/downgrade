<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>
<title>{{ $product_name }} - {{ $allsettings->site_title }}</title>
@include('meta')
<!-- Mobile Specific -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<!-- CSS Style -->
<link rel="stylesheet" href="{{ URL::to('resources/views/theme/preview/css/frame.css') }}">
<!-- Favicons -->
<link rel="canonical" href="{{ $product_url }}" />
@if($allsettings->site_favicon != '')
<link rel="apple-touch-icon" href="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_favicon }}">
<link rel="shortcut icon" href="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_favicon }}">
@endif
<!-- JavaScript -->
<script type="text/javascript" src="{{ URL::to('resources/views/theme/preview/js/jquery-1.9.1.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('resources/views/theme/preview/js/jquery-ui.js') }}"></script>
<script src="{{ URL::to('resources/views/theme/preview/js/custom.js') }}"></script>
</head>
<body>
<div id="switcher"  style="background-color: #000000" >
<div class="center">
    <div class="logo"> 
    @if($allsettings->site_logo != '')
    <a href="{{ URL::to('/') }}" class="navbar-brand m-r-lg" target="_blank"><img src="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_logo }}" alt="{{ $allsettings->site_title }}"></a> 
    @endif
    </div>
    <ul>
      <li id="theme_list"><a id="theme_select" href="{{ URL::to('/shop') }}">{{ Helper::translation('63bbbc9e44c19',$translate,'All Items') }}</a>
        <ul id="test1a">
          @foreach($allproducts as $product)
          <li><a href="{{ URL::to('/preview') }}/{{ $product->product_slug }}" >{{ $product->product_name }}</a></li>
		  @endforeach
		</ul>
     </li>
  </ul>
<div class="responsive"><a href="#" class="desktop active" title="View Desktop Version"></a> <a href="#" class="tabletlandscape" title="View Tablet Landscape (1024x768)"></a> <a href="#" class="tabletportrait" title="View Tablet Portrait (768x1024)"></a> <a href="#" class="mobilelandscape" title="View Mobile Landscape (480x320)"></a> <a href="#" class="mobileportrait" title="View Mobile Portrait (320x480)"></a></div>
<ul class="links">
          <li class="purchase" rel=""> <a href="{{ $product_url }}"><img src="{{ URL::to('resources/views/theme/preview/images/purchase.png') }}" alt="{{ Helper::translation('63bbb7d3e0347',$translate,'Purchase') }}" /> {{ Helper::translation('63bbb7d3e0347',$translate,'Purchase') }}</a> </li>
          <li class="close" rel="{{ $demo_url }}"> <a href="{{ $demo_url }}"><img src="{{ URL::to('resources/views/theme/preview/images/cross.png') }}" alt="{{ Helper::translation(4347,$translate,'') }}" /> {{ Helper::translation(4347,$translate,'') }}</a></li>
        </ul>
</div>
</div>
<iframe id="iframe" src="{{ $demo_url }}" frameborder="0" width="100%" height="100%"></iframe>
</body>
</html>




<?php /*?><!DOCTYPE html>
<html lang="en">
<head>
<title>{{ $item['item']->item_name }} - {{ $allsettings->site_title }}</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
@if($allsettings->site_favicon != '')
<link rel="apple-touch-icon" href="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_favicon }}">
<link rel="shortcut icon" href="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_favicon }}">
@endif
<link rel="stylesheet" href="{{ URL::to('resources/views/theme/preview/css/bootstrap.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ URL::to('resources/views/theme/preview/css/app.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ URL::to('resources/views/theme/preview/css/style.css') }}" type="text/css" />
</head>

<body>
<div id="header-bar">
<header id="header" class="navbar navbar-fixed-top bg-white-only box-shadow"  data-spy="affix" data-offset-top="1">
<div class="navbar-header text-center">
         @if($allsettings->site_logo != '')
         <a href="{{ URL::to('/') }}" class="navbar-brand m-r-lg">
         <img class="lazy img-fluid" width="200" height="56" src="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_logo }}"  alt="{{ $allsettings->site_title }}">
         </a>
         @endif
</div>
<ul class="nav navbar-nav text-center deskonly">
<li>
     <div class="">
       <a href="{{ URL::to('/item') }}/{{ $item['item']->item_slug }}" class="btn btn-md w-sm btn-success m-r-sm m-t-xxs"><strong>{{ Helper::translation(3074,$translate,'') }}</strong></a>
       <a href="{{ $item['item']->demo_url }}" class="btn btn-link btn-md"><i class="fa fa-remove m-r-xs m-t-xxs"></i>{{ Helper::translation(3108,$translate,'') }}</a>
     </div>
</li>
</ul>  
</div>
</header>
<iframe id="preview-frame" class="w-full h-full" src="{{ $item['item']->demo_url }}" name="preview-frame" frameborder="0" noresize="noresize">Your browser does not support frames.
</iframe>
<script src="{{ URL::to('resources/views/theme/preview/js/jquery.min.js') }}"></script>
<script src="{{ URL::to('resources/views/theme/preview/js/bootstrap.js') }}"></script>
</body>
</html><?php */?>