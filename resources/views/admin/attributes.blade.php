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
                        <h1>{{ Helper::translation('6397127e58b11',$translate,'Attributes') }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <a href="{{ url('/admin/add-attribute') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> {{ Helper::translation('639719aa46185',$translate,'Add Attributes') }}</a>
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
                                <strong class="card-title">{{ Helper::translation('6397127e58b11',$translate,'Attributes') }}</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                              <th>{{ Helper::translation(4713,$translate,'') }}</th>
                                              <th>{{ Helper::translation('63971a19c7145',$translate,'Attribute Name') }}</th>
                                              <th>{{ Helper::translation('63971a435b507',$translate,'Field Type') }}</th>
                                              <th>{{ Helper::translation(4590,$translate,'') }}</th>
                                              <th>{{ Helper::translation(4551,$translate,'') }}</th>
                                              <th>{{ Helper::translation(4719,$translate,'') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                  @php $no = 1; @endphp
                                  @foreach($attributeData['attribute'] as $attribute)
                                   <tr>
                                      <td>{{ $no }}</td>
                                      <td>{{ $attribute->attr_label }}</td>
                                      <td>{{ $attribute->attr_field_type }}</td>
                                      <td>{{ $attribute->attr_field_order }}</td>
                                      <td>@if($attribute->attr_field_status == 1) <span class="badge badge-success">{{ Helper::translation(4581,$translate,'') }}</span> @else <span class="badge badge-danger">{{ Helper::translation(4584,$translate,'') }}</span> @endif</td>
                                      <td><a href="edit-attribute/{{ $attribute->attr_id }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i>&nbsp; {{ Helper::translation(4722,$translate,'') }}</a> 
                                      @if($demo_mode == 'on') 
                                      <a href="demo-mode" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;{{ Helper::translation(4725,$translate,'') }}</a>
                                      @else 
                                      <a href="attributes/{{ $attribute->attr_id }}" class="btn btn-danger btn-sm" onClick="return confirm('{{ Helper::translation(3903,$translate,'') }}?');"><i class="fa fa-trash"></i>&nbsp;{{ Helper::translation(4725,$translate,'') }}</a>@endif</td>
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
