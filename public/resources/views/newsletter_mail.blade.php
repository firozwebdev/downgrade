<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ Helper::translation(5097,$translate,'') }}</title>
</head>
<body class="preload dashboard-upload">
<div class="dashboard_contents">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="dashboard_title_area">
                            <div class="pull-left">
                                <div class="dashboard__title">
                                    <h2>{{ Helper::translation(5097,$translate,'') }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                <!-- end /.row -->
                <div class="row">
                    <div class="col-lg-8 col-md-7">
                        <p>{{ Helper::translation('61ee9ad86b0cc',$translate,'You are receiving this email newsletter subscription request') }}</p>
                        <p>{{ Helper::translation('61ee9ae489544',$translate,'Please confirm to this link') }} <a href="{{ $activate_url }}">{{ $activate_url }}</a> {{ Helper::translation('61ee9af59fbd8',$translate,'to activate your email subscription.') }}
                    </div>
                </div>
            </div>
         </div>
     </section>
</body>
</html>