<!DOCTYPE HTML>
<html lang="en">
<head>
<title>{{ $allsettings->site_title }} - {{ Helper::translation('63899d40518a0',$translate,'Subscription Upgrade') }}</title>
@include('meta')
@include('style')
</head>
<body>
@include('header')
<section class="bg-position-center-top" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}');">
      <div class="py-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
              <li class="breadcrumb-item"><a class="text-nowrap" href="{{ URL::to('/') }}"><i class="dwg-home"></i>{{ Helper::translation(3849,$translate,'') }}</a></li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page">{{ Helper::translation('63899d40518a0',$translate,'Subscription Upgrade') }}</li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 mb-0 text-white">{{ Helper::translation('63899d40518a0',$translate,'Subscription Upgrade') }}</h1>
        </div>
      </div>
      </div>
    </section>
<div class="faq-section section-padding subscribe-details" data-aos="fade-up" data-aos-delay="200">
		<div class="container py-5 mt-md-2 mb-2">
            <div class="row">
         <div class="col-sm-6 col-md-5 col-lg-5 subscribe-details">
            <div>
            <form action="{{ route('subscription-coupon') }}" class="setting_form" id="coupon_form" method="post" enctype="multipart/form-data">
              {{ csrf_field() }} 
              <div class="mb-4 pb-3 border-bottom">
                <h2 class="h6 mb-3 pb-1">{{ __('Coupon Code') }}</h2>
                  <div class="form-group">
                    <input class="form-control" type="text" placeholder="{{ __('Coupon Code') }}" id="coupon" name="coupon" required>
                    <input type="hidden" name="id" value="{{ $id }}">
                  </div>
                  <button class="text-center  btn btn-secondary btn-block" type="submit">{{ __('Apply Coupon') }}</button>
              </div>
             </form>
             </div>
            <div class="mb-3">
                <h4 class="mb-3">{{ Helper::translation('63899ddb5ea6f',$translate,'Subscription Details') }}</h4>
                <div class="card-body carder couprices">
                    <p><label>{{ Helper::translation('63899e4438444',$translate,'Subscription Name') }} :</label> {{ $subscr['view']->subscr_name }}</p>
                    <p><label>{{ Helper::translation(4290,$translate,'') }} :</label> 
                    @if($user_details->user_coupon_id != "")<del>{{ $allsettings->site_currency_symbol }}{{ $subscr['view']->subscr_price }}</del> {{ $allsettings->site_currency_symbol }}{{ $user_details->user_discount_price }} @else{{ $allsettings->site_currency_symbol }}{{ $subscr['view']->subscr_price }}@endif</p>
                    @if($user_details->user_coupon_id != "")
                    <p><label>{{ Helper::translation('64009368a909e',$translate,'Coupon Code') }} :</label> <span class="green">{{ $user_details->user_coupon_code }}</span> <a href="{{ URL::to('/remove-subscription/') }}/{{ base64_encode($user_details->id) }}" class="red fs14" onClick="return confirm('Are you sure you want to delete?');" title="{{ Helper::translation('6401e41e02dc6',$translate,'Remove') }}"> <i class="dwg-close font-size-xs"></i> </a></p>
                    @endif
                    <p><label>{{ Helper::translation('63885c11c0675',$translate,'Duration') }} :</label> @if($subscr['view']->subscr_duration == '1000 Year'){{ Helper::translation('639192602d89b',$translate,'Life Time') }}@else{{ $subscr['view']->subscr_duration }}@endif</p>
                    @if($subscr['view']->subscr_item_level == 'limited')
                    <p><label>{{ Helper::translation('63899ed401e84',$translate,'No of Products') }} :</label> {{ $subscr['view']->subscr_item }} {{ Helper::translation(4974,$translate,'') }}</p>
                    @else
                    <p><label>{{ Helper::translation('63899ed401e84',$translate,'No of Products') }} :</label> {{ Helper::translation('63899f3249e8e',$translate,'Unlimited') }}</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-7 col-lg-7">
        <form action="{{ route('confirm-subscription') }}" class="needs-validation" id="checkout_form" method="post" enctype="multipart/form-data">
             {{ csrf_field() }}
            <div class="pt-2 px-4 pr-lg-0 pl-xl-5">
              <!-- Title-->
              <h2 class="h6 border-bottom pb-3 mb-3">{{ Helper::translation('63899f6edfe00',$translate,'Select Payment Method') }}</h2>
              <div class="accordion mb-2" id="payment-method" role="tablist">
                @php $no = 1; @endphp
                @foreach($get_payment as $payment)
                <div class="card">
                  <div class="card-header" role="tab">
                    <h3 class="accordion-heading"><a href="#{{ $payment }}" id="{{ $payment }}" data-toggle="collapse">{{ Helper::translation(3966,$translate,'') }} {{ $payment }}<span class="accordion-indicator"><i data-feather="chevron-up"></i></span></a></h3>
                  </div>
                  <div class="collapse @if($no == 1) show @endif" id="{{ $payment }}" data-parent="#payment-method" role="tabpanel">
                  @if($payment == 'stripe')
                    <div class="card-body custompads font-size-sm custom-radio custom-control">
                      <p><span class='font-weight-medium'><input id="opt1-{{ $payment }}" name="payment_method" type="radio" class="custom_radio"  value="{{ $payment }}" @if($no == 1) checked @endif data-bvalidator="required"> {{ __('Stripe') }}</span> - {{ Helper::translation(3969,$translate,'') }}</p>
                      <div class="stripebox mb-3" id="ifYes" style="display:none;">
                        <label for="card-element">{{ Helper::translation(3969,$translate,'') }}</label>
                        <div id="card-element"></div>
                        <div id="card-errors" role="alert"></div>
                      </div>
                      <button class="btn btn-primary" type="submit">{{ Helper::translation('6438cca33e3a2',$translate,'Pay with Stripe') }}</button>
                    </div> 
                    @endif
                    @if($payment == 'paypal')
                    <div class="card-body custompads font-size-sm custom-control custom-radio">
                      <p><span class='font-weight-medium'><input id="opt1-{{ $payment }}" name="payment_method" type="radio" class="custom_radio" value="{{ $payment }}" @if($no == 1) checked @endif data-bvalidator="required"> {{ __('PayPal') }}</span> - {{ __('the safer, easier way to pay') }}</p>
                      <button class="btn btn-primary" type="submit">{{ Helper::translation('6438cbf3d191e',$translate,'Pay with Paypal') }}</button>
                    </div>
                    @endif
                    @if (Auth::check())
                    @if($payment == 'wallet')
                    <div class="card-body custompads font-size-sm custom-control custom-radio">
                      <p><span class='font-weight-medium'><input id="opt1-{{ $payment }}" name="payment_method" type="radio" class="custom_radio" value="{{ $payment }}" @if($no == 1) checked @endif data-bvalidator="required"> {{ __('Wallet') }}</span> - ({{ $allsettings->site_currency_symbol }}{{ Auth::user()->earnings }})</p>
                      <button class="btn btn-primary" type="submit">{{ Helper::translation('6438cc0b121ea',$translate,'Pay with Wallet') }}</button>
                    </div>
                    @endif
                    @endif
                    @if($payment == 'paystack')
                    <div class="card-body custompads font-size-sm custom-control custom-radio">
                      <p><span class='font-weight-medium'><input id="opt1-{{ $payment }}" name="payment_method" type="radio" class="custom_radio" value="{{ $payment }}" @if($no == 1) checked @endif data-bvalidator="required"> {{ __('PayStack') }}</span></p>
                      <button class="btn btn-primary" type="submit">{{ Helper::translation('6438cc200a7d8',$translate,'Pay with PayStack') }}</button>
                    </div>
                    @endif
                    @if($payment == 'localbank')
                    <div class="card-body custompads font-size-sm custom-control custom-radio">
                      <p><span class='font-weight-medium'><input id="opt1-{{ $payment }}" name="payment_method" type="radio" class="custom_radio" value="{{ $payment }}" @if($no == 1) checked @endif data-bvalidator="required"> {{ __('Local Bank') }}</span></p>
                      <button class="btn btn-primary" type="submit">{{ Helper::translation('6438cc302662a',$translate,'Pay with Local Bank') }}</button>
                    </div>
                    @endif
                    @if($payment == 'razorpay')
                    <div class="card-body custompads font-size-sm custom-control custom-radio">
                      <p><span class='font-weight-medium'><input id="opt1-{{ $payment }}" name="payment_method" type="radio" class="custom_radio" value="{{ $payment }}" @if($no == 1) checked @endif data-bvalidator="required"> {{ __('Razorpay') }}</span></p>
                      <button class="btn btn-primary" type="submit">{{ Helper::translation('6438cc45433be',$translate,'Pay with Razorpay') }}</button>
                    </div>
                    @endif
                    @if($payment == 'coingate')
                    <div class="card-body custompads font-size-sm custom-control custom-radio">
                      <p><span class='font-weight-medium'><input id="opt1-{{ $payment }}" name="payment_method" type="radio" class="custom_radio" value="{{ $payment }}" @if($no == 1) checked @endif data-bvalidator="required"> {{ __('Coingate') }}</span></p>
                      <button class="btn btn-primary" type="submit">{{ Helper::translation('6438cc86d7c4d',$translate,'Pay with Coingate') }}</button>
                    </div>
                    @endif
                    @if($payment == 'coinpayments')
                    <div class="card-body custompads font-size-sm custom-control custom-radio">
                      <p><span class='font-weight-medium'><input id="opt1-{{ $payment }}" name="payment_method" type="radio" class="custom_radio" value="{{ $payment }}" data-bvalidator="required"> {{ Helper::translation('62627ead3d090',$translate,'CoinPayments') }}</span></p>
                      <button class="btn btn-primary" type="submit">{{ Helper::translation('6438cc8cdc898',$translate,'Pay with Coinpayments') }}</button>
                    </div>
                    @endif
                    @if($payment == 'payhere')
                    <div class="card-body custompads font-size-sm custom-control custom-radio">
                      <p><span class='font-weight-medium'><input id="opt1-{{ $payment }}" name="payment_method" type="radio" class="custom_radio" value="{{ $payment }}" data-bvalidator="required"> {{ Helper::translation('630dfbe4f2f2d',$translate,'PayHere') }}</span></p>
                      <button class="btn btn-primary" type="submit">{{ Helper::translation('6438cc9260cc4',$translate,'Pay with PayHere') }}</button>
                    </div>
                    @endif
                    @if($payment == 'payfast')
                    <div class="card-body custompads font-size-sm custom-control custom-radio">
                      <p><span class='font-weight-medium'><input id="opt1-{{ $payment }}" name="payment_method" type="radio" class="custom_radio" value="{{ $payment }}" data-bvalidator="required"> {{ Helper::translation('630dfc4162f19',$translate,'PayFast') }}</span></p>
                      <button class="btn btn-primary" type="submit">{{ Helper::translation('6438cc980a037',$translate,'Pay with PayFast') }}</button>
                    </div>
                    @endif
                    @if($payment == 'flutterwave')
                    <div class="card-body custompads font-size-sm custom-control custom-radio">
                      <p><span class='font-weight-medium'><input id="opt1-{{ $payment }}" name="payment_method" type="radio" class="custom_radio" value="{{ $payment }}" data-bvalidator="required"> {{ Helper::translation('630dfc6ae0d42',$translate,'Flutterwave') }}</span></p>
                      <button class="btn btn-primary" type="submit">{{ Helper::translation('6438cc9de7fb3',$translate,'Pay with Flutterwave') }}</button>
                    </div>
                    @endif
                    @if($payment == 'mercadopago')
                    <div class="card-body custompads font-size-sm custom-control custom-radio">
                      <p><span class='font-weight-medium'><input id="opt1-{{ $payment }}" name="payment_method" type="radio" class="custom_radio" value="{{ $payment }}" data-bvalidator="required"> {{ Helper::translation('64bbc858d3b73',$translate,'Mercadopago') }}</span></p>
                      <button class="btn btn-primary" type="submit">{{ Helper::translation('64bf664a284af',$translate,'Pay with Mercadopago') }}</button>
                    </div>
                    @endif
                  </div>
                </div>
                @php $no++; @endphp
                @endforeach
              </div>
            </div>
            <input type="hidden" name="website_url" value="{{ url('/') }}">
            <input type="hidden" name="user_subscr_id" value="{{ $subscr['view']->subscr_id }}">
            <input type="hidden" name="user_subscr_type" value="{{ $subscr['view']->subscr_name }}">
            <input type="hidden" name="user_subscr_date" value="{{ $subscr['view']->subscr_duration }}">
            <input type="hidden" name="user_subscr_item_level" value="{{ $subscr['view']->subscr_item_level }}">
            <input type="hidden" name="user_subscr_item" value="{{ $subscr['view']->subscr_item }}">
            <input type="hidden" name="token" class="token">
            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}">
            </form>
              </div>
                </div>
            </div>
        </div>
        </div>
      </div>
	</div>
