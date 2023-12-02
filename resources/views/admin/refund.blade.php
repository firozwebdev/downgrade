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
    @if($allsettings->site_refund_display == 1)
    @if(in_array('refund-request',$avilable))
    <div id="right-panel" class="right-panel">

        
                       @include('admin.header')
                       

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>{{ Helper::translation(4317,$translate,'Refund Request') }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    
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
                                <strong class="card-title">{{ Helper::translation(4317,$translate,'Refund Request') }}</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>{{ Helper::translation(4713,$translate,'Sno') }}</th>
                                            <th>{{ Helper::translation(4302,$translate,'Order ID') }}</th>
                                            <th>{{ Helper::translation(4392,$translate,'Product Name') }}</th>
                                            <th>{{ Helper::translation(5133,$translate,'Buyer') }}</th>
                                            <th>{{ Helper::translation(4353,$translate,'Refund Reason') }}</th>
                                            <th>{{ Helper::translation(5226,$translate,'Refund Comment') }}</th>
                                            <th>{{ Helper::translation(4551,$translate,'Status') }}</th>
                                            <th>{{ Helper::translation(4719,$translate,'Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($itemData['item'] as $refund)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $refund->ref_purchased_token }} </td>
                                            <td>{{ $refund->product_name }} </td>
                                            <td>{{ $refund->username }}</td>
                                            <td>{{ $refund->ref_refund_reason }} </td>
                                            <td>{{ $refund->ref_refund_comment }}</td>
                                            <td>
                                            @if($refund->ref_refund_approval != "")
                                             @if($refund->ref_refund_approval == 'accepted') <span class="badge badge-success">{{ Helper::translation(5235,$translate,'Accepted') }}</span> @else <span class="badge badge-danger">{{ Helper::translation(5238,$translate,'Declined') }}</span> @endif
                                             @else
                                             <span>---</span>
                                             @endif
                                             </td>
                                            <td>
                                            @if($refund->ref_refund_approval == "") 
                                            <a href="{{ URL::to('/admin/refund') }}/{{ $refund->ref_order_id }}/{{ $refund->refund_id }}/customer" class="btn btn-success btn-sm" title="payment released to vendor"><i class="fa fa-money"></i>&nbsp; {{ Helper::translation(5229,$translate,'Refund Accept') }}</a> 
                                            <a href="{{ URL::to('/admin/refund') }}/{{ $refund->ref_order_id }}/{{ $refund->refund_id }}/admin" class="btn btn-danger btn-sm" title="payment released to buyer"><i class="fa fa-close"></i>&nbsp; {{ Helper::translation(5232,$translate,'Refund Declined') }}</a>
                                            @endif
                                            @if($demo_mode == 'on') 
                                            <a href="{{ URL::to('/admin/demo-mode') }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;{{ Helper::translation(4725,$translate,'') }}</a>
                                            @else
                                            <a href="{{ URL::to('/admin/refund') }}/{{ $refund->refund_id }}" class="btn btn-danger btn-sm" onClick="return confirm('{{ Helper::translation(3903,$translate,'') }}?');"><i class="fa fa-trash"></i>&nbsp;{{ Helper::translation(4725,$translate,'') }}</a>@endif
                                            </td>
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
    @else
    @include('admin.denied')
    @endif
    


   @include('admin.javascript')


</body>

</html>
