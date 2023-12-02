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
                        <h1>{{ Helper::translation(4065,$translate,'More Info') }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <a href="{{ url('/admin/order-details') }}/{{ $itemData['item']->purchase_token }}" class="btn btn-success btn-sm"><i class="fa fa-chevron-left"></i> Back</a>
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
                            <strong class="card-title" v-if="headerText">{{ Helper::translation(5064,$translate,'Buyer More Information') }}</strong>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-hover table-striped table-align-middle mb-0">
                                
                                <tbody>
                                    @if($itemData['item']->order_firstname != "")
                                    <tr>
                                        <td>
                                            {{ Helper::translation(3930,$translate,'First Name') }}
                                        </td>
                                        
                                        <td>
                                            {{ $itemData['item']->order_firstname }}
                                        </td>
                                    </tr>
                                    @endif
                                    @if($itemData['item']->order_lastname != "")
                                    <tr>
                                        <td>
                                            {{ Helper::translation(3933,$translate,'Last Name') }}
                                        </td>
                                        
                                        <td>
                                            {{ $itemData['item']->order_lastname }}
                                        </td>
                                    </tr>
                                    @endif
                                    @if($itemData['item']->order_company != "")
                                    <tr>
                                        <td>
                                            {{ Helper::translation(5067,$translate,'Company') }}
                                        </td>
                                        
                                        <td>
                                            {{ $itemData['item']->order_company }}
                                        </td>
                                    </tr>
                                    @endif
                                    @if($itemData['item']->order_email != "")
                                    <tr>
                                        <td>
                                            {{ Helper::translation(4023,$translate,'Email') }}
                                        </td>
                                        
                                        <td>
                                            {{ $itemData['item']->order_email }}
                                        </td>
                                    </tr>
                                    @endif
                                    @if($itemData['item']->order_country != "")
                                    <tr>
                                        <td>
                                            {{ Helper::translation(3945,$translate,'Country') }}
                                        </td>
                                        
                                        <td>
                                            {{ $itemData['item']->order_country }}
                                        </td>
                                    </tr>
                                    @endif
                                    @if($itemData['item']->order_address != "")
                                    <tr>
                                        <td>
                                            {{ Helper::translation(3942,$translate,'Address') }}
                                        </td>
                                        
                                        <td>
                                            {{ $itemData['item']->order_address }}
                                        </td>
                                    </tr>
                                    @endif
                                    @if($itemData['item']->order_city != "")
                                    <tr>
                                        <td>
                                            {{ Helper::translation(3948,$translate,'City / State') }}
                                        </td>
                                        
                                        <td>
                                            {{ $itemData['item']->order_city }}
                                        </td>
                                    </tr>
                                    @endif
                                    @if($itemData['item']->order_zipcode != "")
                                    <tr>
                                        <td>
                                            {{ Helper::translation(3951,$translate,'Zip / Postal Code') }}
                                        </td>
                                        
                                        <td>
                                            {{ $itemData['item']->order_zipcode }}
                                        </td>
                                    </tr>
                                    @endif
                                    @if($itemData['item']->order_notes != "")
                                    <tr>
                                        <td>
                                            {{ Helper::translation(3954,$translate,'Other Notes') }}
                                        </td>
                                        
                                        <td>
                                            {{ $itemData['item']->order_notes }}
                                        </td>
                                    </tr>
                                    @endif
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
