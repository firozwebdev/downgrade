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
    @if(Auth::user()->id == 1)
    <div id="right-panel" class="right-panel">
      @include('admin.header')
       <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>{{ Helper::translation(4812,$translate,'Edit Sub Administrator') }}</h1>
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
                           <form action="{{ route('admin.edit-administrator') }}" method="post" id="setting_form" enctype="multipart/form-data">
                           {{ csrf_field() }}
                           @endif
                           <div class="col-md-6">
                           <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       <div class="form-group">
                                                <label for="name" class="control-label mb-1">{{ Helper::translation(4020,$translate,'Name') }} <span class="require">*</span></label>
                                                <input id="name" name="name" type="text" class="form-control" value="{{ $edit['userdata']->name }}" data-bvalidator="required">
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">{{ Helper::translation(4272,$translate,'Username') }} <span class="require">*</span></label>
                                                <input id="username" name="username" type="text" class="form-control" value="{{ $edit['userdata']->username }}" data-bvalidator="required">
                                            </div>
                                            <div class="form-group">
                                                    <label for="email" class="control-label mb-1">{{ Helper::translation(4023,$translate,'Email') }} <span class="require">*</span></label>
                                                    <input id="email" name="email" type="text" class="form-control" value="{{ $edit['userdata']->email }}" data-bvalidator="email,required">
                                              </div>
                                              <input type="hidden" name="user_type" value="admin">
                                               <div class="form-group">
                                                    <label for="password" class="control-label mb-1">{{ Helper::translation(4275,$translate,'Password') }}</label>
                                                    <input id="password" name="password" type="text" class="form-control">
                                                </div>
                                                @if(Auth::user()->id == 1)
                                                 <div class="form-group">
                                                    <label for="earnings" class="control-label mb-1">{{ Helper::translation(4566,$translate,'Earnings') }} ({{ $allsettings->site_currency_symbol }})</label>
                                                    <input id="earnings" name="earnings" type="text" class="form-control" value="{{ $edit['userdata']->earnings }}" data-bvalidator="min[0]">
                                                </div>
                                                @endif
                                                <div class="form-group">
                                                                    <label for="customer_earnings" class="control-label mb-1">{{ Helper::translation(4281,$translate,'Upload Photo') }}</label>
                                                                    <input type="file" id="user_photo" name="user_photo" class="form-control-file" data-bvalidator="extension[jpg:png:jpeg:svg]" data-bvalidator-msg="Please select file of type .jpg, .png, .jpeg or .svg">@if($edit['userdata']->user_photo != '')
                                                <img height="50" src="{{ url('/') }}/public/storage/users/{{ $edit['userdata']->user_photo }}"  class="userphoto"/>@else <img height="50" src="{{ url('/') }}/public/img/no-user.png"  class="userphoto"/>  @endif</div>
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
                                    <label for="customer_earnings" class="control-label mb-1"><strong>{{ Helper::translation(4569,$translate,'Permission') }}</strong></label><br/><br/>
                                    @php $edituser = explode(',', $edit['userdata']->user_permission); @endphp
                                    @foreach($permission as $key => $value)
                                     <span><input type="checkbox" id="user_permission[]" name="user_permission[]" value="{{ $key }}" @if(in_array($key,$edituser)) checked @endif> {{ $value }}</span><br/>
                                    @endforeach
                                  </div>
                              </div>
                                </div>
                              </div>
                             </div>
                             <input type="hidden" name="save_photo" value="{{ $edit['userdata']->user_photo }}">
                             <input type="hidden" name="save_password" value="{{ $edit['userdata']->password }}">
                             <input type="hidden" name="user_token" value="{{ $edit['userdata']->user_token }}">
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