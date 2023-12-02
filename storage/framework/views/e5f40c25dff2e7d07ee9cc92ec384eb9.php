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
    <?php if(in_array('subscription',$avilable)): ?>
    <?php if($allsettings->subscription_mode == 1): ?>
    <div id="right-panel" class="right-panel">

        
                       <?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                       

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><?php echo e(Helper::translation('6388592288601',$translate,'Subscription')); ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <a href="<?php echo e(url('/admin/add-subscription')); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> <?php echo e(Helper::translation('63885b775d75c',$translate,'Add Pack')); ?></a>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        
       
        
        
         <?php if(session('success')): ?>
    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
<?php endif; ?>
<?php if(session('error')): ?>
    <div class="col-sm-12">
        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
            <?php echo e(session('error')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
<?php endif; ?>
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><?php echo e(Helper::translation('6388592288601',$translate,'Subscription')); ?></strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th><?php echo e(Helper::translation(4713,$translate,'Sno')); ?></th>
                                            <th><?php echo e(Helper::translation(4020,$translate,'')); ?></th>
                                            <th><?php echo e(Helper::translation(4290,$translate,'')); ?></th>
                                            <th><?php echo e(Helper::translation('63885c11c0675',$translate,'Duration')); ?></th>
                                            <th><?php echo e(Helper::translation(4590,$translate,'')); ?></th>
                                            <th><?php echo e(Helper::translation(4551,$translate,'')); ?></th>
                                            <th><?php echo e(Helper::translation(4719,$translate,'')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; ?>
                                    <?php $__currentLoopData = $subscription['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($no); ?></td>
                                            <td width="200"><?php echo e($subscription->subscr_name); ?> </td>
                                           <td><?php echo e($setting['setting']->site_currency_symbol); ?><?php echo e($subscription->subscr_price); ?> </td>
                                           <td><?php if($subscription->subscr_duration == '1000 Year'): ?><?php echo e(Helper::translation('639192602d89b',$translate,'Life Time')); ?><?php else: ?><?php echo e($subscription->subscr_duration); ?><?php endif; ?></td>
                                           <td><?php echo e($subscription->subscr_order); ?> </td>
                                            <td><?php if($subscription->subscr_status == 1): ?> <span class="badge badge-success"><?php echo e(Helper::translation(4581,$translate,'')); ?></span> <?php else: ?> <span class="badge badge-danger"><?php echo e(Helper::translation(4584,$translate,'')); ?></span> <?php endif; ?></td>
                                            <td><a href="edit-subscription/<?php echo e($subscription->subscr_id); ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i>&nbsp; <?php echo e(Helper::translation(4722,$translate,'')); ?></a> 
                                            <?php if($demo_mode == 'on'): ?> 
                                            <a href="demo-mode" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;<?php echo e(Helper::translation(4725,$translate,'')); ?></a>
                                            <?php else: ?> 
                                            <a href="subscription/<?php echo e($subscription->subscr_id); ?>" class="btn btn-danger btn-sm" onClick="return confirm('<?php echo e(Helper::translation(3903,$translate,'')); ?>?');"><i class="fa fa-trash"></i>&nbsp;<?php echo e(Helper::translation(4725,$translate,'')); ?></a><?php endif; ?></td>
                                        </tr>
                                        
                                        <?php $no++; ?>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

 
                </div>
               
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->
    <?php else: ?>
    <?php echo $__env->make('admin.404', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php else: ?>
    <?php echo $__env->make('admin.denied', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <!-- Right Panel -->


   <?php echo $__env->make('admin.javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


</body>

</html>
<?php /**PATH C:\Users\sabuz\Downloads\downgred latest\downgrade\resources\views/admin/subscription.blade.php ENDPATH**/ ?>