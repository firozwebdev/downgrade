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
                        <h1>{{ Helper::translation(4974,$translate,'Products') }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <a href="{{ url('/admin/add-product') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> {{ Helper::translation(4662,$translate,'Add Product') }}</a>&nbsp;
                            <a href="{{ url('/admin/products-import-export') }}" class="btn btn-primary btn-sm"><i class="fa fa-file-excel-o"></i> {{ Helper::translation(5211,$translate,'Product Import / Export') }}</a>
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
                    <div class="col-md-3 ml-auto">
                    <form action="{{ route('admin.products') }}" method="post" id="setting_form" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                    <input id="search" name="search" type="text" class="move-bars" value="{{ $search }}" placeholder="{{ Helper::translation(4392,$translate,'Product Name') }}">
                    
                    <button type="submit" name="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Search
                    </button>
                    
                    </div>
                    </form>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">{{ Helper::translation(4974,$translate,'Products') }}</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export-product" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>{{ Helper::translation(4713,$translate,'Sno') }}</th>
                                            <th>{{ Helper::translation(4659,$translate,'Image') }}</th>
                                            <th>{{ Helper::translation(4392,$translate,'Product Name') }}</th>
                                            <?php /*?><th>{{ Helper::translation(4200,$translate,'Category') }}</th><?php */?>
                                            <th>{{ Helper::translation(4290,$translate,'Price') }}</th>
                                            <th>{{ Helper::translation(4695,$translate,'Featured') }}</th>
                                            <th>{{ Helper::translation(4698,$translate,'Free Download') }}</th>
                                            <th>{{ Helper::translation(4128,$translate,'Flash Sale') }}</th>
                                            <th>{{ Helper::translation(4215,$translate,'Reviews') }}</th>
                                            <th>{{ Helper::translation(4551,$translate,'Status') }}</th>
                                            <th>{{ Helper::translation(4719,$translate,'Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($itemData['item'] as $product)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>@if($product->product_image != '') <img src="{{ url('/') }}/public/storage/product/{{ $product->product_image }}" alt="{{ $product->product_name }}" class="image-size"/>@else <img src="{{ url('/') }}/public/img/no-image.jpg" alt="{{ $product->product_name }}" class="image-size"/>  @endif</td>
                                            <td>{{ substr($product->product_name,0,20).'...' }} </td>
                                            <?php /*?><td>{{ $product->category_name }}</td><?php */?>
                                            <td>{{ $allsettings->site_currency_symbol }} {{ $product->regular_price }}</td>
                                            
                                            
                                            <td>@if($product->product_featured == 1) <span class="badge badge-success">Yes</span> @else <span class="badge badge-danger">No</span> @endif</td>
                                            <td>@if($product->product_free == 1) <span class="badge badge-success">Yes</span> @else <span class="badge badge-danger">No</span> @endif</td>
                                            <td>@if($product->product_flash_sale == 1) <span class="badge badge-success">Yes</span> @else <span class="badge badge-danger">No</span> @endif</td> 
                                            <td><a href="reviews/{{ $product->product_token }}" class="blue-color">{{ Helper::translation(4215,$translate,'Reviews') }} [{{ $reviews->has($product->product_id) ? count($reviews[$product->product_id]) : 0 }}]</a></td>
                                            <td>@if($product->product_status == 1) <span class="badge badge-success">{{ Helper::translation(4581,$translate,'Active') }}</span> @else <span class="badge badge-danger">{{ Helper::translation(4584,$translate,'InActive') }}</span> @endif</td>
                                            <td><a href="edit-product/{{ $product->product_token }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i>&nbsp; {{ Helper::translation(4722,$translate,'Edit') }}</a> 
                                            @if($demo_mode == 'on') 
                                            <a href="demo-mode" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;{{ Helper::translation(4725,$translate,'Delete') }}</a>
                                            @else 
                                            <a href="products/{{ $product->product_token }}" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure you want to delete?');"><i class="fa fa-trash"></i>&nbsp;{{ Helper::translation(4725,$translate,'Delete') }}</a>
                                            <a href="download/{{ $product->product_token }}" class="btn btn-primary btn-sm mt-1"><i class="fa fa-download"></i>&nbsp;{{ Helper::translation(4296,$translate,'') }}</a>
                                            @endif</td>
                                        </tr>
                                        
                                        @php $no++; @endphp
                                   @endforeach     
                                        
                                    </tbody>
                                </table>
                                <div>
                                {{ $itemData['item']->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>

 
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->
    @else
    @include('admin.denied')
    @endif
    <!-- Right Panel -->


   @include('admin.javascript')


</body>

</html>
