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
    @if(in_array('settings',$avilable))
    <div id="right-panel" class="right-panel">

       
                       @include('admin.header')
                       

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>{{ Helper::translation(5049,$translate,'Media Settings') }}</h1>
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
                           @if($demo_mode == 'on')
                           @include('admin.demo-mode')
                           @else
                           <form action="{{ route('admin.media-settings') }}" method="post" id="setting_form" enctype="multipart/form-data">
                           {{ csrf_field() }}
                           @endif
                          
                           <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                        
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ Helper::translation(5052,$translate,'Maximum Upload Image Size') }} (KB)<span class="require">*</span></label>
                                                <input id="site_max_image_size" name="site_max_image_size" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->site_max_image_size }}" data-bvalidator="required,digit,min[1]"> <small>Example : 1000</small>
                                            </div>
                                            
                                           <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ Helper::translation(5055,$translate,'Watermark') }}?<span class="require">*</span></label>
                                                <select name="watermark_option" class="form-control" required>
                                                <option value=""></option>
                                                <option value="1" @if($setting['setting']->watermark_option == "1") selected @endif>Yes</option>
                                                <option value="0" @if($setting['setting']->watermark_option == "0") selected @endif>No</option>
                                                </select>
                                                
                                                
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
                             
                               
                             <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ Helper::translation(5058,$translate,'Maximum Upload Zip File Size') }} (KB)<span class="require">*</span></label>
                                                <input id="site_max_zip_size" name="site_max_zip_size" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->site_max_zip_size }}" data-bvalidator="required,digit,min[1]"> <small>Example : 1000</small>
                                            </div>
                             
                                     <div class="form-group">
                                                <label for="site_logo" class="control-label mb-1">{{ Helper::translation(5061,$translate,'Watermark Image') }}</label>
                                                
                                            <input type="file" id="site_watermark" name="site_watermark" class="form-control-file">
                                            @if($setting['setting']->site_watermark != '')
                                                <img width="150" height="150" src="{{ url('/') }}/public/storage/settings/{{ $setting['setting']->site_watermark }}" class="img-border" />
                                                @endif
                                            </div>
                             
                             </div>
                                </div>

                            </div>
                             
                             <input type="hidden" name="sid" value="1">
                             <input type="hidden" name="save_watermark" value="{{ $setting['setting']->site_watermark }}">
                             </div>
                             
                             <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                        
                                         <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ Helper::translation('6223401dc6d75',$translate,'Large File Storage') }}</label>
                                                <select name="site_s3_storage" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="0" @if($setting['setting']->site_s3_storage == 0) selected @endif>{{ Helper::translation('622340291ff2b',$translate,'My Server') }}</option>
                                                <option value="1" @if($setting['setting']->site_s3_storage == 1) selected @endif>{{ Helper::translation('62234030cfa99',$translate,'Wasabi Storage') }}</option>
                                                <option value="2" @if($setting['setting']->site_s3_storage == 2) selected @endif>{{ Helper::translation('6223403911a49',$translate,'Dropbox Storage') }}</option>
                                                <option value="3" @if($setting['setting']->site_s3_storage == 3) selected @endif>{{ Helper::translation('6223404059682',$translate,'Google Storage') }}</option>
                                                </select>
                                                
                                                
                                            </div>   
                                           
                                            
                                           
                                           
                                    </div>
                                </div>

                            </div>
                            </div>
                             <div class="col-md-12"><h5>{{ Helper::translation('6223404b54e08',$translate,'Wasabi Storage Configuration (If wasabi storage selected)') }}</h5></div>
                             <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                        <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ Helper::translation('62234053c6d75',$translate,'WASABI ACCESS KEY ID') }}</label>
                                                <input id="wasabi_access_key_id" name="wasabi_access_key_id" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->wasabi_access_key_id }}">
                                            </div>
                                        
                                         <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ Helper::translation('6223405bf2f2d',$translate,'WASABI SECRET ACCESS KEY') }}</label>
                                                <input id="wasabi_secret_access_key" name="wasabi_secret_access_key" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->wasabi_secret_access_key }}"> 
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
                                       
                                        <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ Helper::translation('6223406509c67',$translate,'WASABI DEFAULT REGION') }}</label>
                                                <input id="wasabi_default_region" name="wasabi_default_region" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->wasabi_default_region }}">
                                                <small>Example : us-east-2</small>
                                            </div>
                                        
                                         <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ Helper::translation('6223406ced770',$translate,'WASABI BUCKET') }}</label>
                                                <input id="wasabi_bucket" name="wasabi_bucket" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->wasabi_bucket }}"> <small>Example : yourbucketname</small>
                                            </div>
                                           
                                    </div>
                                </div>

                            </div>
                            </div>
                             <div class="col-md-12"><h5>{{ Helper::translation('622340757bbd3',$translate,'Dropbox Storage Configuration (If dropbox storage selected)') }}</h5></div>
                            <div class="col-md-6">
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ Helper::translation('6223407d361ef',$translate,'DROPBOX API') }}</label>
                                                <input id="dropbox_api" name="dropbox_api" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->dropbox_api }}">
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
                                       <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ Helper::translation('62234085a037a',$translate,'DROPBOX TOKEN') }}</label>
                                                <input id="dropbox_token" name="dropbox_token" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->dropbox_token }}">
                                            </div>
                                        </div>
                                </div>
                             </div>
                            </div>
                            <div class="col-md-12"><h5>{{ Helper::translation('6223408e4ead9',$translate,'Google Drive Storage Configuration (If google drive storage selected)') }}</h5></div>
                             <div class="col-md-6">
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                       <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ Helper::translation('622340965f210',$translate,'GOOGLE DRIVE CLIENT ID') }}</label>
                                                <input id="google_drive_client_id" name="google_drive_client_id" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->google_drive_client_id }}">
                                            </div>
                                        <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ Helper::translation('6223409e22551',$translate,'GOOGLE DRIVE CLIENT SECRET') }}</label>
                                        <input id="google_drive_client_secret" name="google_drive_client_secret" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->google_drive_client_secret }}">
                                        </div></div>
                                </div>
                             </div>
                            </div>
                            <div class="col-md-6">
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ Helper::translation('622340a80d59f',$translate,'GOOGLE DRIVE REFRESH TOKEN') }}</label>
                                                <input id="google_drive_refresh_token" name="google_drive_refresh_token" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->google_drive_refresh_token }}">
                                            </div>
                                        <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ Helper::translation('622340b07ed6b',$translate,'GOOGLE DRIVE FOLDER ID') }}</label>
                                        <input id="google_drive_folder_id" name="google_drive_folder_id" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->google_drive_folder_id }}">
                                        </div></div>
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


</body>

</html>
