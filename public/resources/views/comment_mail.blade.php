<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ Helper::translation(3984,$translate,'') }}</title>
</head>
<body class="preload dashboard-upload">
        <div class="dashboard_contents">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="dashboard_title_area">
                            <div class="pull-left">
                                <div class="dashboard__title">
                                    <h2>{{ Helper::translation(3984,$translate,'') }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                <!-- end /.row -->
                <div class="row">
                    <div class="col-lg-8 col-md-7">
                        <p><strong> {{ Helper::translation(3987,$translate,'') }}</strong> {{ $from_name }}</p>   
                        <p><strong> {{ Helper::translation(3990,$translate,'') }}</strong> {{ $from_email }}</p>
                        <p><strong> {{ Helper::translation(3993,$translate,'') }}</strong> <a href="{{ $product_url }}">{{ $product_url }}</a></p>
                        <p><strong> {{ Helper::translation(3996,$translate,'') }}</strong> {{ $comm_text }}</p>   
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>