@include('footer')
@include('script')
<script src="https://js.stripe.com/v3/"></script>
<script>
/*$(function () {
'use strict';
$("#ifYes").hide();
        $("input[name='payment_method']").click(function () {
		
            
        });
    });*/
	
    $(document).ready(function(){
        'use strict';
		$("#ifYes").hide();
        $('#paypal').click(function(){
            var value = "paypal";
            $("input[name=payment_method][value=" + value + "]").prop('checked', true);
        });
		
		$('#stripe').click(function(){
            var value = "stripe";
            $("input[name=payment_method][value=" + value + "]").prop('checked', true);
			if ($("#opt1-stripe").is(":checked")) {
                $("#ifYes").show();
				
				/* stripe code */
				
				var stripe = Stripe('{{ $stripe_publish_key }}');
   
				var elements = stripe.elements();
					
				var style = {
				base: {
					color: '#32325d',
					lineHeight: '18px',
					fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
					fontSmoothing: 'antialiased',
					fontSize: '14px',
					'::placeholder': {
					color: '#aab7c4'
					}
				},
				invalid: {
					color: '#fa755a',
					iconColor: '#fa755a'
				}
				};
			 
				
				var card = elements.create('card', {style: style, hidePostalCode: true});
			 
				
				card.mount('#card-element');
			 
			   
				card.addEventListener('change', function(event) {
					var displayError = document.getElementById('card-errors');
					if (event.error) {
						displayError.textContent = event.error.message;
					} else {
						displayError.textContent = '';
					}
				});
			 
				
				var form = document.getElementById('checkout_form');
				form.addEventListener('submit', function(event) {
					/*event.preventDefault();*/
			        if ($("#opt1-stripe").is(":checked")) { event.preventDefault(); }
					stripe.createToken(card).then(function(result) {
					
						if (result.error) {
						
						var errorElement = document.getElementById('card-errors');
						errorElement.textContent = result.error.message;
						
						
						} else {
							
							document.querySelector('.token').value = result.token.id;
							 
							document.getElementById('checkout_form').submit();
						}
						/*document.querySelector('.token').value = result.token.id;
							 
							document.getElementById('checkout_form').submit();*/
						
					});
				});
							
						
			/* stripe code */	
				
				
				
            } else {
                $("#ifYes").hide();
            }
			
			
        });
		
		$('#wallet').click(function(){
            var value = "wallet";
            $("input[name=payment_method][value=" + value + "]").prop('checked', true);
        });
  
        $('#twocheckout').click(function(){
            var value = "twocheckout";
            $("input[name=payment_method][value=" + value + "]").prop('checked', true);
        });
		
		$('#paystack').click(function(){
            var value = "paystack";
            $("input[name=payment_method][value=" + value + "]").prop('checked', true);
        });
		
		$('#localbank').click(function(){
            var value = "localbank";
            $("input[name=payment_method][value=" + value + "]").prop('checked', true);
        });
		
		$('#razorpay').click(function(){
            var value = "razorpay";
            $("input[name=payment_method][value=" + value + "]").prop('checked', true);
        });
		
		$('#payhere').click(function(){
            var value = "payhere";
            $("input[name=payment_method][value=" + value + "]").prop('checked', true);
        });
		
		$('#payumoney').click(function(){
            var value = "payumoney";
            $("input[name=payment_method][value=" + value + "]").prop('checked', true);
        });
		
		$('#iyzico').click(function(){
            var value = "iyzico";
            $("input[name=payment_method][value=" + value + "]").prop('checked', true);
        });
		
		$('#flutterwave').click(function(){
            var value = "flutterwave";
            $("input[name=payment_method][value=" + value + "]").prop('checked', true);
        });
		
		$('#coingate').click(function(){
            var value = "coingate";
            $("input[name=payment_method][value=" + value + "]").prop('checked', true);
        });
		
		$('#ipay').click(function(){
            var value = "ipay";
            $("input[name=payment_method][value=" + value + "]").prop('checked', true);
        });
		
		$('#payfast').click(function(){
            var value = "payfast";
            $("input[name=payment_method][value=" + value + "]").prop('checked', true);
        });
		
		$('#coinpayments').click(function(){
            var value = "coinpayments";
            $("input[name=payment_method][value=" + value + "]").prop('checked', true);
        });
		
		$('#payhere').click(function(){
            var value = "payhere";
            $("input[name=payment_method][value=" + value + "]").prop('checked', true);
        });
		
		$('#payfast').click(function(){
            var value = "payfast";
            $("input[name=payment_method][value=" + value + "]").prop('checked', true);
        });
		
		$('#flutterwave').click(function(){
            var value = "flutterwave";
            $("input[name=payment_method][value=" + value + "]").prop('checked', true);
        });
		
		$('#mercadopago').click(function(){
            var value = "mercadopago";
            $("input[name=payment_method][value=" + value + "]").prop('checked', true);
        });
  
    });
</script>

</body>
</html>