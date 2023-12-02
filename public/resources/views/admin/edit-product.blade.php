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
                        <h1>{{ Helper::translation(4185,$translate,'Edit Product') }}</h1>
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


@if ($errors->any())
    <div class="col-sm-12">
     <div class="alert  alert-danger alert-dismissible fade show" role="alert">
     @foreach ($errors->all() as $error)
      
         {{$error}}
      
     @endforeach
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
                        <div class="col-md-12">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                          <div class="form-group">
                                            <label for="name" class="control-label mb-1">{{ Helper::translation(4665,$translate,'Files') }} @if($demo_mode == 'on') <span class="require">{{ $demo_text }}</span> @endif</label>
                                            <form action="{{route('fileupload')}}" class='dropzone' enctype="multipart/form-data">
                                            <input type="hidden" name="product_token" value="{{ $edit['product']->product_token }}">
                                            </form>
                                            </div>
                                          </div>
                                     </div>
                                 </div>
                             </div>
                           @if($demo_mode == 'on')
                           @include('admin.demo-mode')
                           @else
                            <form action="{{ route('admin.edit-product') }}" method="post" id="category_form" enctype="multipart/form-data">
                           {{ csrf_field() }}
                           @endif
                          
                           <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                         <div class="form-group">
                                                <label for="name" class="control-label mb-1">{{ Helper::translation(4392,$translate,'Product Name') }}  <span class="require">*</span></label>
                                                <input id="product_name" name="product_name" type="text" class="form-control" data-bvalidator="required,maxlen[100]" value="{{ $edit['product']->product_name }}">
                                            </div>
                                            
                                                                                       
                                            
                                            <div class="form-group">
                                                <label for="site_keywords" class="control-label mb-1">{{ Helper::translation(4656,$translate,'Short Description') }}<span class="require">*</span></label>
                                                
                                            <textarea name="product_short_desc" id="product_short_desc" rows="4" class="form-control noscroll_textarea" data-bvalidator="required,maxlen[160]">{{ $edit['product']->product_short_desc }}</textarea>
                                            </div> 
                                            
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">{{ Helper::translation(4644,$translate,'Description') }}<span class="require">*</span></label>
                                                
                                            <textarea name="product_desc" id="summary-ckeditor" rows="6"  class="form-control" data-bvalidator="required">{{ html_entity_decode($edit['product']->product_desc) }}</textarea>
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ Helper::translation(4200,$translate,'Category') }} <span class="require">*</span></label>
                                                <?php /*?><select name="product_category" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                @foreach($category['view'] as $category)
                                                <option value="{{$category->cat_id}}" @if($edit['product']->product_category == $category->cat_id) selected @endif>{{ $category->category_name }}</option>
                                                @endforeach 
                                                
                                                </select><?php */?>
                                                <select name="product_category" id="product_category" class="form-control" data-bvalidator="required">
                                            <option value="">Select</option>
                                            @foreach($re_categories['menu'] as $menu)
                                                
                                                <option value="category_{{ $menu->cat_id }}" @if($cat_name == 'category') @if($menu->cat_id == $cat_id) selected="selected" @endif @endif>{{ $menu->category_name }}</option>
                                                @foreach($menu->subcategory as $sub_category)
                                                <option value="subcategory_{{$sub_category->subcat_id}}" @if($cat_name == 'subcategory') @if($sub_category->subcat_id == $cat_id) selected="selected" @endif @endif> - {{ $sub_category->subcategory_name }}</option>
                                                @endforeach  
                                            @endforeach
                                            </select>
                                            </div> 
                                            
                                            
                                             <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> {{ Helper::translation(4203,$translate,'Package Includes') }}</label>
                                                <select name="package_includes[]" class="form-control" multiple>
                                                 @foreach($package['view'] as $package)
                                                 @php $checkpackage = explode(',',$edit['product']->package_includes); @endphp
                                                <option value="{{$package->package_id}}" @if(in_array($package->package_id,$checkpackage)) selected="selected" @endif>{{ $package->package_name }}</option>
                                                @endforeach 
                                                
                                                </select>
                                                
                                            </div> 
                                            
                                             
                                           <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> {{ Helper::translation(4206,$translate,'Compatible Browsers') }}</label>
                                                <select name="compatible_browsers[]" class="form-control" multiple>
                                                @foreach($browser['view'] as $browser)
                                                @php $checkbrowser = explode(',',$edit['product']->compatible_browsers); @endphp
                                                <option value="{{$browser->browser_id}}" @if(in_array($browser->browser_id,$checkbrowser)) selected="selected" @endif>{{ $browser->browser_name }}</option>
                                                @endforeach 
                                                
                                                </select>
                                                
                                            </div> 
                                            
                                            
                                            
                                            
                                             <div class="form-group">
                                                <label for="name" class="control-label mb-1">{{ Helper::translation(4668,$translate,'Regular License Price') }} ({{ Helper::translation(4173,$translate,'6 Months Support') }}) ({{ $allsettings->site_currency_symbol }})<span class="require">*</span></label>
                                                <input id="regular_price" name="regular_price" type="text" class="form-control" data-bvalidator="required,min[1]" value="{{ $edit['product']->regular_price }}">
                                            </div>
                                            
                                            
                                             <div class="form-group">
                                                <label for="name" class="control-label mb-1">{{ Helper::translation(4671,$translate,'Extended License Price') }} ({{ Helper::translation(4179,$translate,'12 Months Support') }}) ({{ $allsettings->site_currency_symbol }})</label>
                                                <input id="extended_price" name="extended_price" type="text" class="form-control" data-bvalidator="min[1]" value="@if($edit['product']->extended_price != 0){{ $edit['product']->extended_price }}@endif">
                                            </div>
                                            
                                            
                                           
                                             
                                             
                                            
                                             
                                             
                                       
                                           
                                    </div>
                                </div>

                            </div>
                            </div>
                            
                            
                            
                             <div class="col-md-6">
                             
                             
                             <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                    <div id="display_message"></div>
                                     <div id="hide_message">
                                      <div class="form-group">
                                                <label for="customer_earnings" class="control-label mb-1">{{ Helper::translation(4674,$translate,'Upload Featured Image') }} <span class="require">*</span></label>
                                                <select name="product_image1" class="form-control" @if($edit['product']->product_image=='') data-bvalidator="required" @endif>
                                                <option value=""></option>
                                                @foreach($getdata1['first'] as $get)
                                                <option value="{{ $get->product_file_name }}">{{ $get->original_file_name }}</option>
                                                @endforeach
                                                </select>
                                                @if($edit['product']->product_image!='')
                                        <img src="{{ url('/') }}/public/storage/product/{{ $edit['product']->product_image }}" alt="{{ $edit['product']->product_name }}" class="item-thumb">
                                        @else
                                        <img src="{{ url('/') }}/public/img/no-image.png" alt="{{ $edit['product']->product_name }}" class="item-thumb">
                                        @endif
                                             </div> 
                                    
                                    <div class="form-group">
                                                <label for="customer_earnings" class="control-label mb-1">{{ Helper::translation(4677,$translate,'Upload File') }} ({{ Helper::translation(4680,$translate,'Zip Format Only') }})<span class="require">*</span></label>                                          <select  name="product_file1" class="form-control" @if($edit['product']->product_file=='') data-bvalidator="required" @endif>
                                                <option value=""></option>
                                                @foreach($getdata2['second'] as $get)
                                                <option value="{{ $get->product_file_name }}">{{ $get->original_file_name }}</option>
                                                @endforeach
                                                </select> 
                                                <span class="require">{{ $edit['product']->product_file }}</span>
                                             </div>
                                    
                                     <div class="form-group">
                                                <label for="customer_earnings" class="control-label mb-1">{{ Helper::translation(4683,$translate,'Upload Gallery Images') }} ({{ Helper::translation(4686,$translate,'Multiselect') }})</label>
                                                <select id="product_gallery" name="product_gallery[]" class="form-control" multiple>
                                                @foreach($getdata3['third'] as $get)
                                                <option value="{{ $get->product_file_name }}">{{ $get->original_file_name }}</option>
                                                @endforeach
                                                </select>
                                                @foreach($product_image['view'] as $product)
                                                    
                                                    <div class="item-img"><img src="{{ url('/') }}/public/storage/product/{{ $product->product_gallery_image }}" alt="{{ $product->product_gallery_image }}" class="item-thumb">
                                                    <a href="{{ url('/admin/edit-product') }}/dropimg/{{ base64_encode($product->prod_gal_id) }}" onClick="return confirm('Are you sure you want to delete?');" class="drop-icon"><span class="ti-trash drop-icon"></span></a>
                                                    </div>
                                                    
                                                    @endforeach<br/>
                                             </div>
                                    </div>
                                    
                                      <div class="form-group clearfix mt-3 pt-4">
                                                <label for="site_title" class="control-label mb-1"> {{ Helper::translation(4689,$translate,'Feature Update') }} <span class="require">*</span></label>
                                                <select name="future_update" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                
                                                <option value="1" @if($edit['product']->future_update == 1) selected @endif>Yes</option>
                                                <option value="0" @if($edit['product']->future_update == 0) selected @endif>No</option>
                                                </select>
                                                
                                            </div>
                                      
                                      <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> {{ Helper::translation(4692,$translate,'Product Support') }} <span class="require">*</span></label>
                                                <select name="item_support" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                
                                                <option value="1" @if($edit['product']->item_support == 1) selected @endif>Yes</option>
                                                <option value="0" @if($edit['product']->item_support == 0) selected @endif>No</option>
                                                </select>
                                                
                                            </div>
                                      
                                      
                                    
                                  <div class="form-group clearfix">
                                                <label for="site_keywords" class="control-label mb-1">{{ Helper::translation(4209,$translate,'Tags') }}</label>
                                                
                                            <textarea name="product_tags" id="product_tags" rows="4" placeholder="separate tag with commas" class="form-control noscroll_textarea">{{ $edit['product']->product_tags }}</textarea>
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> {{ Helper::translation(4695,$translate,'Featured') }} <span class="require">*</span></label>
                                                <select name="product_featured" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                
                                                <option value="1" @if($edit['product']->product_featured == 1) selected @endif>Yes</option>
                                                <option value="0" @if($edit['product']->product_featured == 0) selected @endif>No</option>
                                                </select>
                                                
                                            </div>
                                    
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> {{ Helper::translation(4128,$translate,'Flash Sale') }} <span class="require">*</span></label>
                                                <select name="product_flash_sale" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                
                                                <option value="1" @if($edit['product']->product_flash_sale == 1) selected @endif>Yes</option>
                                                <option value="0" @if($edit['product']->product_flash_sale == 0) selected @endif>No</option>
                                                </select>
                                                
                                            </div>
                               
                                    
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> {{ Helper::translation(4698,$translate,'Free Download') }} <span class="require">*</span></label>
                                                <select name="product_free" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                
                                                <option value="1" @if($edit['product']->product_free == 1) selected @endif>Yes</option>
                                                <option value="0" @if($edit['product']->product_free == 0) selected @endif>No</option>
                                                </select>
                                                
                                            </div>
                                            
                                               
                                             
                                             <div class="form-group">
                                                <label for="name" class="control-label mb-1">{{ Helper::translation(4701,$translate,'Demo Url') }}</label>
                                                <input id="product_demo_url" name="product_demo_url" type="text" class="form-control" data-bvalidator="url" value="{{ $edit['product']->product_demo_url }}">
                                                
                                            </div> 
                                     
                                           <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> {{ Helper::translation(4704,$translate,'Allow Seo') }}? <span class="require">*</span></label>
                                                <select name="product_allow_seo" id="product_allow_seo" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" @if($edit['product']->product_allow_seo == 1) selected @endif>Yes</option>
                                                <option value="0" @if($edit['product']->product_allow_seo == 0) selected @endif>No</option>
                                                </select>
                                                
                                            </div>      
                             <div id="ifseo" @if($edit['product']->product_allow_seo == 1) class="force-block" @else class="force-none" @endif>
                            <div class="form-group">
                                                <label for="site_keywords" class="control-label mb-1">{{ Helper::translation(4593,$translate,'SEO Meta Keywords') }} ({{ Helper::translation(4596,$translate,'max 160 chars') }}) <span class="require">*</span></label>
                                                
                                            <textarea name="product_seo_keyword" id="product_seo_keyword" rows="4" class="form-control noscroll_textarea" data-bvalidator="required,maxlen[160]">{{ $edit['product']->product_seo_keyword }}</textarea>
                                            </div> 
                               
                             
                                       <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">{{ Helper::translation(4599,$translate,'SEO Meta Description') }} ({{ Helper::translation(4596,$translate,'max 160 chars') }}) <span class="require">*</span></label>
                                                
                                            <textarea name="product_seo_desc" id="product_seo_desc" rows="4" class="form-control noscroll_textarea" data-bvalidator="required,maxlen[160]">{{ $edit['product']->product_seo_desc }}</textarea>
                                            </div>
                                  </div>  
                                     
                                      <div class="form-group">
                                                <label for="name" class="control-label mb-1">{{ Helper::translation(4707,$translate,'Video Url') }}</label>
                                                <input id="product_video_url" name="product_video_url" type="text" class="form-control" value="{{ $edit['product']->product_video_url }}">
                                                <small>( Example : https://www.youtube.com/watch?v=cXxAVn3rASk )</small>
                                     </div>
                                     
                                     
                                     <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> {{ Helper::translation(4551,$translate,'Status') }} <span class="require">*</span></label>
                                                <select name="product_status" id="product_status" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" @if($edit['product']->product_status == 1) selected @endif>{{ Helper::translation(4581,$translate,'Active') }}</option>
                                                <option value="0" @if($edit['product']->product_status == 0) selected @endif>{{ Helper::translation(4584,$translate,'InActive') }}</option>
                                                </select>
                                                
                                            </div>
                                     
                                  <input type="hidden" name="image_size" value="{{ $allsettings->site_max_image_size }}">             
                                  <input type="hidden" name="zip_size" value="{{ $allsettings->site_max_zip_size }}"> 
                                  <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                  <input type="hidden" name="save_product_image" value="{{ $edit['product']->product_image }}">
                                  <input type="hidden" name="save_product_file" value="{{ $edit['product']->product_file }}">
                                  <input type="hidden" name="product_token" value="{{ $edit['product']->product_token }}">
                             </div>
                                </div>

                            </div>
                            
                             
                             </div>
                             
                             <div class="col-md-12 no-padding">
                             <div class="card-footer">
                                 <button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="fa fa-dot-circle-o"></i> {{ Helper::translation(4572,$translate,'Submit') }}</button>
                                 <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> {{ Helper::translation(4575,$translate,'Reset') }} </button>
                             </div>
                             
                             </div>
                             
                            
                            </form>
                            
                                                    
                                                    
                                                 
                            
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
   @include('admin.zone')

</body>

</html>
