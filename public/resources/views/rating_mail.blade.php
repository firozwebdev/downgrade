<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ Helper::translation(4407,$translate,'') }}</title>
</head>
<body class="preload dashboard-upload">
<div class="dashboard_contents">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="dashboard_title_area">
                            <div class="pull-left">
                                <div class="dashboard__title">
                                    <h2>{{ Helper::translation(4407,$translate,'') }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                <!-- end /.row -->
                <div class="row">
                    <div class="col-lg-8 col-md-7">
                        <p><strong> {{ Helper::translation(4020,$translate,'') }} </strong> {{ $from_name }}</p>   
                        <p><strong> {{ Helper::translation(4023,$translate,'') }} </strong> {{ $from_email }}</p>
                        <p><strong> {{ Helper::translation(4410,$translate,'') }} </strong> {{ $rating }} Stars</p>  
                        <p><strong> {{ Helper::translation(4329,$translate,'') }} </strong> {{ $rating_reason }}</p>
                        <p><strong> {{ Helper::translation(3996,$translate,'') }} </strong> {{ $rating_comment }}</p>
                        <p><strong> {{ Helper::translation(4413,$translate,'') }}: </strong> <a href="{{ $product_url }}">{{ $product_url }}</a></p>   
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>