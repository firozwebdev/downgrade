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
    @if(in_array('blog',$avilable))
    <div id="right-panel" class="right-panel">

        
                       @include('admin.header')
                       

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>{{ Helper::translation(5205,$translate,'Posts') }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <a href="{{ url('/admin/add-post') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> {{ Helper::translation(4653,$translate,'Add Post') }}</a>
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

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">{{ Helper::translation(5205,$translate,'Posts') }}</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>{{ Helper::translation(4713,$translate,'Sno') }}</th>
                                            <th>{{ Helper::translation(4020,$translate,'Name') }}</th>
                                            <th>{{ Helper::translation(4659,$translate,'Image') }}</th>
                                            <th>{{ Helper::translation(4200,$translate,'Category') }}</th>
                                            <th>{{ Helper::translation(4191,$translate,'Comments') }}</th>
                                            <th>{{ Helper::translation(4551,$translate,'Status') }}</th>
                                            <th>{{ Helper::translation(4719,$translate,'Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($postData['post'] as $post)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ substr($post->post_title,0,20).'...' }} </td>
                                            <td>@if($post->post_image != '') <img height="50" width="50" src="{{ url('/') }}/public/storage/post/{{ $post->post_image }}" alt="{{ $post->post_title }}"/>@else <img height="50" width="50" src="{{ url('/') }}/public/img/no-image.png" alt="{{ $post->post_title }}" />  @endif</td>
                                            <td>{{ $post->blog_category_name }}</td>
                                            
                                            <td><a href="comment/{{ $post->post_id }}" class="blue-color">{{ Helper::translation(4191,$translate,'Comments') }} [{{ $comments->has($post->post_id) ? count($comments[$post->post_id]) : 0 }}]</a></td>
                                            <td>@if($post->post_status == 1) <span class="badge badge-success">{{ Helper::translation(4581,$translate,'Active') }}</span> @else <span class="badge badge-danger">{{ Helper::translation(4584,$translate,'InActive') }}</span> @endif</td>
                                            <td><a href="edit-post/{{ $post->post_id }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i>&nbsp; {{ Helper::translation(4722,$translate,'Edit') }}</a> 
                                            @if($demo_mode == 'on') 
                                            <a href="demo-mode" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;{{ Helper::translation(4725,$translate,'Delete') }}</a>
                                            @else
                                            <a href="post/{{ $post->post_id }}" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure you want to delete?');"><i class="fa fa-trash"></i>&nbsp;{{ Helper::translation(4725,$translate,'Delete') }}</a>@endif</td>
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
