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
                        <h1>{{ Helper::translation(4710,$translate,'Sub Administrators') }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <a href="{{ url('/admin/add-administrator') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> {{ Helper::translation(4563,$translate,'Add Sub Administrator') }}</a>
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
                                <strong class="card-title">{{ Helper::translation(4710,$translate,'Sub Administrators') }}</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>{{ Helper::translation(4713,$translate,'Sno') }}</th>
                                            <th>{{ Helper::translation(4020,$translate,'Name') }}</th>
                                            <th>{{ Helper::translation(4023,$translate,'Email') }}</th>
                                            <th>{{ Helper::translation(4716,$translate,'Photo') }}</th>
                                            <th>{{ Helper::translation(4719,$translate,'Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($userData['data'] as $user)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>@if($user->user_photo != '') <img height="50" src="{{ url('/') }}/public/storage/users/{{ $user->user_photo }}" alt="{{ $user->name }}" class="userphoto"/>@else <img height="50" src="{{ url('/') }}/public/img/no-user.png" alt="{{ $user->name }}" class="userphoto"/>  @endif</td>
                                            <td><a href="edit-administrator/{{ $user->user_token }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i>&nbsp; {{ Helper::translation(4722,$translate,'Edit') }}</a> <a href="administrator/{{ $user->user_token }}" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure you want to delete?');"><i class="fa fa-trash"></i>&nbsp;{{ Helper::translation(4725,$translate,'Delete') }}</a></td>
                                        </tr>
                                        @php $no++; @endphp
                                   @endforeach     
                                    </tbody>
                                </table>
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