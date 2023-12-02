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
    @if(in_array('maintenance',$avilable))
    <div id="right-panel" class="right-panel">

       
                       @include('admin.header')
                       

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>{{ Helper::translation('63ff40894b1a1',$translate,'Website Maintenance') }}</h1>
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
                           <form action="{{ route('admin.website-maintenance') }}" method="post" id="setting_form" enctype="multipart/form-data">
                           {{ csrf_field() }}
                           @endif
                           <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                        
                                            <div class="form-group">
                                              <label for="product_approval" class="control-label mb-1">{{ Helper::translation('63ff437abcd3d',$translate,'Maintenance Mode') }}?<span class="require">*</span></label><br/>                                         <select name="maintenance_mode" class="form-control" required>
                                                        <option value=""></option>
                                                        <option value="1" @if($allsettings->maintenance_mode == 1) selected @endif>{{ __('ON') }}</option>
                                                        <option value="0" @if($allsettings->maintenance_mode == 0) selected @endif>{{ __('OFF') }}</option>
                                                        </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ Helper::translation('640048aa55979',$translate,'Maintenance Mode Title') }}</label>
                                                <input id="m_mode_title" name="m_mode_title" type="text" class="form-control noscroll_textarea" value="{{ $allsettings->m_mode_title }}">
                                                
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">{{ Helper::translation('640048b3e9696',$translate,'Maintenance Mode Content') }}</label>
                                                
                                            <textarea name="m_mode_content" rows="6" placeholder="Maintenance Mode Content" class="form-control">{{ $allsettings->m_mode_content }}</textarea>
                                            </div>
                                                
                                            
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ Helper::translation('64004939edf11',$translate,'Social Icon Label') }}</label>
                                                <input id="m_mode_social_label" name="m_mode_social_label" type="text" class="form-control noscroll_textarea" value="{{ $allsettings->m_mode_social_label }}">
                                                
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
                                                <label for="site_title" class="control-label mb-1"> {{ Helper::translation('64006becf278c',$translate,'Background') }} <span class="require">*</span></label>
                                                <select name="m_mode_background" id="m_mode_background" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="color" @if($allsettings->m_mode_background == "color") selected="selected" @endif>{{ Helper::translation('64006c3f16694',$translate,'Color') }}</option>
                                                <option value="image" @if($allsettings->m_mode_background == "image") selected="selected" @endif>{{ Helper::translation(4659,$translate,'Image') }}</option>
                                                </select>
                                                
                                            </div>
                                            
                                            <div id="m_mode_color" @if($allsettings->m_mode_background == "color") class="form-group display-block" @else  class="form-group display-none" @endif>
                                                <label for="site_title" class="control-label mb-1">{{ Helper::translation('64006c3f16694',$translate,'Color') }}</label>
                                                <input id="m_mode_bgcolor" name="m_mode_bgcolor" type="text" class="form-control noscroll_textarea" value="{{ $allsettings->m_mode_bgcolor }}">
                                                <small>(example color code : #666000 )</small>
                                            </div>
                                            
                                            
                                            <div id="m_mode_image" @if($allsettings->m_mode_background == "image") class="form-group display-block" @else  class="form-group display-none" @endif>
                                                <label for="site_favicon" class="control-label mb-1">{{ Helper::translation(4659,$translate,'Image') }}</label>
                                                
                                            <input type="file" id="m_mode_bgimage" name="m_mode_bgimage" class="form-control-file"  data-bvalidator="extension[jpg:png:jpeg:gif]" data-bvalidator-msg="Please select file of type .jpg, .png, .jpeg, .gif">
                                            @if($allsettings->m_mode_bgimage != '')
                                                <img height="50" width="50" src="{{ url('/') }}/public/storage/settings/{{ $allsettings->m_mode_bgimage }}" />
                                                @endif
                                            </div>
                                            
                                            <input type="hidden" name="sid" value="1">
                                            <input type="hidden" name="save_bgimage" value="{{ $allsettings->m_mode_bgimage }}">
                             
                             </div>
                                </div>

                            </div>
                             
                             
                             
                             </div>
                             
                             
                             
                             
                             
                             
                             <div class="col-md-12 no-padding">
                             <div class="card-footer">
                                                        <button type="submit" name="submit" class="btn btn-primary btn-sm">
                                                            <i class="fa fa-dot-circle-o"></i> {{ Helper::translation(4572,$translate,'Submit') }}
                                                        </button>
                                                        <button type="reset" class="btn btn-danger btn-sm">
                                                            <i class="fa fa-ban"></i> {{ Helper::translation(4575,$translate,'Reset') }}
                                                        </button>
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
