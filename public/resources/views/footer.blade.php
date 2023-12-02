@if ($message = Session::get('success'))
<div class="toast-container toast-top-center">
      <div class="toast mb-3" id="cart-toast-success" data-delay="5000" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-success text-white"><i class="dwg-check-circle mr-2"></i>
          <h6 class="font-size-sm text-white mb-0 mr-auto">{{ Helper::translation(4053,$translate,'') }}!</h6>
          <button class="close text-white ml-2 mb-1" type="button" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="toast-body">{{ $message }}</div>
      </div>
    </div>
@endif 
@if ($message = Session::get('error'))
<div class="toast-container toast-top-center">
      <div class="toast mb-3" id="cart-toast-error" data-delay="5000" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-danger text-white"><i class="dwg-close-circle mr-2"></i>
          <h6 class="font-size-sm text-white mb-0 mr-auto">{{ Helper::translation(4056,$translate,'') }}!</h6>
          <button class="close text-white ml-2 mb-1" type="button" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="toast-body text-danger">{{ $message }}</div>
      </div>
    </div>
@endif
@if (!$errors->isEmpty())
<div class="toast-container toast-top-center">
      <div class="toast mb-3" id="cart-toast-error" data-delay="5000" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-danger text-white"><i class="dwg-close-circle mr-2"></i>
          <h6 class="font-size-sm text-white mb-0 mr-auto">{{ Helper::translation(4056,$translate,'') }}!</h6>
          <button class="close text-white ml-2 mb-1" type="button" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        @foreach ($errors->all() as $error)
        <div class="toast-body text-danger">
        {{ $error }}
        </div>
        @endforeach
      </div>
    </div>
