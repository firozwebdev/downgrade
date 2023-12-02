<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <?php if($allsettings->site_logo != ''): ?>
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>"><img src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_logo); ?>"  alt="<?php echo e($allsettings->site_title); ?>" width="180"/></a>
                <?php else: ?>
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>"><?php echo e(substr($allsettings->site_title,0,10)); ?></a>
                <?php endif; ?>
                <?php if($allsettings->site_favicon != ''): ?>
                <a class="navbar-brand hidden" href="<?php echo e(url('/')); ?>"><img src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_favicon); ?>"  alt="<?php echo e($allsettings->site_title); ?>" width="24"/></a>
                <?php else: ?>
                <a class="navbar-brand hidden" href="<?php echo e(url('/')); ?>"><?php echo e(substr($allsettings->site_title,0,1)); ?></a>
                <?php endif; ?>
            </div>
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <?php if(in_array('dashboard',$avilable)): ?>
                    <li>
                        <a href="<?php echo e(url('/admin')); ?>"> <i class="menu-icon fa fa-dashboard"></i><?php echo e(Helper::translation(5070,$translate,'Dashboard')); ?> </a>
                    </li>
                    <?php endif; ?>
                    <?php if(in_array('settings',$avilable)): ?>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-gears"></i><?php echo e(Helper::translation(4941,$translate,'Settings')); ?></a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-gear"></i><a href="<?php echo e(url('/admin/general-settings')); ?>"><?php echo e(Helper::translation(4878,$translate,'General Settings')); ?></a></li>
                            <li><i class="fa fa-gear"></i><a href="<?php echo e(url('/admin/color-settings')); ?>"><?php echo e(Helper::translation(4746,$translate,'Color Settings')); ?></a></li>
                            <li><i class="fa fa-gear"></i><a href="<?php echo e(url('/admin/email-settings')); ?>"><?php echo e(Helper::translation(4854,$translate,'Email Settings')); ?></a></li>
                            <li><i class="fa fa-gear"></i><a href="<?php echo e(url('/admin/media-settings')); ?>"><?php echo e(Helper::translation(5049,$translate,'Media Settings')); ?></a></li>
                            <li><i class="fa fa-gear"></i><a href="<?php echo e(url('/admin/currency-settings')); ?>"><?php echo e(Helper::translation(4773,$translate,'Currency Settings')); ?></a></li>
                            <li><i class="fa fa-gear"></i><a href="<?php echo e(url('/admin/payment-settings')); ?>"><?php echo e(Helper::translation(5073,$translate,'Payment Settings')); ?></a></li>
                            <li><i class="fa fa-gear"></i><a href="<?php echo e(url('/admin/social-settings')); ?>"><?php echo e(Helper::translation(5076,$translate,'Social Settings')); ?></a></li>
                            <li><i class="fa fa-gear"></i><a href="<?php echo e(url('/admin/limitation-settings')); ?>"><?php echo e(Helper::translation(4989,$translate,'Limitation Settings')); ?></a></li>
                            <li><i class="fa fa-gear"></i><a href="<?php echo e(url('/admin/pwa-settings')); ?>"><?php echo e(Helper::translation('64fc0e9f58370',$translate,'PWA Settings')); ?></a></li>
                            <?php /*?><li><i class="fa fa-gear"></i><a href="{{ url('/admin/preferred-settings') }}">Preferred Settings</a></li><?php */?>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <?php if(in_array('country',$avilable)): ?>
                    <li>
                        <a href="<?php echo e(url('/admin/country-settings')); ?>"> <i class="menu-icon fa fa-flag"></i><?php echo e(Helper::translation(3945,$translate,'Country')); ?></a>
                    </li>
                    <?php endif; ?>
                    <?php if(Auth::user()->id == 1): ?>
                    <li>
                        <a href="<?php echo e(url('/admin/administrator')); ?>"> <i class="menu-icon ti-user"></i><?php echo e(Helper::translation(5079,$translate,'Sub Administrator')); ?> </a>
                    </li>
                    <?php endif; ?>
                    <?php if(in_array('customers',$avilable)): ?>
                    <li>
                        <a href="<?php echo e(url('/admin/customer')); ?>"> <i class="menu-icon ti-user"></i><?php echo e(Helper::translation(4782,$translate,'Customers')); ?> </a>
                    </li>
                    <?php endif; ?>
                    <?php /*?>@if(in_array('category',$avilable))
                    <li>
                        <a href="{{ url('/admin/category') }}"> <i class="menu-icon fa fa-location-arrow"></i>{{ Helper::translation(4200,$translate,'Category') }} </a>
                    </li>
                    @endif<?php */?>
                    <?php if(in_array('subscription',$avilable)): ?>
                    <?php if($allsettings->subscription_mode == 1): ?>
                    <li>
                        <a href="<?php echo e(url('/admin/subscription')); ?>"> <i class="menu-icon fa fa-user"></i><?php echo e(Helper::translation('6388592288601',$translate,'Subscription')); ?> </a>
                    </li>
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php if(in_array('manage-products',$avilable)): ?>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-shopping-cart"></i><?php echo e(Helper::translation(5082,$translate,'Manage Products')); ?></a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-location-arrow"></i><a href="<?php echo e(url('/admin/category')); ?>"><?php echo e(Helper::translation(4200,$translate,'Category')); ?></a></li>
                            <li><i class="menu-icon fa fa-location-arrow"></i><a href="<?php echo e(url('/admin/sub-category')); ?>"><?php echo e(Helper::translation('62612871df65f',$translate,'Sub Category')); ?></a></li>
                            <li><i class="menu-icon fa fa-location-arrow"></i><a href="<?php echo e(url('/admin/products')); ?>"><?php echo e(Helper::translation(4974,$translate,'Products')); ?></a></li>
                            <?php /*?><li><i class="menu-icon fa fa-shopping-cart"></i><a href="{{ url('/admin/package-includes') }}">{{ Helper::translation(4203,$translate,'Package Includes') }}</a></li>
                            <li><i class="menu-icon fa fa-shopping-cart"></i><a href="{{ url('/admin/compatible-browsers') }}">{{ Helper::translation(4206,$translate,'Compatible Browsers') }}</a></li><?php */?>
                            <li><i class="menu-icon fa fa-location-arrow"></i><a href="<?php echo e(url('/admin/attributes')); ?>"><?php echo e(Helper::translation('6397127e58b11',$translate,'Attributes')); ?></a></li>
                            <?php /*?><li><i class="menu-icon fa fa-location-arrow"></i><a href="{{ url('/admin/reports') }}">{{ Helper::translation('63f865b52887f',$translate,'Reports') }}</a></li><?php */?>
                            
                        </ul>
                    </li>
                    <?php endif; ?>
                    <?php if(in_array('orders',$avilable)): ?>
                    <li>
                        <a href="<?php echo e(url('/admin/orders')); ?>"> <i class="menu-icon fa fa-first-order"></i><?php echo e(Helper::translation(5085,$translate,'Orders')); ?> </a>
                    </li>
                    <?php endif; ?>
                    <?php if($allsettings->site_refund_display == 1): ?>
                    <?php if(in_array('refund-request',$avilable)): ?>
                    <li>
                        <a href="<?php echo e(url('/admin/refund')); ?>"> <i class="menu-icon fa fa-undo"></i><?php echo e(Helper::translation(4317,$translate,'Refund Request')); ?> </a>
                    </li>
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php /*?>@if(in_array('rating-reviews',$avilable))
                    <li>
                        <a href="{{ url('/admin/rating') }}"> <i class="menu-icon fa fa-star"></i>{{ Helper::translation(5088,$translate,'Rating & Reviews') }}</a>
                    </li>
                    @endif<?php */?>
                    <?php if($allsettings->site_withdrawal_display == 1): ?>
                    <?php if(in_array('withdrawal',$avilable)): ?>
                    <li>
                        <a href="<?php echo e(url('/admin/withdrawal')); ?>"> <i class="menu-icon fa fa-money"></i><?php echo e(Helper::translation(5091,$translate,'Withdrawal Request')); ?></a>
                    </li>
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php /*?>@if($allsettings->site_development_display == 1)                     
                    <li>
                        <a href="{{ url('/admin/development') }}"> <i class="menu-icon fa fa-image"></i>Development Logo </a>
                    </li>
                    @endif<?php */?>
                    <?php if($allsettings->site_blog_display == 1): ?>
                    <?php if(in_array('blog',$avilable)): ?>  
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-comments-o"></i><?php echo e(Helper::translation(3867,$translate,'Blog')); ?></a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-comments-o"></i><a href="<?php echo e(url('/admin/blog-category')); ?>"><?php echo e(Helper::translation(4200,$translate,'Category')); ?></a></li>
                            <li><i class="menu-icon fa fa-comments-o"></i><a href="<?php echo e(url('/admin/post')); ?>"><?php echo e(Helper::translation(5094,$translate,'Post')); ?></a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php if($allsettings->google_ads == 1): ?>
                    <?php if(in_array('ads',$avilable)): ?> 
                    <li>
                        <a href="<?php echo e(url('/admin/ads')); ?>"> <i class="menu-icon fa fa-file-image-o"></i><?php echo e(Helper::translation(4728,$translate,'Ads')); ?> </a>
                    </li>
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php if(in_array('voucher',$avilable)): ?>
                    <li>
                        <a href="<?php echo e(url('/admin/voucher-code')); ?>"> <i class="menu-icon fa fa-gift"></i><?php echo e(Helper::translation('6405c09305f6d',$translate,'Prepaid Vouchers')); ?> </a>
                    </li>
                    <?php endif; ?>
                    <?php if(in_array('coupons',$avilable)): ?>
                    <li>
                        <a href="<?php echo e(url('/admin/coupons')); ?>"> <i class="menu-icon fa fa-percent"></i><?php echo e(Helper::translation('64071fdcb0ab0',$translate,'Discount Coupons')); ?> </a>
                    </li>
                    <?php endif; ?>
                    <?php if(in_array('pages',$avilable)): ?> 
                    <li>
                        <a href="<?php echo e(url('/admin/pages')); ?>"> <i class="menu-icon fa fa-file-text-o"></i><?php echo e(Helper::translation(4125,$translate,'Pages')); ?> </a>
                    </li>
                    <?php endif; ?>
                    <?php if(in_array('contact',$avilable)): ?>
                    <li>
                        <a href="<?php echo e(url('/admin/contact')); ?>"> <i class="menu-icon fa fa-address-book-o"></i><?php echo e(Helper::translation(3999,$translate,'Contact')); ?> </a>
                    </li>
                    <?php endif; ?>
                    <?php if(in_array('etemplate',$avilable)): ?>
                    <li>
                        <a href="<?php echo e(url('/admin/email-template')); ?>"> <i class="menu-icon fa fa-envelope"></i><?php echo e(Helper::translation('614ef338bd8af',$translate,'Email Template')); ?> </a>
                    </li>
                    <?php endif; ?>
                    <?php if(in_array('maintenance',$avilable)): ?>
                    <li>
                        <a href="<?php echo e(url('/admin/website-maintenance')); ?>"> <i class="menu-icon fa fa-wrench"></i><?php echo e(Helper::translation('63ff40894b1a1',$translate,'Website Maintenance')); ?> </a>
                    </li>
                    <?php endif; ?>
                    <?php if(in_array('newsletter',$avilable)): ?>
                    <li>
                        <a href="<?php echo e(url('/admin/newsletter')); ?>"> <i class="menu-icon fa fa-newspaper-o"></i><?php echo e(Helper::translation(5097,$translate,'Newsletter')); ?> </a>
                    </li>
                    <?php endif; ?>
                    <?php if(in_array('clear-cache',$avilable)): ?>
                    <li>
                        <a href="<?php echo e(url('/admin/clear-cache')); ?>" onClick="return confirm('<?php echo e(Helper::translation('61efd92f26dcb',$translate,'Are you sure you want to clear cache')); ?>?');"> <i class="menu-icon fa fa-trash"></i><?php echo e(Helper::translation('61efd77eb4f5a',$translate,'Clear Cache')); ?> </a>
                    </li>
                    <?php endif; ?>
                    <?php if($allsettings->site_google_translate == 1): ?>
                    <?php if(in_array('languages',$avilable)): ?>
                    <li>
                        <a href="<?php echo e(url('/admin/languages')); ?>"> <i class="menu-icon fa fa-language"></i><?php echo e(Helper::translation(4977,$translate,'Languages')); ?> </a>
                    </li>
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php if(in_array('backups',$avilable)): ?>
                    <li>
                        <a href="<?php echo e(url('/admin/backup')); ?>"> <i class="menu-icon fa fa-hdd-o"></i><?php echo e(Helper::translation('64fc0c27cae4e',$translate,'Backups')); ?> </a>
                    </li>
                    <?php endif; ?>
                  </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><?php /**PATH C:\Users\sabuz\Downloads\downgred latest\downgrade\resources\views/admin/navigation.blade.php ENDPATH**/ ?>