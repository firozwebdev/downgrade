<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    
    @include('admin.stylesheet')
</head>

<body>
    
    @include('admin.navigation')

    <!-- Right Panel -->
    @if(in_array('orders',$avilable))
    <div id="right-panel" class="right-panel">

        
                       @include('admin.header')
                       

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>{{ Helper::translation(5112,$translate,'Order Details') }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <a href="{{ url('/admin/orders') }}" class="btn btn-success btn-sm"><i class="fa fa-chevron-left"></i> {{ Helper::translation(4764,$translate,'Back') }}</a>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        
         @if (session('success'))
    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
@endif

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">{{ Helper::translation(5112,$translate,'Order Details') }}</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>{{ Helper::translation(4713,$translate,'Sno') }}</th>
                                            <th>{{ Helper::translation(4392,$translate,'Product Name') }}</th>
                                            <th>{{ Helper::translation(5115,$translate,'License') }}</th>
                                            <th>{{ Helper::translation(5118,$translate,'Purchased Date') }}</th>
                                            <th>{{ Helper::translation(4311,$translate,'Expiry Date') }}</th>
                                            <th>{{ Helper::translation('64009368a909e',$translate,'Coupon Code') }}</th>
                                            <th>{{ Helper::translation('6402eb9100b71',$translate,'Coupon Type') }}</th>
                                            <th>{{ Helper::translation('6402ebd85611b',$translate,'Discount Amount') }}</th>
                                            <th>{{ Helper::translation(4548,$translate,'Amount') }}</th>
                                            <th>{{ Helper::translation(5121,$translate,'Payment Status') }}</th>
                                            <th>{{ Helper::translation(5124,$translate,'Payment Approval') }}?</th>
                                            <th>{{ Helper::translation(4065,$translate,'More Info') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($itemData['item'] as $order)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $order->product_name }} </td>
                                            <td>{{ $order->license }} </td>
                                            <td>{{ date('d F Y', strtotime($order->start_date)) }} </td>
                                            <td>{{ date('d F Y', strtotime($order->end_date)) }} </td>
                                            @if($order->coupon_code != "")
                                            <td>{{ $order->coupon_code }} </td>
                                            @else
                                            <td align="center">-</td>
                                            @endif
                                            @if($order->coupon_type != "")
                                            <td>{{ $order->coupon_type }} </td>
                                            @else
                                            <td align="center">-</td>
                                            @endif
                                            @if($order->coupon_type != "")
                                            @if($order->coupon_type == 'fixed')
                                            <td>{{ $allsettings->site_currency_symbol }}{{ $order->coupon_value }} </td>
                                            @else
                                            @php
                                            $equ = $order->product_price - $order->discount_price;
                                            $final = $order->discount_price+$allsettings->site_extra_fee; 
                                            @endphp
                                            <td>{{ $allsettings->site_currency_symbol }}{{ $equ }} </td>
                                            @endif
                                            @else
                                            @php
                                            $final = $order->product_price+$allsettings->site_extra_fee; 
                                            @endphp
                                            <td align="center">-</td>
                                            @endif
                                            <td>{{ $allsettings->site_currency_symbol }} {{ $final }}</td>
                                            <td>@if($order->order_status == 'completed') <span class="badge badge-success">{{ Helper::translation(5127,$translate,'Completed') }}</span> @else <span class="badge badge-danger">{{ Helper::translation(5130,$translate,'Pending') }}</span> @endif</td>
                                            <td>
                                            
                                            {{ $order->approval_status }}
                                            
                                            </td>
                                            <td><a href="{{ URL::to('/admin/more-info') }}/{{ $order->purchase_token }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i>&nbsp; {{ Helper::translation(4065,$translate,'More Info') }}</a></td>
                                        </tr>
                                        
                                        @php $no++; @endphp
                                   @endforeach     
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

 
                </div>
            </div>
        </div>


    </div>
    @else
    @include('admin.denied')
    @endif
    


   @include('admin.javascript')


</body>

</html>
