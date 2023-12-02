<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                @if($allsettings->site_logo != '')
                <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_logo }}"  alt="{{ $allsettings->site_title }}" width="180"/></a>
                @else
                <a class="navbar-brand" href="{{ url('/') }}">{{ substr($allsettings->site_title,0,10) }}</a>
                @endif
                @if($allsettings->site_favicon != '')
                <a class="navbar-brand hidden" href="{{ url('/') }}"><img src="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_favicon }}"  alt="{{ $allsettings->site_title }}" width="24"/></a>
                @else
                <a class="navbar-brand hidden" href="{{ url('/') }}">{{ substr($allsettings->site_title,0,1) }}</a>
                @endif
            </div>
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    @if(in_array('dashboard',$avilable))
                    <li>
                        <a href="{{ url('/admin') }}"> <i class="menu-icon fa fa-dashboard"></i>{{ Helper::translation(5070,$translate,'Dashboard') }} </a>
                    </li>
                    @endif
                    @if(in_array('settings',$avilable))
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-gears"></i>{{ Helper::translation(4941,$translate,'Settings') }}</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-gear"></i><a href="{{ url('/admin/general-settings') }}">{{ Helper::translation(4878,$translate,'General Settings') }}</a></li>
                            <li><i class="fa fa-gear"></i><a href="{{ url('/admin/color-settings') }}">{{ Helper::translation(4746,$translate,'Color Settings') }}</a></li>
                            <li><i class="fa fa-gear"></i><a href="{{ url('/admin/email-settings') }}">{{ Helper::translation(4854,$translate,'Email Settings') }}</a></li>
                            <li><i class="fa fa-gear"></i><a href="{{ url('/admin/media-settings') }}">{{ Helper::translation(5049,$translate,'Media Settings') }}</a></li>
                            <li><i class="fa fa-gear"></i><a href="{{ url('/admin/currency-settings') }}">{{ Helper::translation(4773,$translate,'Currency Settings') }}</a></li>
                            <li><i class="fa fa-gear"></i><a href="{{ url('/admin/payment-settings') }}">{{ Helper::translation(5073,$translate,'Payment Settings') }}</a></li>
                            <li><i class="fa fa-gear"></i><a href="{{ url('/admin/social-settings') }}">{{ Helper::translation(5076,$translate,'Social Settings') }}</a></li>
                            <li><i class="fa fa-gear"></i><a href="{{ url('/admin/limitation-settings') }}">{{ Helper::translation(4989,$translate,'Limitation Settings') }}</a></li>
                            <?php /*?><li><i class="fa fa-gear"></i><a href="{{ url('/admin/preferred-settings') }}">Preferred Settings</a></li><?php */?>
                        </ul>
                    </li>
                    @endif
                    @if(in_array('country',$avilable))
                    <li>
                        <a href="{{ url('/admin/country-settings') }}"> <i class="menu-icon fa fa-flag"></i>{{ Helper::translation(3945,$translate,'Country') }}</a>
                    </li>
                    @endif
                    @if(Auth::user()->id == 1)
                    <li>
                        <a href="{{ url('/admin/administrator') }}"> <i class="menu-icon ti-user"></i>{{ Helper::translation(5079,$translate,'Sub Administrator') }} </a>
                    </li>
                    @endif
                    @if(in_array('customers',$avilable))
                    <li>
                        <a href="{{ url('/admin/customer') }}"> <i class="menu-icon ti-user"></i>{{ Helper::translation(4782,$translate,'Customers') }} </a>
                    </li>
                    @endif
                    <?php /*?>@if(in_array('category',$avilable))
                    <li>
                        <a href="{{ url('/admin/category') }}"> <i class="menu-icon fa fa-location-arrow"></i>{{ Helper::translation(4200,$translate,'Category') }} </a>
                    </li>
                    @endif<?php */?>
                    @if(in_array('manage-products',$avilable))
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-shopping-cart"></i>{{ Helper::translation(5082,$translate,'Manage Products') }}</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-location-arrow"></i><a href="{{ url('/admin/category') }}">{{ Helper::translation(4200,$translate,'Category') }}</a></li>
                            <li><i class="menu-icon fa fa-location-arrow"></i><a href="{{ url('/admin/sub-category') }}">{{ Helper::translation('62612871df65f',$translate,'Sub Category') }}</a></li>
                            <li><i class="menu-icon fa fa-shopping-cart"></i><a href="{{ url('/admin/products') }}">{{ Helper::translation(4974,$translate,'Products') }}</a></li>
                            <li><i class="menu-icon fa fa-shopping-cart"></i><a href="{{ url('/admin/package-includes') }}">{{ Helper::translation(4203,$translate,'Package Includes') }}</a></li>
                            <li><i class="menu-icon fa fa-shopping-cart"></i><a href="{{ url('/admin/compatible-browsers') }}">{{ Helper::translation(4206,$translate,'Compatible Browsers') }}</a></li>
                        </ul>
                    </li>
                    @endif
                    @if(in_array('orders',$avilable))
                    <li>
                        <a href="{{ url('/admin/orders') }}"> <i class="menu-icon fa fa-first-order"></i>{{ Helper::translation(5085,$translate,'Orders') }} </a>
                    </li>
                    @endif
                    @if($allsettings->site_refund_display == 1)
                    @if(in_array('refund-request',$avilable))
                    <li>
                        <a href="{{ url('/admin/refund') }}"> <i class="menu-icon fa fa-undo"></i>{{ Helper::translation(4317,$translate,'Refund Request') }} </a>
                    </li>
                    @endif
                    @endif
                    @if(in_array('rating-reviews',$avilable))
                    <li>
                        <a href="{{ url('/admin/rating') }}"> <i class="menu-icon fa fa-star"></i>{{ Helper::translation(5088,$translate,'Rating & Reviews') }}</a>
                    </li>
                    @endif
                    @if($allsettings->site_withdrawal_display == 1)
                    @if(in_array('withdrawal',$avilable))
                    <li>
                        <a href="{{ url('/admin/withdrawal') }}"> <i class="menu-icon fa fa-money"></i>{{ Helper::translation(5091,$translate,'Withdrawal Request') }}</a>
                    </li>
                    @endif
                    @endif
                    <?php /*?>@if($allsettings->site_development_display == 1)                     
                    <li>
                        <a href="{{ url('/admin/development') }}"> <i class="menu-icon fa fa-image"></i>Development Logo </a>
                    </li>
                    @endif<?php */?>
                    @if($allsettings->site_blog_display == 1)
                    @if(in_array('blog',$avilable))  
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-comments-o"></i>{{ Helper::translation(3867,$translate,'Blog') }}</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-comments-o"></i><a href="{{ url('/admin/blog-category') }}">{{ Helper::translation(4200,$translate,'Category') }}</a></li>
                            <li><i class="menu-icon fa fa-comments-o"></i><a href="{{ url('/admin/post') }}">{{ Helper::translation(5094,$translate,'Post') }}</a></li>
                        </ul>
                    </li>
                    @endif
                    @endif
                    @if($allsettings->google_ads == 1)
                    @if(in_array('ads',$avilable)) 
                    <li>
                        <a href="{{ url('/admin/ads') }}"> <i class="menu-icon fa fa-file-image-o"></i>{{ Helper::translation(4728,$translate,'Ads') }} </a>
                    </li>
                    @endif
                    @endif
                    @if(in_array('pages',$avilable)) 
                    <li>
                        <a href="{{ url('/admin/pages') }}"> <i class="menu-icon fa fa-file-text-o"></i>{{ Helper::translation(4125,$translate,'Pages') }} </a>
                    </li>
                    @endif
                    @if(in_array('contact',$avilable))
                    <li>
                        <a href="{{ url('/admin/contact') }}"> <i class="menu-icon fa fa-address-book-o"></i>{{ Helper::translation(3999,$translate,'Contact') }} </a>
                    </li>
                    @endif
                    @if(in_array('newsletter',$avilable))
                    <li>
                        <a href="{{ url('/admin/newsletter') }}"> <i class="menu-icon fa fa-newspaper-o"></i>{{ Helper::translation(5097,$translate,'Newsletter') }} </a>
                    </li>
                    @endif
                    @if(in_array('clear-cache',$avilable))
                    <li>
                        <a href="{{ url('/admin/clear-cache') }}" onClick="return confirm('{{ Helper::translation('61efd92f26dcb',$translate,'Are you sure you want to clear cache') }}?');"> <i class="menu-icon fa fa-trash"></i>{{ Helper::translation('61efd77eb4f5a',$translate,'Clear Cache') }} </a>
                    </li>
                    @endif
                    @if($allsettings->site_google_translate == 1)
                    @if(in_array('languages',$avilable))
                    <li>
                        <a href="{{ url('/admin/languages') }}"> <i class="menu-icon fa fa-language"></i>{{ Helper::translation(4977,$translate,'Languages') }} </a>
                    </li>
                    @endif
                    @endif
                  </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>