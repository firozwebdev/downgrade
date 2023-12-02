<!DOCTYPE HTML>
<html lang="en">
<head>
<title>{{ Helper::translation(3924,$translate,'') }} - {{ $allsettings->site_title }}</title>
@include('meta')
@include('style')
</head>
<body>
@include('header')
<div class="page-title-overlap pt-4" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}');">
      <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
              <li class="breadcrumb-item"><a class="text-nowrap" href="{{ URL::to('/') }}"><i class="dwg-home"></i>{{ Helper::translation(3849,$translate,'') }}</a></li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page">{{ Helper::translation(3924,$translate,'') }}</li>
              </li>
             </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 mb-0 text-white">{{ Helper::translation(3924,$translate,'') }}</h1>
        </div>
      </div>
    </div>
<div class="container mb-5 pb-3">
      <div class="bg-light box-shadow-lg rounded-lg overflow-hidden">
        <div class="row">
          <!-- Content-->
          <section class="col-lg-8 pt-2 pt-lg-4 pb-4 mb-3">
          <form action="{{ route('checkout') }}" class="needs-validation" id="checkout_form" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="pt-2 px-4 pr-lg-0 pl-xl-5">
              <!-- Title-->
              @if(Auth::guest())
              <h2 class="h6 border-bottom pb-3 mb-3">{{ Helper::translation('630a03dfcef28',$translate,'Not a customer yet?') }}</h2>
              <!-- Billing detail-->
              <div class="row pb-4">
                <div class="col-6 form-group">
                  <label for="mc-email">{{ Helper::translation(3936,$translate,'') }}  <span class='text-danger'>*</span></label>
                  <input type="text" id="email" class="form-control" name="email" data-bvalidator="required,email">
                </div>
                <div class="col-sm-6 form-group">
                  <label for="mc-company">{{ Helper::translation(4275,$translate,'') }} <span class='text-danger'>*</span></label>
                  <input type="text" id="password" class="form-control" name="password" data-bvalidator="required,minlen[6]">
                </div>
              </div>
              @endif
              @if (Auth::check())
              <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
              @endif
              <div class="widget mb-3 d-lg-none">
                <h2 class="widget-title">{{ Helper::translation(3957,$translate,'') }}</h2>
                @php 
                 $subtotal = 0;
                 $order_id = '';
                 $product_price = '';
                 $product_userid = ''; 
                 @endphp
                 @foreach($cart['item'] as $cart)
                <div class="media align-items-center pb-2 border-bottom">
                <a class="d-block mr-2" href="{{ url('/item') }}/{{ $cart->product_slug }}">
                @if($cart->product_image!='')
                <img class="rounded-sm" width="64" src="{{ url('/') }}/public/storage/product/{{ $cart->product_image }}" alt="{{ $cart->product_name }}"/>
                @else
                <img class="rounded-sm" width="64" src="{{ url('/') }}/public/img/no-image.png" alt="{{ $cart->product_name }}"/>
                @endif
                </a>
                  <div class="media-body pl-1">
                    <h6 class="widget-product-title"><a href="{{ url('/item') }}/{{ $cart->product_slug }}">{{ $cart->product_name }}</a></h6>
                    <div class="widget-product-meta"><span class="text-accent border-right pr-2 mr-2">{{ $allsettings->site_currency_symbol }} {{ $cart->product_price }}</span><span class="font-size-xs text-muted">{{ $cart->license }}@if($cart->license == 'regular') ({{ __('6 months') }}) @elseif($cart->license == 'extended') ({{ __('12 months') }}) @endif</span></div>
                  </div>
                </div>
                @php 
                $subtotal += $cart->product_price;
                $order_id .= $cart->ord_id.',';
                $product_price .= $cart->product_price.','; 
                $product_userid .= $cart->product_user_id.','; 
                @endphp
                @endforeach
                <ul class="list-unstyled font-size-sm py-3">
                  <li class="d-flex justify-content-between align-items-center"><span class="mr-2">{{ Helper::translation(3960,$translate,'') }}</span><span class="text-right">{{ $allsettings->site_currency_symbol }} {{ $subtotal }}</span></li>
                  @if($allsettings->site_extra_fee != 0)
                  <li class="d-flex justify-content-between align-items-center"><span class="mr-2">{{ Helper::translation(3909,$translate,'') }}</span><span class="text-right">{{ $allsettings->site_currency_symbol }} {{ $allsettings->site_extra_fee }}</span></li>
                  @endif
                  <li class="d-flex justify-content-between align-items-center font-size-base"><span class="mr-2">{{ Helper::translation(3963,$translate,'') }}</span><span class="text-right">{{ $allsettings->site_currency_symbol }} {{ $subtotal+$allsettings->site_extra_fee }}</span></li>
                </ul>
              </div>
              <div class="accordion mb-2" id="payment-method" role="tablist">
                @php $no = 1; @endphp
                @foreach($get_payment as $payment)
                <div class="card">
                  <div class="card-header" role="tab">
                    <h3 class="accordion-heading"><a href="#{{ $payment }}" id="{{ $payment }}" data-toggle="collapse">{{ Helper::translation(3966,$translate,'') }} {{ $payment }}<span class="accordion-indicator"><i data-feather="chevron-up"></i></span></a></h3>
                  </div>
                  <div class="collapse @if($no == 1) show @endif" id="{{ $payment }}" data-parent="#payment-method" role="tabpanel">
                  @if($payment == 'stripe')
                    <div class="card-body font-size-sm custom-radio custom-control">
                      <p><span class='font-weight-medium'><input id="opt1-{{ $payment }}" name="payment_method" type="radio" class="custom_radio"  value="{{ $payment }}" @if($no == 1) checked @endif data-bvalidator="required"> {{ __('Stripe') }}</span> - {{ Helper::translation(3969,$translate,'') }}</p>
                      <div class="stripebox mb-3" id="ifYes" style="display:none;">
                        <label for="card-element">{{ Helper::translation(3969,$translate,'') }}</label>
                        <div id="card-element"></div>
                        <div id="card-errors" role="alert"></div>
                      </div>
                      <button class="btn btn-primary" type="submit">{{ Helper::translation(3972,$translate,'') }}</button>
                    </div> 
                    @endif
                    @if($payment == 'paypal')
                    <div class="card-body font-size-sm custom-control custom-radio">
                      <p><span class='font-weight-medium'><input id="opt1-{{ $payment }}" name="payment_method" type="radio" class="custom_radio" value="{{ $payment }}" @if($no == 1) checked @endif data-bvalidator="required"> {{ __('PayPal') }}</span> - {{ __('the safer, easier way to pay') }}</p>
                      <button class="btn btn-primary" type="submit">{{ Helper::translation(3975,$translate,'') }}</button>
                    </div>
                    @endif
                    @if($payment == 'paystack')
                    <div class="card-body font-size-sm custom-control custom-radio">
                      <p><span class='font-weight-medium'><input id="opt1-{{ $payment }}" name="payment_method" type="radio" class="custom_radio" value="{{ $payment }}" @if($no == 1) checked @endif data-bvalidator="required"> {{ __('PayStack') }}</span></p>
                      <button class="btn btn-primary" type="submit">{{ Helper::translation(3978,$translate,'') }}</button>
                    </div>
                    @endif
                    @if($payment == 'razorpay')
                    <div class="card-body font-size-sm custom-control custom-radio">
                      <p><span class='font-weight-medium'><input id="opt1-{{ $payment }}" name="payment_method" type="radio" class="custom_radio" value="{{ $payment }}" @if($no == 1) checked @endif data-bvalidator="required"> {{ __('Razorpay') }}</span></p>
                      <button class="btn btn-primary" type="submit">{{ Helper::translation(3981,$translate,'') }}</button>
                    </div>
                    @endif
                    @if($payment == 'coingate')
                    <div class="card-body font-size-sm custom-control custom-radio">
                      <p><span class='font-weight-medium'><input id="opt1-{{ $payment }}" name="payment_method" type="radio" class="custom_radio" value="{{ $payment }}" @if($no == 1) checked @endif data-bvalidator="required"> {{ __('Coingate') }}</span></p>
                      <button class="btn btn-primary" type="submit">{{ Helper::translation('62629a340b71b',$translate,'Checkout with Coingate') }}</button>
                    </div>
                    @endif
                    @if($payment == 'coinpayments')
                    <div class="card-body font-size-sm custom-control custom-radio">
                      <p><span class='font-weight-medium'><input id="opt1-{{ $payment }}" name="payment_method" type="radio" class="custom_radio" value="{{ $payment }}" data-bvalidator="required"> {{ Helper::translation('62627ead3d090',$translate,'CoinPayments') }}</span></p>
                      <button class="btn btn-primary" type="submit">{{ Helper::translation('62629a2a568bc',$translate,'Checkout with CoinPayments') }}</button>
                    </div>
                    @endif
                    @if($payment == 'payhere')
                    <div class="card-body font-size-sm custom-control custom-radio">
                      <p><span class='font-weight-medium'><input id="opt1-{{ $payment }}" name="payment_method" type="radio" class="custom_radio" value="{{ $payment }}" data-bvalidator="required"> {{ Helper::translation('630dfbe4f2f2d',$translate,'PayHere') }}</span></p>
                      <button class="btn btn-primary" type="submit">{{ Helper::translation('630dfbf90f053',$translate,'Checkout with PayHere') }}</button>
                    </div>
                    @endif
                    @if($payment == 'payfast')
                    <div class="card-body font-size-sm custom-control custom-radio">
                      <p><span class='font-weight-medium'><input id="opt1-{{ $payment }}" name="payment_method" type="radio" class="custom_radio" value="{{ $payment }}" data-bvalidator="required"> {{ Helper::translation('630dfc4162f19',$translate,'PayFast') }}</span></p>
                      <button class="btn btn-primary" type="submit">{{ Helper::translation('630dfc586cf51',$translate,'Checkout with PayFast') }}</button>
                    </div>
                    @endif
                    @if($payment == 'flutterwave')
                    <div class="card-body font-size-sm custom-control custom-radio">
                      <p><span class='font-weight-medium'><input id="opt1-{{ $payment }}" name="payment_method" type="radio" class="custom_radio" value="{{ $payment }}" data-bvalidator="required"> {{ Helper::translation('630dfc6ae0d42',$translate,'Flutterwave') }}</span></p>
                      <button class="btn btn-primary" type="submit">{{ Helper::translation('630dfc66a5395',$translate,'Checkout with Flutterwave') }}</button>
                    </div>
                    @endif
                  </div>
                </div>
                @php $no++; @endphp
                @endforeach
              </div>
            </div>
            <input type="hidden" name="order_id" value="{{ rtrim($order_id,',') }}">
            <input type="hidden" name="product_prices" value="{{ base64_encode(rtrim($product_price,',')) }}">
            <input type="hidden" name="product_user_id" value="{{ rtrim($product_userid,',') }}">
            <input type="hidden" name="amount" value="{{ base64_encode($subtotal) }}">
            <input type="hidden" name="processing_fee" value="{{ base64_encode($allsettings->site_extra_fee) }}">
            <input type="hidden" name="website_url" value="{{ url('/') }}">
            <input type="hidden" name="token" class="token">
            </form>
          </section>
          <aside class="col-lg-4 d-none d-lg-block">
            <hr class="d-lg-none">
            <div class="cz-sidebar-static h-100 ml-auto border-left">
              <div class="widget mb-3">
                <h2 class="widget-title text-center">{{ Helper::translation(3957,$translate,'') }}</h2>
                @php 
                 $subtotal = 0;
                 $order_id = '';
                 $product_price = '';
                 $product_userid = ''; 
                 @endphp
                 @foreach($cart_mobile['item'] as $cart)
                <div class="media align-items-center pb-3 mb-3 border-bottom">
                <a class="d-block mr-2" href="{{ url('/item') }}/{{ $cart->product_slug }}">
                @if($cart->product_image!='')
                <img class="rounded-sm" width="64" src="{{ url('/') }}/public/storage/product/{{ $cart->product_image }}" alt="{{ $cart->product_name }}"/>
                @else
                <img class="rounded-sm" width="64" src="{{ url('/') }}/public/img/no-image.png" alt="{{ $cart->product_name }}"/>
                @endif
                </a>
                  <div class="media-body pl-1">
                    <h6 class="widget-product-title"><a href="{{ url('/item') }}/{{ $cart->product_slug }}">{{ $cart->product_name }}</a></h6>
                    <div class="widget-product-meta"><span class="text-accent border-right pr-2 mr-2">{{ $allsettings->site_currency_symbol }} {{ $cart->product_price }}</span><span class="font-size-xs text-muted">{{ $cart->license }}@if($cart->license == 'regular') ({{ __('6 months') }}) @elseif($cart->license == 'extended') ({{ __('12 months') }}) @endif</span></div>
                  </div>
                </div>
                @php 
                $subtotal += $cart->product_price;
                $order_id .= $cart->ord_id.',';
                $product_price .= $cart->product_price.','; 
                $product_userid .= $cart->product_user_id.','; 
                @endphp
                @endforeach
                <ul class="list-unstyled font-size-sm pt-3 pb-2 border-bottom">
                  <li class="d-flex justify-content-between align-items-center"><span class="mr-2">{{ Helper::translation(3960,$translate,'') }}</span><span class="text-right">{{ $allsettings->site_currency_symbol }} {{ $subtotal }}</span></li>
                  @if($allsettings->site_extra_fee != 0)
                  <li class="d-flex justify-content-between align-items-center"><span class="mr-2">{{ Helper::translation(3909,$translate,'') }}</span><span class="text-right">{{ $allsettings->site_currency_symbol }} {{ $allsettings->site_extra_fee }}</span></li>
                  @endif
                </ul>
                <h3 class="font-weight-normal text-center my-4">{{ $allsettings->site_currency_symbol }} {{ $subtotal+$allsettings->site_extra_fee }}</h3>
              </div>
            </div>
          </aside>
        </div>
      </div>
    </div>
@include('footer')
@include('script')
</body>
</html>