@endif
<footer class="bg-dark pt-5">
      <div class="container pt-2 pb-3">
        <div class="row">
          <div @if($allsettings->site_newsletter_display == 1) class="col-md-4 text-center text-md-left mb-4" @else class="col-md-6 text-center text-md-left mb-4" @endif>
            <div class="text-nowrap mb-3">
            <a class="d-inline-block align-middle mt-n2 mr-2" href="{{ URL::to('/') }}">
            @if($allsettings->site_logo != '')
            <img class="d-block" width="180" src="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_logo }}" alt="{{ $allsettings->site_title }}"/>
            @endif
            </a>
            </div>
            <h6 class="pr-3 mr-3"><span class="text-primary">{{ $count_sold }} </span><span class="font-weight-normal text-white">{{ Helper::translation(4059,$translate,'') }}</span></h6>
            <h6 class="mr-3"><span class="text-primary">{{ $total_customer }} </span><span class="font-weight-normal text-white">{{ Helper::translation(4062,$translate,'') }}</span></h6>
            <div class="widget mt-4 text-md-nowrap text-center text-md-left">
            @if($allsettings->facebook_url != '')
            <a class="social-btn sb-light sb-facebook mr-2 mb-2" href="{{ $allsettings->facebook_url }}" target="_blank"><i class="dwg-facebook"></i></a>
            @endif
            @if($allsettings->twitter_url != '')
            <a class="social-btn sb-light sb-twitter mr-2 mb-2" href="{{ $allsettings->twitter_url }}" target="_blank"><i class="dwg-twitter"></i></a>
            @endif
            @if($allsettings->pinterest_url != '')
            <a class="social-btn sb-light sb-pinterest mr-2 mb-2" href="{{ $allsettings->pinterest_url }}" target="_blank"><i class="dwg-pinterest"></i></a>
            @endif
            @if($allsettings->gplus_url != '')
            <a class="social-btn sb-light sb-dribbble mr-2 mb-2" href="{{ $allsettings->gplus_url }}" target="_blank"><i class="dwg-google"></i></a>
            @endif
            @if($allsettings->instagram_url != '')
            <a class="social-btn sb-light sb-behance mr-2 mb-2" href="{{ $allsettings->instagram_url }}" target="_blank"><i class="dwg-instagram"></i></a>
            @endif
            </div>
          </div>
          <!-- Mobile dropdown menu -->
          <div class="col-12 d-md-none text-center mb-4 pb-2">
            <div class="btn-group dropdown d-block mx-auto mb-3">
              <button class="btn btn-outline-light border-light dropdown-toggle" type="button" data-toggle="dropdown">{{ Helper::translation(3870,$translate,'') }}</button>
              <ul class="dropdown-menu">
                @foreach($footer_menu['category'] as $menu)
                <li><a class="dropdown-item" href="{{ URL::to('/shop/category') }}/{{ $menu->category_slug }}">{{ $menu->category_name }}</a></li> 
                @endforeach
              </ul>
            </div>
            <div class="btn-group dropdown d-block mx-auto">
              <button class="btn btn-outline-light border-light dropdown-toggle" type="button" data-toggle="dropdown">{{ Helper::translation(4065,$translate,'') }}</button>
              <ul class="dropdown-menu">
                @if($allsettings->site_blog_display == 1)
                <li><a class="dropdown-item" href="{{ URL::to('/blog') }}">{{ Helper::translation(3867,$translate,'') }}</a></li>
                @endif
                <li><a class="dropdown-item" href="{{ URL::to('/shop') }}">{{ Helper::translation(4068,$translate,'') }}</a></li>
                <li><a class="dropdown-item" href="{{ URL::to('/my-favourite') }}">{{ Helper::translation(4038,$translate,'') }}</a></li>
                <li><a class="dropdown-item" href="{{ URL::to('/my-purchases') }}">{{ Helper::translation(4035,$translate,'') }}</a></li>
                <li><a class="dropdown-item" href="{{ URL::to('/contact') }}">{{ Helper::translation(3999,$translate,'') }}</a></li>
              </ul>
            </div>
          </div>
          <!-- Desktop menu -->
          <div @if($allsettings->site_newsletter_display == 1) class="col-md-2 d-none d-md-block text-center text-md-left mb-4" @else class="col-md-3 d-none d-md-block text-center text-md-left mb-4" @endif>
            <div class="widget widget-links widget-light pb-2">
              <h3 class="widget-title text-light">{{ Helper::translation(3870,$translate,'') }}</h3>
              <ul class="widget-list">
                @foreach($footer_menu['category'] as $menu)
                <li class="widget-list-item"><a class="widget-list-link" href="{{ URL::to('/shop/category') }}/{{ $menu->category_slug }}">{{ $menu->category_name }}</a></li> 
                @endforeach
              </ul>
            </div>
          </div>
          <div @if($allsettings->site_newsletter_display == 1) class="col-md-2 d-none d-md-block text-center text-md-left mb-4" @else class="col-md-3 d-none d-md-block text-center text-md-left mb-4" @endif>
            <div class="widget widget-links widget-light pb-2">
              <h3 class="widget-title text-light">{{ Helper::translation(4065,$translate,'') }}</h3>
              <ul class="widget-list">
                @if($allsettings->site_blog_display == 1)
                <li class="widget-list-item"><a class="widget-list-link" href="{{ URL::to('/blog') }}">{{ Helper::translation(3867,$translate,'') }}</a></li>
                @endif
                <li class="widget-list-item"><a class="widget-list-link" href="{{ URL::to('/shop') }}">{{ Helper::translation(4068,$translate,'') }}</a></li>
                <li class="widget-list-item"><a class="widget-list-link" href="{{ URL::to('/my-favourite') }}">{{ Helper::translation(4038,$translate,'') }}</a></li>
                <li class="widget-list-item"><a class="widget-list-link" href="{{ URL::to('/my-purchases') }}">{{ Helper::translation(4035,$translate,'') }}</a></li>
                <li class="widget-list-item"><a class="widget-list-link" href="{{ URL::to('/contact') }}">{{ Helper::translation(3999,$translate,'') }}</a></li>
              </ul>
              </div>
          </div>
          @if($allsettings->site_newsletter_display == 1)
          <div class="col-md-4">
            <div class="widget pb-2 mb-4">
              <h3 class="widget-title text-light pb-1">{{ Helper::translation(5097,$translate,'') }}</h3>
              <form class="validate" action="{{ route('newsletter') }}" method="post" name="mc-embedded-subscribe-form" id="footer_form" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="input-group input-group-overlay flex-nowrap">
                  <div class="input-group-prepend-overlay"><span class="input-group-text text-muted font-size-base"><i class="dwg-mail"></i></span></div>
                  <input class="form-control prepended-form-control" type="email" id="mce-EMAIL" value="" placeholder="{{ Helper::translation(4077,$translate,'') }}" data-bvalidator="required" name="news_email">
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="submit" name="subscribe" id="mc-embedded-subscribe">{{ Helper::translation('61ee972444aa2',$translate,'Subscribe') }}</button>
                  </div>
                </div>
                <small class="form-text text-light opacity-50" id="mc-helper">{{ Helper::translation('61ee97a37997e',$translate,'Want more script,themes & templates? Subscribe to our mailing list to receive an update when new items arrive!') }}</small>
                <div class="subscribe-status"></div>
              </form>
            </div>
          </div>
          @endif
        </div>
      </div>
      <div class="pt-4 bg-darker">
        <div class="container">
          <div class="d-md-flex justify-content-between">
            <div class="pb-4 font-size-xs text-light opacity-50 text-center text-md-left">@php echo html_entity_decode($allsettings->site_copyright); @endphp {{ $allsettings->site_title }}</div>
            <div class="widget widget-links widget-light pb-4">
              <ul class="widget-list d-flex flex-wrap justify-content-center justify-content-md-start">
              @foreach($footerpages['pages'] as $pages)
                <li class="widget-list-item ml-4"><a class="widget-list-link font-size-ms" href="{{ URL::to('/') }}/{{ $pages->page_slug }}">{{ $pages->page_title }}</a></li>
              @endforeach  
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>
    @if($allsettings->cookie_popup == 1)
    <div class="alert text-center cookiealert" role="alert">
        {{ $allsettings->cookie_popup_text }}
        <button type="button" class="btn btn-primary btn-sm acceptcookies" aria-label="Close">
            {{ $allsettings->cookie_popup_button }}
        </button>
    </div>
    @endif
    <a class="btn-scroll-top" href="#top" data-scroll><span class="btn-scroll-top-tooltip text-muted font-size-sm mr-2">{{ Helper::translation(4071,$translate,'') }}</span><i class="btn-scroll-top-icon dwg-arrow-up"></i></a>