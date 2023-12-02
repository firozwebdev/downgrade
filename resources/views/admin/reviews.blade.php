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
    @if(in_array('manage-products',$avilable))
    <div id="right-panel" class="right-panel">

        
                       @include('admin.header')
                       

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>{{ $product_details->product_name }} - {{ Helper::translation(5088,$translate,'Rating & Reviews') }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                     <ol class="breadcrumb text-right">
                            <a href="{{ url('/admin/products') }}" class="btn btn-primary btn-sm"><i class="fa fa-chevron-left"></i> {{ Helper::translation(4764,$translate,'Back') }}</a>&nbsp;<a href="{{ url('/admin/add-reviews') }}/{{ $product_details->product_token }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> {{ Helper::translation('6471e48a10366',$translate,'Add Reviews') }}</a>
                        </ol>
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
@if (session('error'))
    <div class="col-sm-12">
        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
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
                                <strong class="card-title">{{ Helper::translation(5088,$translate,'Rating & Reviews') }}</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>{{ Helper::translation(4713,$translate,'Sno') }}</th>
                                            <th>{{ Helper::translation(4782,$translate,'Customers') }}</th>
                                            <th>{{ Helper::translation(4410,$translate,'Rating') }}</th>
                                            <th>{{ Helper::translation(4329,$translate,'Rating Reason') }}</th>
                                            <th>{{ Helper::translation(5223,$translate,'Rating Comment') }}</th>
                                            <th>{{ Helper::translation(4719,$translate,'Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($itemData['item'] as $rating)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>@if($rating->or_user_id == 0){{ $rating->or_username }}@else{{ Helper::Get_User_Name($rating->or_user_id) }}@endif</td>
                                            <td>{{ $rating->rating }} Stars</td>
                                            <td>{{ $rating->rating_reason }} </td>
                                            <td>{{ $rating->rating_comment }}</td>
                                            <td>
                                            <a href="{{ URL::to('/admin/edit-reviews') }}/{{ $rating->rating_id }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i>&nbsp; {{ Helper::translation(4722,$translate,'Edit') }}</a> 
                                            @if($demo_mode == 'on') 
                                            <a href="demo-mode" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;{{ Helper::translation(4725,$translate,'Delete') }}</a>
                                            @else
                                            <a href="{{ URL::to('/admin/dropreviews') }}/{{ $rating->rating_id }}" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure you want to delete?');"><i class="fa fa-close"></i>&nbsp; {{ Helper::translation(4725,$translate,'Delete') }}</a>@endif
                                            
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
    


   @include('admin.javascript')


</body>

</html>
