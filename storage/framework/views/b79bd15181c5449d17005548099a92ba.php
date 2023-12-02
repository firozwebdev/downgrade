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
    <?php if(in_array('etemplate',$avilable)): ?>
    <div id="right-panel" class="right-panel">

        
                       <?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                       

        <div class="breadcrumbs">
            <div class="col-sm-8">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><?php echo e(Helper::translation('614ef9b134edc',$translate,'Edit Email Template')); ?> - <?php echo e($edit['template']->et_heading); ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <a href="<?php echo e(url('/admin/email-template')); ?>" class="btn btn-success btn-sm"><i class="fa fa-arrow-circle-left"></i> <?php echo e(Helper::translation(4764,$translate,'Back')); ?></a>
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


<?php if($errors->any()): ?>
    <div class="col-sm-12">
     <div class="alert  alert-danger alert-dismissible fade show" role="alert">
     <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      
         <?php echo e($error); ?>

      
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                            <strong class="card-title" v-if="headerText"><?php echo e(Helper::translation('614ef9cc1ab3f',$translate,'Short Code')); ?></strong>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-hover table-striped table-align-middle mb-0 edit-template">
                                <tbody>
                                    <?php /* Comment */ ?>
                                    <?php if($et_id == 2): ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{from_name}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(3987,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{from_email}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(3990,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{product_url}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(3993,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{comm_text}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(3996,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php /* Contact Us */ ?>
                                    <?php if($et_id == 3): ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{from_name}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(4020,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{from_email}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(4023,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{message_text}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(4005,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php /* Forget Password */ ?>
                                    <?php if($et_id == 4): ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{forgot_url}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(4092,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php /* Newsletter Signup */ ?>
                                    <?php if($et_id == 6): ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{activate_url}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(5097,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php /* Product Rating & Reviews */ ?>
                                    <?php if($et_id == 7): ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{from_name}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(4020,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{from_email}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(4023,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{rating}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(4410,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{rating_reason}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(4329,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{rating_comment}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(3996,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{product_url}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(3993,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php /* Refund Request Received */ ?>
                                    <?php if($et_id == 8): ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{from_name}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(4020,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{from_email}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(4023,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{ref_refund_reason}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(4353,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{ref_refund_comment}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(3996,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{product_url}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(3993,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php /* New Signup Email Verification */ ?>
                                    <?php if($et_id == 9): ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{register_url}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(4428,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{email}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(4422,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php /* Contact Support */ ?>
                                    <?php if($et_id == 10): ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{from_name}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(4020,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{from_email}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(4023,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{support_subject}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(4227,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{support_msg}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(4005,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{product_url}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(3993,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php /* Payment Refund Declined */ ?>
                                    <?php if($et_id == 11): ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{price}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(4548,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{currency}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(4779,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php /* Payment Refund Accepted */ ?>
                                    <?php if($et_id == 13): ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{price}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(4548,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{currency}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(4779,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php /* Item Update Notifications */ ?>
                                    <?php if($et_id == 15): ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{product_url}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(3993,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php /* Newsletter Updates */ ?>
                                    <?php if($et_id == 16): ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{news_heading}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(4227,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{news_content}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(5247,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php /* Payment Withdrawal Request Accepted */ ?>
                                    <?php if($et_id == 17): ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{wd_amount}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(4527,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{currency}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(4779,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php /* Subscription Upgrade */ ?>
                                    <?php if($et_id == 20): ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{user_subscr_type}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation('638882c5903e4',$translate,'Pack Name')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{subscr_date}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(4542,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{subscri_date}}') ?>
                                        </td>
                                        
                                        <td>
                                           <?php echo e(Helper::translation('63885c11c0675',$translate,'Duration')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{currency}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(4779,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{subscr_price}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(4290,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php /* Item Purchase Notifications */ ?>
                                    <?php if($et_id == 21): ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{final_amount}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(4548,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{currency}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(4779,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{from_name}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(4020,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{from_email}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(4023,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{purchased_token}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(4302,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php /* Subscription Renewal Notifications */ ?>
                                    <?php if($et_id == 23): ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{expired_date}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation('639091814cc55',$translate,'Expire On')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{pack_name}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation('638882c5903e4',$translate,'Pack Name')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{from_name}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(4020,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{from_email}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(4023,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{subscription_url}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation('63957fc457d36',$translate,'Subscription Url')); ?>

                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php /* Item Report Notifications */ ?>
                                    <?php if($et_id == 24): ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{from_name}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(4020,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{from_email}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(4023,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{product_name}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(4392,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{product_slug}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(3993,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{report_issue_type}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation('63f757e209c67',$translate,'Issue Type')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{report_subject}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(4227,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{report_message}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(4005,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <?php /* Redeem Voucher Notifications */ ?>
                                    <?php endif; ?>
                                    <?php if($et_id == 25): ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{voucher_code}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation('63e73ab00aba9',$translate,'Voucher Code')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{credits}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation('63ec885f34b0c',$translate,'Credits')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities('{{currency}}') ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo e(Helper::translation(4776,$translate,'')); ?>

                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                  </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                    <div class="col-md-12">
                       
                        
                        
                      
                        <div class="card">
                           <?php if($demo_mode == 'on'): ?>
                           <?php echo $__env->make('admin.demo-mode', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                           <?php else: ?>
                            <form action="<?php echo e(route('admin.edit-email-template')); ?>" method="post" id="setting_form" enctype="multipart/form-data">
                           <?php echo e(csrf_field()); ?>

                           <?php endif; ?>
                          
                           <div class="col-md-12">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                           
                                       <div class="form-group">
                                          <label for="site_logo" class="control-label mb-1"><?php echo e(Helper::translation(4227,$translate,'Subject')); ?> <span class="require">*</span></label>
                                                
                                            <input type="text" id="et_subject" name="et_subject" class="form-control"  value="<?php echo e($edit['template']->et_subject); ?>"  data-bvalidator="required" >
                                            
                                            </div>
                                            
                                    </div>
                                </div>

                            </div>
                            </div>
                            
                            
                            
                             <div class="col-md-6" style="display:none;">
                             
                             
                             <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                             <input type="hidden" name="et_status" value="1">
                             
                                          
                                        
                             
                             </div>
                                </div>

                            </div>
                             
                             
                             
                             </div>
                             
                             
                             <div class="col-md-12">
                             
                             
                             <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                             
                                           
                                                
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(Helper::translation(4005,$translate,'Message')); ?> <span class="require">*</span></label>
                                                <textarea name="et_content" id="summary-ckeditor" rows="6" class="form-control" data-bvalidator="required"><?php echo e(html_entity_decode($edit['template']->et_content)); ?></textarea>
                                            </div> 
                                            
                                           <input type="hidden" name="et_id" value="<?php echo e($et_id); ?>">
                             
                             
                             </div>
                                </div>

                            </div>
                             
                             
                             
                             </div>
                             
                             <div class="col-md-12 no-padding">
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

                     
                    
                    
                    </div>
                    

                </div>
            </div><!-- .animated -->
        </div>
        
        
        <!-- .content -->


    </div><!-- /#right-panel -->
    <?php else: ?>
    <?php echo $__env->make('admin.denied', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <!-- Right Panel -->


   <?php echo $__env->make('admin.javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


</body>

</html>
<?php /**PATH C:\Users\sabuz\Downloads\downgred latest\downgrade\resources\views/admin/edit-email-template.blade.php ENDPATH**/ ?>