<?php echo $__env->make('version', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="author" content="<?php echo e($allsettings->site_title); ?>">
<?php if($allsettings->site_favicon != ''): ?>
<link rel="apple-touch-icon" href="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_favicon); ?>">
<link rel="shortcut icon" href="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_favicon); ?>">
<?php endif; ?>
<link rel="stylesheet" href="<?php echo e(URL::to('resources/views/theme/validate/themes/red/red.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(URL::to('resources/views/theme/pagination/pagination.css')); ?>">
<link rel="stylesheet" media="screen" href="<?php echo e(URL::to('resources/views/theme/css/vendor.min.css')); ?>">
<link rel="stylesheet" media="screen" href="<?php echo e(URL::to('resources/views/theme/css/theme.min.css')); ?>">
<?php echo $__env->make('dynamic', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<link type="text/css" href="<?php echo e(URL::to('resources/views/theme/countdown/jquery.countdown.css?v=1.0.0.0')); ?>" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('resources/views/theme/video/video.css')); ?>">
<link href="<?php echo e(URL::to('resources/views/theme/cookie/cookiealert.css')); ?>" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="<?php echo e(URL::to('resources/views/theme/animate/aos.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(URL::to('resources/views/theme/autosearch/jquery-ui.css')); ?>">
<link rel="stylesheet" href="<?php echo e(URL::to('resources/views/theme/css/font-awesome.min.css')); ?>">
<?php if($translate == 'ar'): ?>
<link rel="stylesheet" href="<?php echo e(URL::to('resources/views/theme/css/rtl.css')); ?>" />
<?php endif; ?>
<?php if($allsettings->google_ads == 1): ?>
<!-- google ads -->
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<!-- google ads -->
<?php endif; ?>
<?php $config = (new \LaravelPWA\Services\ManifestService)->generate(); echo $__env->make( 'laravelpwa::meta' , ['config' => $config])->render(); ?><?php /**PATH C:\Users\sabuz\Downloads\downgred latest\downgrade\resources\views/style.blade.php ENDPATH**/ ?>