<?php if($message = Session::get('success')): ?>
<div class="toast-container toast-top-center">
      <div class="toast mb-3" id="cart-toast-success" data-delay="5000" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-success text-white"><i class="dwg-check-circle mr-2"></i>
          <h6 class="font-size-sm text-white mb-0 mr-auto"><?php echo e(Helper::translation(4053,$translate,'')); ?>!</h6>
          <button class="close text-white ml-2 mb-1" type="button" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="toast-body"><?php echo e($message); ?></div>
      </div>
    </div>
<?php endif; ?> 
<?php if($message = Session::get('error')): ?>
<div class="toast-container toast-top-center">
      <div class="toast mb-3" id="cart-toast-error" data-delay="5000" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-danger text-white"><i class="dwg-close-circle mr-2"></i>
          <h6 class="font-size-sm text-white mb-0 mr-auto"><?php echo e(Helper::translation(4056,$translate,'')); ?>!</h6>
          <button class="close text-white ml-2 mb-1" type="button" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="toast-body text-danger"><?php echo e($message); ?></div>
      </div>
    </div>
<?php endif; ?>
<?php if(!$errors->isEmpty()): ?>
<div class="toast-container toast-top-center">
      <div class="toast mb-3" id="cart-toast-error" data-delay="5000" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-danger text-white"><i class="dwg-close-circle mr-2"></i>
          <h6 class="font-size-sm text-white mb-0 mr-auto"><?php echo e(Helper::translation(4056,$translate,'')); ?>!</h6>
          <button class="close text-white ml-2 mb-1" type="button" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="toast-body text-danger">
        <?php echo e($error); ?>

        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
