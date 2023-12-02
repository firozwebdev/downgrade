<header class="bg-light box-shadow-sm navbar-sticky">
      <!-- Topbar-->
      <?php if($allsettings->site_header_top_bar == 1): ?>
      <div class="topbar topbar-dark bg-dark">
        <div class="container">
          <div>
            <?php if($allsettings->site_google_translate == 1): ?>
            <div class="topbar-text dropdown disable-autohide"><a class="topbar-link dropdown-toggle" href="javascript:void(0);" data-toggle="dropdown"><?php echo e($language_title); ?></a>
              <ul class="dropdown-menu">
                <?php $__currentLoopData = $languages['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                <li><a class="dropdown-item pb-1" href="<?php echo e(URL::to('/translate')); ?>/<?php echo e($language->language_code); ?>"><?php echo e($language->language_name); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
            </div>
            <?php endif; ?>
            <div class="topbar-text text-nowrap d-none d-md-inline-block border-left border-light pl-3 ml-3"></div>
            </div>
        <div class="topbar-text dropdown d-md-none ml-auto"><a class="topbar-link dropdown-toggle" href="#" data-toggle="dropdown"><?php echo e(Helper::translation(3999,$translate,'')); ?><?php if($allsettings->site_blog_display == 1): ?> / <?php echo e(Helper::translation(3867,$translate,'')); ?><?php endif; ?></a>
            <ul class="dropdown-menu dropdown-menu-right">
              <li><a class="dropdown-item" href="<?php echo e(URL::to('/contact')); ?>"><i class="dwg-support text-muted mr-2"></i><?php echo e(Helper::translation(3999,$translate,'')); ?></a></li>
              <?php if($allsettings->site_blog_display == 1): ?>
              <li><a class="dropdown-item" href="<?php echo e(URL::to('/blog')); ?>"><i class="dwg-image text-muted mr-2"></i><?php echo e(Helper::translation(3867,$translate,'')); ?></a></li>
              <?php endif; ?>
            </ul>
          </div>
          <div class="d-none d-md-block ml-3 text-nowrap">
          <a class="topbar-link ml-3 pl-3 border-left border-light d-none d-md-inline-block" href="<?php echo e(URL::to('/contact')); ?>"><i class="dwg-support mt-n1"></i><?php echo e(Helper::translation(3999,$translate,'')); ?></a>
          <?php if($allsettings->site_blog_display == 1): ?>
          <a class="topbar-link ml-3 border-left border-light pl-3 d-none d-md-inline-block" href="<?php echo e(URL::to('/blog')); ?>"><i class="dwg-image mt-n1"></i><?php echo e(Helper::translation(3867,$translate,'')); ?></a>
          <?php endif; ?>
          </div>
         </div> 
      </div>
      <?php endif; ?>
      <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
      <div class="navbar-sticky">
        <div class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container">
          <?php if($allsettings->site_logo != ''): ?>
          <a class="navbar-brand d-none d-sm-block mr-4 order-lg-1" href="<?php echo e(URL::to('/')); ?>" style="min-width: 7rem;">
             <img width="200" src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_logo); ?>" alt="<?php echo e($allsettings->site_title); ?>"/>
          </a>
          <?php endif; ?>
          <?php if($allsettings->site_favicon != ''): ?>
          <a class="navbar-brand d-sm-none mr-2 order-lg-1" href="<?php echo e(URL::to('/')); ?>" style="min-width: 4.625rem;">
             <img width="74" src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_favicon); ?>" alt="<?php echo e($allsettings->site_title); ?>"/>
          </a>
          <?php endif; ?>
            <div class="navbar-toolbar d-flex align-items-center order-lg-3">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"><span class="navbar-toggler-icon"></span></button><a class="navbar-tool d-none d-lg-flex" href="#searchBox" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="searchBox"><span class="navbar-tool-tooltip"><?php echo e(Helper::translation(4104,$translate,'')); ?></span>
                <div class="navbar-tool-icon-box"><i class="navbar-tool-icon dwg-search"></i></div></a>
                <a class="navbar-tool d-none d-lg-flex" href="<?php echo e(url('/my-favourite')); ?>"><span class="navbar-tool-tooltip"><?php echo e(Helper::translation(4107,$translate,'')); ?></span>
                <div class="navbar-tool-icon-box"><i class="navbar-tool-icon dwg-heart"></i></div></a>
                <?php if(Auth::guest()): ?>
                <a class="navbar-tool ml-1 mr-n1" href="<?php echo e(URL::to('/login')); ?>"><span class="navbar-tool-tooltip"><?php echo e(Helper::translation(4029,$translate,'')); ?></span>
                <div class="navbar-tool-icon-box"><i class="navbar-tool-icon dwg-user"></i></div></a>
                <?php endif; ?>
                <?php if(Auth::check()): ?>
                <div class="navbar-tool dropdown ml-2">
                <a class="navbar-tool-icon-box border dropdown-toggle" <?php if(Auth::user()->id == 1): ?> href="<?php echo e(url('/admin')); ?>" target="_blank" <?php else: ?> href="<?php echo e(url('/my-profile')); ?>" <?php endif; ?>>         <?php if(!empty(Auth::user()->user_photo)): ?>
                <img width="32" src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e(Auth::user()->user_photo); ?>" alt="<?php echo e(Auth::user()->name); ?>"/>
                <?php else: ?>
                <img src="<?php echo e(url('/')); ?>/public/img/no-user.png" alt="<?php echo e(Auth::user()->name); ?>">
                <?php endif; ?>
                </a>
                <a class="navbar-tool-text ml-n1" <?php if(Auth::user()->id == 1): ?> href="<?php echo e(url('/admin')); ?>" target="_blank" <?php else: ?> href="<?php echo e(url('/my-profile')); ?>" <?php endif; ?>>
                <small><?php echo e(Auth::user()->name); ?></small><?php echo e($allsettings->site_currency_symbol); ?><?php echo e(Auth::user()->earnings); ?>

                </a>
                <div class="dropdown-menu dropdown-menu-right" style="min-width: 14rem;">
                <?php if(Auth::user()->id != 1): ?>
                <a class="dropdown-item d-flex align-items-center" href="<?php echo e(url('/my-profile')); ?>"><i class="dwg-settings opacity-60 mr-2"></i><?php echo e(Helper::translation(4032,$translate,'')); ?></a>
                <a class="dropdown-item d-flex align-items-center" href="<?php echo e(url('/my-purchases')); ?>"><i class="dwg-basket opacity-60 mr-2"></i><?php echo e(Helper::translation(4035,$translate,'')); ?></a>
                <a class="dropdown-item d-flex align-items-center" href="<?php echo e(url('/my-favourite')); ?>"><i class="dwg-heart opacity-60 mr-2"></i><?php echo e(Helper::translation(4038,$translate,'')); ?></a>
                <a class="dropdown-item d-flex align-items-center" href="<?php echo e(URL::to('/redeem-voucher')); ?>"><i class="dwg-gift opacity-60 mr-2"></i><?php echo e(Helper::translation('63ecc117b626d',$translate,'Redeem Voucher')); ?></a>
                <a class="dropdown-item d-flex align-items-center" href="<?php echo e(URL::to('/my-referral')); ?>"><i class="dwg-share opacity-60 mr-2"></i><?php echo e(Helper::translation('63fdeb0739ef8',$translate,'My Referral')); ?></a>
                <?php if($allsettings->site_withdrawal_display == 1): ?>
                <a class="dropdown-item d-flex align-items-center" href="<?php echo e(url('/withdrawal')); ?>"><i class="dwg-currency-exchange opacity-60 mr-2"></i><?php echo e(Helper::translation(4041,$translate,'')); ?></a>
                <?php endif; ?>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item d-flex align-items-center" href="<?php echo e(url('/logout')); ?>"><i class="dwg-sign-out opacity-60 mr-2"></i><?php echo e(Helper::translation(4044,$translate,'')); ?></a>
                <?php endif; ?>
                <?php if(Auth::user()->id == 1): ?>
                <a class="dropdown-item d-flex align-items-center" href="<?php echo e(url('/admin')); ?>"><i class="dwg-settings opacity-60 mr-2"></i><?php echo e(Helper::translation(4110,$translate,'')); ?></a>
                <a class="dropdown-item d-flex align-items-center" href="<?php echo e(url('/logout')); ?>"><i class="dwg-sign-out opacity-60 mr-2"></i><?php echo e(Helper::translation(4044,$translate,'')); ?></a>
                <?php endif; ?>
              </div>
              </div>
              <?php endif; ?>
              <div class="navbar-tool dropdown ml-3"><a class="navbar-tool-icon-box bg-secondary dropdown-toggle" href="<?php echo e(url('/cart')); ?>"><span class="navbar-tool-label"><?php echo e($cartcount); ?></span><i class="navbar-tool-icon dwg-cart"></i></a>
                <!-- Cart dropdown-->
                <?php if($cartcount != 0): ?>
                <div class="dropdown-menu dropdown-menu-right" style="width: 20rem;">
                  <div class="widget widget-cart px-3 pt-2 pb-3">
                    <div data-simplebar data-simplebar-auto-hide="false">
                      <?php $subtotall = 0; ?>
                      <?php $__currentLoopData = $cartitem['item']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="widget-cart-item pb-2 mb-2 border-bottom">
                        <a href="<?php echo e(url('/cart')); ?>/<?php echo e(base64_encode($cart->ord_id)); ?>" class="close text-danger" onClick="return confirm('<?php echo e(__('Are you sure you want to delete?')); ?>');"><span aria-hidden="true">&times;</span></a>
                        <div class="media align-items-center"><a class="d-block mr-2" href="<?php echo e(url('/item')); ?>/<?php echo e($cart->product_slug); ?>">
                        <?php if($cart->product_image!=''): ?>
                        <img width="64" src="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($cart->product_image); ?>" alt="<?php echo e($cart->product_name); ?>"/>
                        <?php else: ?>
                        <img width="64" src="<?php echo e(url('/')); ?>/public/img/no-image.png" alt="<?php echo e($cart->product_name); ?>"/>
                        <?php endif; ?>
                        </a>
                          <div class="media-body">
                            <h6 class="widget-product-title"><a href="<?php echo e(url('/item')); ?>/<?php echo e($cart->product_slug); ?>"><?php echo e($cart->product_name); ?></a></h6>
                            <div class="widget-product-meta"><span class="text-accent mr-2"><?php echo e($allsettings->site_currency_symbol); ?> <?php echo e($cart->product_price); ?></span></div>
                          </div>
                        </div>
                      </div>
                      <?php $subtotall += $cart->product_price; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </div>
                    <div class="d-flex flex-wrap justify-content-between align-items-center py-3">
                      <div class="font-size-sm mr-2 py-2"><span class="text-muted"><?php echo e(Helper::translation(3960,$translate,'')); ?></span><span class="text-accent font-size-base ml-1"><?php echo e($allsettings->site_currency_symbol); ?> <?php echo e($subtotall); ?></span></div><a class="btn btn-outline-secondary btn-sm" href="<?php echo e(url('/cart')); ?>"><?php echo e(Helper::translation(4113,$translate,'')); ?><i class="dwg-arrow-right ml-1 mr-n1"></i></a></div><a class="btn btn-primary btn-sm btn-block" href="<?php echo e(url('/checkout')); ?>"><i class="dwg-card mr-2 font-size-base align-middle"></i><?php echo e(Helper::translation(3924,$translate,'')); ?></a>
                  </div>
                </div>
                <?php endif; ?>
              </div>
            </div>
            <div class="collapse navbar-collapse mr-auto order-lg-2" id="navbarCollapse">
              <!-- Search-->
              <div class="input-group-overlay d-lg-none my-3">
                <div class="input-group-prepend-overlay"><span class="input-group-text"><i class="dwg-search"></i></span></div>
                <form action="<?php echo e(route('shop')); ?>" id="search_form1" method="post"  enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <input class="form-control prepended-form-control" type="text" name="product_item" placeholder="<?php echo e(Helper::translation(4116,$translate,'')); ?>">
                </form>
              </div>
              <!-- Primary menu-->
              <ul class="navbar-nav">
                <li class="nav-item dropdown"><a class="nav-link" href="<?php echo e(URL::to('/')); ?>"><?php echo e(Helper::translation(3849,$translate,'')); ?></a>
                </li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="<?php echo e(URL::to('/shop')); ?>"><?php echo e(Helper::translation(4068,$translate,'')); ?></a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="<?php echo e(URL::to('/featured-items')); ?>"><?php echo e(Helper::translation(4047,$translate,'')); ?></a></li>
                    <li><a class="dropdown-item" href="<?php echo e(URL::to('/free-items')); ?>"><?php echo e(Helper::translation(4095,$translate,'')); ?></a></li>
                    <li><a class="dropdown-item" href="<?php echo e(URL::to('/new-releases')); ?>"><?php echo e(Helper::translation(4119,$translate,'')); ?></a></li>
                    <li><a class="dropdown-item" href="<?php echo e(URL::to('/popular-items')); ?>"><?php echo e(Helper::translation(4122,$translate,'')); ?></a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"><?php echo e(Helper::translation(3870,$translate,'')); ?></a>
                  <ul class="dropdown-menu">
                   <?php $__currentLoopData = $categories['menu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="dropdown">
                    <a <?php if(count($menu->subcategory) != 0): ?>  class="mobiledev dropdown-item dropdown-toggle" data-toggle="dropdown" <?php else: ?> class="mobiledev dropdown-item" <?php endif; ?> href="<?php echo e(URL::to('/shop/category/')); ?>/<?php echo e($menu->category_slug); ?>"><?php echo e($menu->category_name); ?></a>
                    <a <?php if(count($menu->subcategory) != 0): ?>  class="desktopdev dropdown-item dropdown-toggle"  <?php else: ?> class="desktopdev dropdown-item" <?php endif; ?> href="<?php echo e(URL::to('/shop/category/')); ?>/<?php echo e($menu->category_slug); ?>"><?php echo e($menu->category_name); ?></a>
                      <?php if(count($menu->subcategory) != 0): ?>
                      <ul class="dropdown-menu">
                        <?php $__currentLoopData = $menu->subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a class="dropdown-item" href="<?php echo e(URL::to('/shop/subcategory/')); ?>/<?php echo e($sub_category->subcategory_slug); ?>"><?php echo e($sub_category->subcategory_name); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </ul>
                      <?php endif; ?>
                    </li>
                    <li class="dropdown-divider"></li>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                  </ul>
                </li>
                <?php /*?><li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown">{{ Helper::translation(3870,$translate,'') }}</a>
                  <ul class="dropdown-menu">
                    @foreach($main_menu['category'] as $menu) 
                    <li><a class="dropdown-item" href="{{ URL::to('/shop/category') }}/{{ $menu->category_slug }}">{{ $menu->category_name }}</a></li>
                    @endforeach
                  </ul>
                </li><?php */?>
                <?php if($mainmenu_count != 0): ?>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"><?php echo e(Helper::translation(4125,$translate,'')); ?></a>
                  <ul class="dropdown-menu">
                    <?php $__currentLoopData = $allpages['pages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pages): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a class="dropdown-item" href="<?php echo e(URL::to('/')); ?>/<?php echo e($pages->page_slug); ?>"><?php echo e($pages->page_title); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
                </li>
                <?php endif; ?>
                <?php if($allsettings->subscription_mode == 1): ?>
                <li class="nav-item dropdown"><a class="nav-link" href="<?php echo e(url('/subscription')); ?>"><?php echo e(Helper::translation('6388592288601',$translate,'Subscription')); ?></a></li>
                <?php endif; ?>
                <li class="nav-item dropdown"><a class="nav-link" href="<?php echo e(URL::to('/sale')); ?>"><?php echo e(Helper::translation(4128,$translate,'')); ?></a></li>
                <?php if($allsettings->product_updates_tabs == 1): ?>
                <li class="nav-item dropdown"><a class="nav-link red-color" href="<?php echo e(URL::to('/updates')); ?>"><?php echo e(Helper::translation('6405a7396a93b',$translate,'Updates')); ?></a></li>
                <?php endif; ?>
               </ul>
            </div>
          </div>
        </div>
        <!-- Search collapse-->
        <div class="search-box collapse" id="searchBox">
          <div class="card pt-2 pb-4 border-0 rounded-0">
            <div class="container">
              <div class="input-group-overlay">
                <div class="input-group-prepend-overlay"><span class="input-group-text"><i class="dwg-search"></i></span></div>
                <form action="<?php echo e(route('shop')); ?>" id="search_form2" method="post" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <input class="form-control prepended-form-control" type="text" name="product_item" id="product_item_top" placeholder="<?php echo e(Helper::translation(4116,$translate,'')); ?>">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header><?php /**PATH C:\Users\sabuz\Downloads\downgred latest\downgrade\resources\views/header.blade.php ENDPATH**/ ?>