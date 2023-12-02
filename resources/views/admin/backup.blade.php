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
    @if(in_array('backups',$avilable))
    <div id="right-panel" class="right-panel">

        
                       @include('admin.header')
                       

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>{{ Helper::translation('64fc0c27cae4e',$translate,'Backups') }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                    <ol class="breadcrumb text-right">
                            @if($demo_mode == 'on')
                            <a href="{{ url('/admin/demo-mode') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> {{ Helper::translation('64fc0c8f2b646',$translate,'Create Backup') }}</a>
                            @else
                            <a href="{{ url('/admin/backup/create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> {{ Helper::translation('64fc0c8f2b646',$translate,'Create Backup') }}</a>
                            @endif
                        </ol>
                    </div>
                </div>
            </div>
        </div>
         @if (session('error'))
    
        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
        @endif
         @if ( Session::has('success') )
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ Session::get('success') }}
                </div>
                @endif

                @if ( Session::has('update') )
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ Session::get('update') }}
                </div>
                @endif

                @if ( Session::has('delete') )
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ Session::get('delete') }}
                </div>
            @endif

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">{{ Helper::translation('64fc0c27cae4e',$translate,'Backups') }}</strong>
                            </div>
                            <div class="card-body">
                                @if (count($backups))
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>{{ Helper::translation('64fc0cd208954',$translate,'File Name') }}</th>
                        <th>{{ Helper::translation('64fc0cdaddbab',$translate,'File Size') }}</th>
                        <th>{{ Helper::translation('64fc0ce129020',$translate,'Created Date') }}</th>
                        <th>{{ Helper::translation('64fc0ce7c0675',$translate,'Created Age') }}</th>
                        <th>{{ Helper::translation(4719,$translate,'Action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($backups as $backup)
                        <tr>
                            <td>{{ $backup['file_name'] }}</td>
                            <td>{{ \DownGrade\Http\Controllers\Admin\BackupController::humanFilesize($backup['file_size']) }}</td>
                            <td>
                                {{ date('F jS, Y, g:ia (T)',$backup['last_modified']) }}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($backup['last_modified'])->diffForHumans() }}
                            </td>
                            <td class="text-right">
                                @if($demo_mode == 'on')
                                <a class="btn btn-success"
                                   href="{{ url('/admin/demo-mode') }}"><i
                                        class="fa fa-cloud-download"></i> {{ Helper::translation('64fc0d6cc6d75',$translate,'Download') }}</a>
                                <a class="btn btn-danger" data-button-type="delete"
                                   href="{{ url('/admin/demo-mode') }}"><i class="fa fa-trash-o"></i>
                                    {{ Helper::translation(4725,$translate,'Delete') }}</a>
                                @else
                                <a class="btn btn-success"
                                   href="{{ url('admin/backup/download/'.$backup['file_name']) }}"><i
                                        class="fa fa-cloud-download"></i> {{ Helper::translation('64fc0d6cc6d75',$translate,'Download') }}</a>
                                <a class="btn btn-danger" onClick="return confirm('{{ __('Are you sure you want to delete') }}?');" data-button-type="delete"
                                   href="{{ url('admin/backup/delete/'.$backup['file_name']) }}"><i class="fa fa-trash-o"></i>
                                    {{ Helper::translation(4725,$translate,'Delete') }}</a>
                                @endif    
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="well">
                    <h4>{{ Helper::translation('64fc0dcff2b5c',$translate,'No backups') }}</h4>
                </div>
            @endif
                            </div>
                        </div>
                    </div>
                     <div class="col-md-12">
                       
                        
                        
                      
                        <div class="card">
                           @if($demo_mode == 'on')
                           @include('admin.demo-mode')
                           @else
                           <form action="{{ route('admin.backup') }}" method="post" id="setting_form" enctype="multipart/form-data">
                           {{ csrf_field() }}
                           @endif
                          
                           <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                           
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><strong>{{ Helper::translation('64fc0df690013',$translate,'Backup Types') }} </strong></label><br/>
                                                
                                                <input id="backup_types" name="backup_types" type="radio" class="noscroll_textarea" value="database" data-bvalidator="required" @if($custom_settings->backup_types == 'database') checked="checked" @endif> {{ Helper::translation('64fc0e248e55f',$translate,'Database Only') }} <small class="require">( {{ __("it's takes short time") }} )</small><br/>
                                                <input id="backup_types" name="backup_types" type="radio" class="noscroll_textarea" value="files_database" data-bvalidator="required" @if($custom_settings->backup_types == 'files_database') checked="checked" @endif> {{ Helper::translation('64fc0e37094c5',$translate,'Files and Database') }} <small class="require">( {{ __("it's takes long time") }} )</small><br/>
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
   

</body>

</html>