<?php endif; ?>
<footer class="bg-dark pt-5">
      <div class="container pt-2 pb-3">
        <div class="row">
          <div <?php if($allsettings->site_newsletter_display == 1): ?> class="col-md-4 text-center text-md-left mb-4" <?php else: ?> class="col-md-6 text-center text-md-left mb-4" <?php endif; ?>>
            <div class="text-nowrap mb-3">
            <a class="d-inline-block align-middle mt-n2 mr-2" href="<?php echo e(URL::to('/')); ?>">
            <?php if($allsettings->site_logo != ''): ?>
            <img class="d-block" width="180" src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_logo); ?>" alt="<?php echo e($allsettings->site_title); ?>"/>
            <?php endif; ?>
            </a>
            </div>
            <h6 class="pr-3 mr-3"><span class="text-primary"><?php if($allsettings->item_sold_count == ""): ?><?php echo e($count_sold); ?><?php else: ?><?php echo e($allsettings->item_sold_count); ?><?php endif; ?> </span><span class="font-weight-normal text-white"><?php echo e(Helper::translation(4059,$translate,'')); ?></span></h6>
            <h6 class="mr-3"><span class="text-primary"><?php if($allsettings->members_count == ""): ?><?php echo e($total_customer); ?><?php else: ?><?php echo e($allsettings->members_count); ?><?php endif; ?> </span><span class="font-weight-normal text-white"><?php echo e(Helper::translation(4062,$translate,'')); ?></span></h6>
            <div class="widget mt-4 text-md-nowrap text-center text-md-left">
            <?php if($allsettings->facebook_url != ''): ?>
            <a class="social-btn sb-light sb-facebook mr-2 mb-2" href="<?php echo e($allsettings->facebook_url); ?>" target="_blank"><i class="dwg-facebook"></i></a>
            <?php endif; ?>
            <?php if($allsettings->twitter_url != ''): ?>
            <a class="social-btn sb-light sb-twitter mr-2 mb-2" href="<?php echo e($allsettings->twitter_url); ?>" target="_blank"><i class="dwg-twitter"></i></a>
            <?php endif; ?>
            <?php if($allsettings->pinterest_url != ''): ?>
            <a class="social-btn sb-light sb-pinterest mr-2 mb-2" href="<?php echo e($allsettings->pinterest_url); ?>" target="_blank"><i class="dwg-pinterest"></i></a>
            <?php endif; ?>
            <?php if($allsettings->gplus_url != ''): ?>
            <a class="social-btn sb-light sb-dribbble mr-2 mb-2" href="<?php echo e($allsettings->gplus_url); ?>" target="_blank"><i class="fa fa-whatsapp"></i></a>
            <?php endif; ?>
            <?php if($allsettings->instagram_url != ''): ?>
            <a class="social-btn sb-light sb-behance mr-2 mb-2" href="<?php echo e($allsettings->instagram_url); ?>" target="_blank"><i class="dwg-instagram"></i></a>
            <?php endif; ?>
            </div>
          </div>
          <!-- Mobile dropdown menu -->
          <div class="col-12 d-md-none text-center mb-4 pb-2">
            <div class="btn-group dropdown d-block mx-auto mb-3">
              <button class="btn btn-outline-light border-light dropdown-toggle" type="button" data-toggle="dropdown"><?php echo e(Helper::translation(3870,$translate,'')); ?></button>
              <ul class="dropdown-menu">
                <?php $__currentLoopData = $footer_menu['category']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a class="dropdown-item" href="<?php echo e(URL::to('/shop/category')); ?>/<?php echo e($menu->category_slug); ?>"><?php echo e($menu->category_name); ?></a></li> 
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
            </div>
            <div class="btn-group dropdown d-block mx-auto">
              <button class="btn btn-outline-light border-light dropdown-toggle" type="button" data-toggle="dropdown"><?php echo e(Helper::translation(4065,$translate,'')); ?></button>
              <ul class="dropdown-menu">
                <?php if($allsettings->site_blog_display == 1): ?>
                <li><a class="dropdown-item" href="<?php echo e(URL::to('/blog')); ?>"><?php echo e(Helper::translation(3867,$translate,'')); ?></a></li>
                <?php endif; ?>
                <li><a class="dropdown-item" href="<?php echo e(URL::to('/shop')); ?>"><?php echo e(Helper::translation(4068,$translate,'')); ?></a></li>
                <li><a class="dropdown-item" href="<?php echo e(URL::to('/my-favourite')); ?>"><?php echo e(Helper::translation(4038,$translate,'')); ?></a></li>
                <li><a class="dropdown-item" href="<?php echo e(URL::to('/my-purchases')); ?>"><?php echo e(Helper::translation(4035,$translate,'')); ?></a></li>
                <li><a class="dropdown-item" href="<?php echo e(URL::to('/contact')); ?>"><?php echo e(Helper::translation(3999,$translate,'')); ?></a></li>
              </ul>
            </div>
          </div>
          <!-- Desktop menu -->
          <div <?php if($allsettings->site_newsletter_display == 1): ?> class="col-md-2 d-none d-md-block text-center text-md-left mb-4" <?php else: ?> class="col-md-3 d-none d-md-block text-center text-md-left mb-4" <?php endif; ?>>
            <div class="widget widget-links widget-light pb-2">
              <h3 class="widget-title text-light"><?php echo e(Helper::translation(3870,$translate,'')); ?></h3>
              <ul class="widget-list">
                <?php $__currentLoopData = $footer_menu['category']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="widget-list-item"><a class="widget-list-link" href="<?php echo e(URL::to('/shop/category')); ?>/<?php echo e($menu->category_slug); ?>"><?php echo e($menu->category_name); ?></a></li> 
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
            </div>
          </div>
          <div <?php if($allsettings->site_newsletter_display == 1): ?> class="col-md-2 d-none d-md-block text-center text-md-left mb-4" <?php else: ?> class="col-md-3 d-none d-md-block text-center text-md-left mb-4" <?php endif; ?>>
            <div class="widget widget-links widget-light pb-2">
              <h3 class="widget-title text-light"><?php echo e(Helper::translation(4065,$translate,'')); ?></h3>
              <ul class="widget-list">
                <?php if($allsettings->site_blog_display == 1): ?>
                <li class="widget-list-item"><a class="widget-list-link" href="<?php echo e(URL::to('/blog')); ?>"><?php echo e(Helper::translation(3867,$translate,'')); ?></a></li>
                <?php endif; ?>
                <li class="widget-list-item"><a class="widget-list-link" href="<?php echo e(URL::to('/shop')); ?>"><?php echo e(Helper::translation(4068,$translate,'')); ?></a></li>
                <li class="widget-list-item"><a class="widget-list-link" href="<?php echo e(URL::to('/my-favourite')); ?>"><?php echo e(Helper::translation(4038,$translate,'')); ?></a></li>
                <li class="widget-list-item"><a class="widget-list-link" href="<?php echo e(URL::to('/my-purchases')); ?>"><?php echo e(Helper::translation(4035,$translate,'')); ?></a></li>
                <li class="widget-list-item"><a class="widget-list-link" href="<?php echo e(URL::to('/contact')); ?>"><?php echo e(Helper::translation(3999,$translate,'')); ?></a></li>
              </ul>
              </div>
          </div>
          <?php if($allsettings->site_newsletter_display == 1): ?>
          <div class="col-md-4">
            <div class="widget pb-2 mb-4">
              <h3 class="widget-title text-light pb-1"><?php echo e(Helper::translation(5097,$translate,'')); ?></h3>
              <form class="validate" action="<?php echo e(route('newsletter')); ?>" method="post" name="mc-embedded-subscribe-form" id="footer_form" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <div class="input-group input-group-overlay flex-nowrap">
                  <div class="input-group-prepend-overlay"><span class="input-group-text text-muted font-size-base"><i class="dwg-mail"></i></span></div>
                  <input class="form-control prepended-form-control" type="email" id="mce-EMAIL" value="" placeholder="<?php echo e(Helper::translation(4077,$translate,'')); ?>" data-bvalidator="required" name="news_email">
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="submit" name="subscribe" id="mc-embedded-subscribe"><?php echo e(Helper::translation('61ee972444aa2',$translate,'Subscribe')); ?></button>
                  </div>
                </div>
                <small class="form-text text-light opacity-50" id="mc-helper"><?php echo e(Helper::translation('61ee97a37997e',$translate,'Want more script,themes & templates? Subscribe to our mailing list to receive an update when new items arrive!')); ?></small>
                <div class="subscribe-status"></div>
              </form>
            </div>
          </div>
          <?php endif; ?>
        </div>
      </div>
      <div class="pt-4 bg-darker">
        <div class="container">
          <div class="d-md-flex justify-content-between">
            <div class="pb-4 font-size-xs text-light opacity-50 text-center text-md-left"><?php echo html_entity_decode($allsettings->site_copyright); ?> <?php echo e($allsettings->site_title); ?></div>
            <div class="widget widget-links widget-light pb-4">
              <ul class="widget-list d-flex flex-wrap justify-content-center justify-content-md-start">
              <?php $__currentLoopData = $footerpages['pages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pages): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="widget-list-item ml-4"><a class="widget-list-link font-size-ms" href="<?php echo e(URL::to('/')); ?>/<?php echo e($pages->page_slug); ?>"><?php echo e($pages->page_title); ?></a></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <?php if($allsettings->cookie_popup == 1): ?>
    <div class="alert text-center cookiealert" role="alert">
        <?php echo e($allsettings->cookie_popup_text); ?>

        <button type="button" class="btn btn-primary btn-sm acceptcookies" aria-label="Close">
            <?php echo e($allsettings->cookie_popup_button); ?>

        </button>
    </div>
    <?php endif; ?>
    <a class="btn-scroll-top" href="#top" data-scroll><span class="btn-scroll-top-tooltip text-muted font-size-sm mr-2"><?php echo e(Helper::translation(4071,$translate,'')); ?></span><i class="btn-scroll-top-icon dwg-arrow-up"></i></a><?php /**PATH C:\Users\sabuz\Downloads\downgred latest\downgrade\resources\views/footer.blade.php ENDPATH**/ ?>