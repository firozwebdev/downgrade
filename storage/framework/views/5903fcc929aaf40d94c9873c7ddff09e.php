<!DOCTYPE HTML>
<html lang="en">
<head>
    <title><?php echo e(__('Register')); ?> - <?php echo e($allsettings->site_title); ?></title>
    <?php echo $__env->make('meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if($allsettings->site_google_recaptcha == 1): ?>
        <?php echo RecaptchaV3::initJs(); ?>

    <?php endif; ?>
</head>
<body>
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="bg-position-center-top"
         style="background-image: url('<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_banner); ?>');">
    <div class="py-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
                        <li class="breadcrumb-item"><a class="text-nowrap" href="<?php echo e(URL::to('/')); ?>"><i
                                    class="dwg-home"></i><?php echo e(__('Home')); ?></a></li>
                        <li class="breadcrumb-item text-nowrap active" aria-current="page"><?php echo e(__('Register')); ?></li>
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
                <h1 class="h3 mb-0 text-white"><?php echo e(__('Register')); ?></h1>
            </div>
        </div>
    </div>
</section>
<div class="container py-4 py-lg-5 my-4">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card border-0 box-shadow">
                <div class="card-body">
                    <h2 class="h4 mb-3"><?php echo e(__('Create Your Account')); ?></h2>
                    <p class="font-size-sm text-muted mb-4"><?php echo e(__('Please fill the following fields with appropriate information to register form')); ?></p>
                    <form method="POST" action="<?php echo e(route('register')); ?>" id="login_form" class="needs-validation"
                          novalidate>
                        <?php echo csrf_field(); ?>
                        <div class="row">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="account-ln"><?php echo e(__('Firstname')); ?> <span
                                            class="required">*</span></label>
                                    <input id="username" type="text" name="firstname" class="form-control"
                                           placeholder="<?php echo e(__('Enter your Firstname')); ?>" value="<?php echo e(old('lastname')); ?>"
                                           data-bvalidator="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="account-fn"><?php echo e(__('Lastname')); ?> <span class="required">*</span></label>
                                    <input id="name" type="text" class="form-control" name="lastname"
                                           placeholder="<?php echo e(__('Enter your Lastname')); ?>" value="<?php echo e(old('lastname')); ?>"
                                           data-bvalidator="required" autocomplete="name" autofocus> <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="account-email"><?php echo e(__('Email Address')); ?> <span class="required">*</span></label>
                                    <input id="email" type="text" class="form-control" name="email"
                                           value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(__('Enter your email address')); ?>"
                                           autocomplete="email" data-bvalidator="email,required">
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="account-email"><?php echo e(__('Phone')); ?> <span class="required">*</span></label>
                                    <input id="email" type="text" class="form-control" name="phone"
                                           value="<?php echo e(old('phone')); ?>" placeholder="<?php echo e(__('Enter your Phone no.')); ?>"
                                           autocomplete="phone" data-bvalidator="phone,required">
                                    <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="account-ln"><?php echo e(__('Address')); ?> <span
                                            class="required">*</span></label>
                                    <input id="username" type="text" name="address" class="form-control"
                                           placeholder="<?php echo e(__('Enter your Address.')); ?>" value="<?php echo e(old('address')); ?>"
                                           data-bvalidator="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="account-pass"><?php echo e(__('Password')); ?> <span
                                            class="required">*</span></label>
                                    <div class="password-toggle">
                                        <input id="password" type="password" class="form-control" name="password"
                                               placeholder="<?php echo e(__('Enter your password')); ?>" autocomplete="new-password"
                                               data-bvalidator="required"><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                             <strong><?php echo e($message); ?></strong>

                                       </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        <label class="password-toggle-btn">
                                            <input class="custom-control-input" type="checkbox"><i
                                                class="dwg-eye password-toggle-indicator"></i><span
                                                class="sr-only"><?php echo e(__('Show password')); ?></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="account-confirm-pass"><?php echo e(__('Confirm Password')); ?> <span
                                            class="required">*</span></label>
                                    <div class="password-toggle">
                                        <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation"
                                               placeholder="<?php echo e(__('Enter your confirm password')); ?>"
                                               data-bvalidator="equal[password],required" autocomplete="new-password">
                                        <label class="password-toggle-btn">
                                            <input class="custom-control-input" type="checkbox"><i
                                                class="dwg-eye password-toggle-indicator"></i><span
                                                class="sr-only"><?php echo e(__('Show password')); ?></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <?php if($allsettings->site_google_recaptcha == 1): ?>
                                <div class="col-sm-12">
                                    <div
                                        class="form-group<?php echo e($errors->has('g-recaptcha-response') ? ' has-error' : ''); ?>">
                                        <div class="col-sm-12">
                                            <?php echo RecaptchaV3::field('register'); ?>

                                            <?php if($errors->has('g-recaptcha-response')): ?>
                                                <span class="help-block">
                                        <strong><?php echo e($errors->first('g-recaptcha-response')); ?></strong>
                                    </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="col-12">
                                <div class="d-flex flex-wrap justify-content-between align-items-center">
                                    <div class="custom-checkbox d-block">
                                        <a href="<?php echo e(URL::to('/login')); ?>"
                                           class="nav-link-inline font-size-sm"><?php echo e(__('Already have an account?')); ?></a>
                                    </div>
                                    <button class="btn btn-primary mt-3 mt-sm-0"
                                            type="submit"><?php echo e(__('Register')); ?></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH C:\Users\sabuz\Downloads\downgred latest\downgrade\resources\views/pages/register.blade.php ENDPATH**/ ?>