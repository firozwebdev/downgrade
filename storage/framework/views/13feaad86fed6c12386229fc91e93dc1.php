<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>

    <?php echo $__env->make('admin.stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>


   <?php echo $__env->make('admin.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Right Panel -->
    <?php if(in_array('dashboard',$avilable)): ?>
    <div id="right-panel" class="right-panel">


                       <?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="col-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <i class="fa fa-user bg-flat-color-5 p-3 font-2xl mr-3 float-left text-light"></i>
                    <div class="text-muted text-uppercase font-weight-bold font-xs small"><?php echo e(Helper::translation(4944,$translate,'Total Customers')); ?></div>
                    <div class="h5 text-secondary mb-0 mt-1"><?php echo e($total_customers); ?></div>
                </div>
                <div class="b-b-1 pt-3"></div>
                <hr>
                <div class="more-info pt-2" style="margin-bottom:-10px;">
                    <a class="font-weight-bold font-xs btn-block text-muted small" href="<?php echo e(url('/admin/customer')); ?>"><?php echo e(Helper::translation(4947,$translate,'View More')); ?> <i class="fa fa-angle-right float-right font-lg"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <i class="fa fa-file-text-o bg-info p-3 font-2xl mr-3 float-left text-light"></i>
                    <div class="text-muted text-uppercase font-weight-bold font-xs small"><?php echo e(Helper::translation(4950,$translate,'Total Pages')); ?></div>
                    <div class="h5 text-secondary mb-0 mt-1"><?php echo e($total_pages); ?></div>
                </div>
                <div class="b-b-1 pt-3"></div>
                <hr>
                <div class="more-info pt-2" style="margin-bottom:-10px;">
                    <a class="font-weight-bold font-xs btn-block text-muted small" href="<?php echo e(url('/admin/pages')); ?>"><?php echo e(Helper::translation(4947,$translate,'View More')); ?> <i class="fa fa-angle-right float-right font-lg"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <i class="fa fa-comments-o bg-warning p-3 font-2xl mr-3 float-left text-light"></i>
                    <div class="text-muted text-uppercase font-weight-bold font-xs small"><?php echo e(Helper::translation(4953,$translate,'Total Blog Post')); ?></div>
                    <div class="h5 text-secondary mb-0 mt-1"><?php echo e($total_post); ?></div>
                </div>
                <div class="b-b-1 pt-3"></div>
                <hr>
                <div class="more-info pt-2" style="margin-bottom:-10px;">
                    <a class="font-weight-bold font-xs btn-block text-muted small" href="<?php echo e(url('/admin/post')); ?>"><?php echo e(Helper::translation(4947,$translate,'View More')); ?> <i class="fa fa-angle-right float-right font-lg"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!--/.col-->
    <div class="col-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <i class="fa fa-location-arrow bg-danger p-3 font-2xl mr-3 float-left text-light"></i>
                    <div class="text-muted text-uppercase font-weight-bold font-xs small"><?php echo e(Helper::translation(4956,$translate,'Total Category')); ?></div>
                    <div class="h5 text-secondary mb-0 mt-1"><?php echo e($total_category); ?></div>
                </div>
                <div class="b-b-1 pt-3"></div>
                <hr>
                <div class="more-info pt-2" style="margin-bottom:-10px;">
                    <a class="font-weight-bold font-xs btn-block text-muted small" href="<?php echo e(url('/admin/category')); ?>"><?php echo e(Helper::translation(4947,$translate,'View More')); ?> <i class="fa fa-angle-right float-right font-lg"></i></a>
                </div>
            </div>
        </div>
    </div>



    <div class="col-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <i class="fa fa-shopping-cart bg-flat-color-4 p-3 font-2xl mr-3 float-left text-light"></i>
                    <div class="text-muted text-uppercase font-weight-bold font-xs small"><?php echo e(Helper::translation(4959,$translate,'Total Product Items')); ?></div>
                    <div class="h5 text-secondary mb-0 mt-1"><?php echo e($total_product); ?></div>
                </div>
                <div class="b-b-1 pt-3"></div>
                <hr>
                <div class="more-info pt-2" style="margin-bottom:-10px;">
                    <a class="font-weight-bold font-xs btn-block text-muted small" href="<?php echo e(url('/admin/products')); ?>"><?php echo e(Helper::translation(4947,$translate,'View More')); ?> <i class="fa fa-angle-right float-right font-lg"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!--/.col-->
    <div class="col-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <i class="fa fa-shopping-cart bg-flat-color-3 p-3 font-2xl mr-3 float-left text-light"></i>
                    <div class="text-muted text-uppercase font-weight-bold font-xs small"><?php echo e(Helper::translation(4962,$translate,'Total Orders')); ?></div>
                    <div class="h5 text-secondary mb-0 mt-1"><?php echo e($total_order); ?></div>
                </div>
                <div class="b-b-1 pt-3"></div>
                <hr>
                <div class="more-info pt-2" style="margin-bottom:-10px;">
                    <a class="font-weight-bold font-xs btn-block text-muted small" href="<?php echo e(url('/admin/orders')); ?>"><?php echo e(Helper::translation(4947,$translate,'View More')); ?> <i class="fa fa-angle-right float-right font-lg"></i></a>
                </div>
            </div>
        </div>
    </div>
   <?php if($allsettings->site_refund_display == 1): ?>
    <div class="col-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <i class="fa fa-money bg-flat-color-2 p-3 font-2xl mr-3 float-left text-light"></i>
                    <div class="text-muted text-uppercase font-weight-bold font-xs small"><?php echo e(Helper::translation(4965,$translate,'Pending Refund Request')); ?></div>
                    <div class="h5 text-secondary mb-0 mt-1"><?php echo e($total_refund); ?></div>
                </div>
                <div class="b-b-1 pt-3"></div>
                <hr>
                <div class="more-info pt-2" style="margin-bottom:-10px;">
                    <a class="font-weight-bold font-xs btn-block text-muted small" href="<?php echo e(url('/admin/refund')); ?>"><?php echo e(Helper::translation(4947,$translate,'View More')); ?> <i class="fa fa-angle-right float-right font-lg"></i></a>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if($allsettings->site_withdrawal_display == 1): ?>
    <div class="col-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <i class="fa fa-money bg-flat-color-1 p-3 font-2xl mr-3 float-left text-light"></i>
                    <div class="text-muted text-uppercase font-weight-bold font-xs small"><?php echo e(Helper::translation(4968,$translate,'Pending Withdrawal')); ?></div>
                    <div class="h5 text-secondary mb-0 mt-1"><?php echo e($total_withdrawal); ?></div>
                </div>
                <div class="b-b-1 pt-3"></div>
                <hr>
                <div class="more-info pt-2" style="margin-bottom:-10px;">
                    <a class="font-weight-bold font-xs btn-block text-muted small" href="<?php echo e(url('/admin/withdrawal')); ?>"><?php echo e(Helper::translation(4947,$translate,'View More')); ?> <i class="fa fa-angle-right float-right font-lg"></i></a>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="content mt-3">
            <div class="col-sm-8 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3"><?php echo e(Helper::translation(4971,$translate,'Order Sales')); ?> </h4>
                                <canvas id="team-chart"></canvas>
                            </div>
                        </div>
                    </div>
          <div class="col-sm-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3"><?php echo e(Helper::translation(4974,$translate,'Products')); ?> </h4>
                                <canvas id="pieChart"></canvas>
                            </div>
                        </div><!-- /# card -->
                    </div>
        </div>
        <div class="col-md-12">

                <form action="<?php echo e(route('admin.add-country')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>


                    <div class="card">


                        <div class="col-md-6">

                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">


                                        <div class="form-group">
                                            <label for="name"
                                                   class="control-label mb-1"><?php echo e(Helper::translation(4020,$translate,'Name')); ?>

                                                <span class="require">*</span></label>
                                            <input id="country_name" name="country_name" type="text"
                                                   class="form-control" required>
                                        </div>


                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> <?php echo e(Helper::translation(4572,$translate,'Submit')); ?>

                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> <?php echo e(Helper::translation(4575,$translate,'Reset')); ?>

                            </button>
                        </div>


                    </div>


                </form>

        </div>


         <!-- .content -->
    </div><!-- /#right-panel -->
    <?php else: ?>
    <?php echo $__env->make('admin.denied', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <!-- Right Panel -->

    <?php echo $__env->make('admin.javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script type="text/javascript">
	( function ( $ ) {
    "use strict";


    var ctx = document.getElementById( "team-chart" );
    ctx.height = 150;
    var myChart = new Chart( ctx, {
        type: 'line',
        data: {
            labels: [ "<?php echo e($sixth_day); ?>", "<?php echo e($fifth_day); ?>", "<?php echo e($fourth_day); ?>", "<?php echo e($third_day); ?>", "<?php echo e($second_day); ?>", "<?php echo e($first_day); ?>", "<?php echo e($today); ?>" ],
            type: 'line',
            defaultFontFamily: 'Montserrat',
            datasets: [ {
                data: [ <?php echo e($view7); ?> , <?php echo e($view6); ?>, <?php echo e($view5); ?>, <?php echo e($view4); ?> , <?php echo e($view3); ?> , <?php echo e($view2); ?> , <?php echo e($view1); ?> ],
                label: "sale",
                backgroundColor: 'rgba(0,103,255,.15)',
                borderColor: 'rgba(0,103,255,0.5)',
                borderWidth: 3.5,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: 'rgba(0,103,255,0.5)',
                    }, ]
        },
        options: {
            responsive: true,
            tooltips: {
                mode: 'index',
                titleFontSize: 12,
                titleFontColor: '#000',
                bodyFontColor: '#000',
                backgroundColor: '#fff',
                titleFontFamily: 'Montserrat',
                bodyFontFamily: 'Montserrat',
                cornerRadius: 3,
                intersect: false,
            },
            legend: {
                display: false,
                position: 'top',
                labels: {
                    usePointStyle: true,
                    fontFamily: 'Montserrat',
                },


            },
            scales: {
                xAxes: [ {
                    display: true,
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    scaleLabel: {
                        display: false,
                        labelString: 'Month'
                    }
                        } ],
                yAxes: [ {
                    display: true,
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'Sales'
                    }
                        } ]
            },
            title: {
                display: false,
            }
        }
    } );

	var ctx = document.getElementById( "pieChart" );
    ctx.height = 300;
    var myChart = new Chart( ctx, {
        type: 'pie',
        data: {
            datasets: [ {
                data: [ <?php echo e($approved); ?>, <?php echo e($unapproved); ?> ],
                backgroundColor: [
                                    "rgba(6, 163, 61, 1)",
                                    "rgba(226, 27, 26, 1)"


                                ],
                hoverBackgroundColor: [
                                    "rgba(6, 163, 61, 0.7)",
                                    "rgba(226, 27, 26, 0.7)"


                                ]

                            } ],
            labels: [
                            "Active",
                            "InActive"

                        ]
        },
        options: {
            responsive: true
        }
    } );


} )( jQuery );

</script>

</body>

</html>
<?php /**PATH C:\Users\sabuz\Downloads\downgred latest\downgrade\resources\views/admin/index.blade.php ENDPATH**/ ?>