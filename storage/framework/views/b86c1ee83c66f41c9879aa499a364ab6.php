<!DOCTYPE HTML>
<html lang="en">
<head>
<title><?php echo e(Helper::translation(4068,$translate,'')); ?> - <?php echo e($allsettings->site_title); ?></title>
<?php echo $__env->make('meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="bg-position-center-top" style="background-image: url('<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_banner); ?>');">
      <div class="py-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
              <li class="breadcrumb-item"><a class="text-nowrap" href="<?php echo e(URL::to('/')); ?>"><i class="dwg-home"></i><?php echo e(Helper::translation(3849,$translate,'')); ?></a></li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page"><?php echo e(Helper::translation(4068,$translate,'')); ?></li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 mb-0 text-white"><?php echo e(Helper::translation(4068,$translate,'')); ?></h1>
        </div>
      </div>
      </div>
    </section>
<div class="container py-5 mt-md-2 mb-2">
      <div class="row pt-3 mx-n2">
         <aside class="col-lg-4">
          <!-- Sidebar-->
          <form action="<?php echo e(route('shop')); ?>" id="search_form2" method="post"  enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>

          <div class="cz-sidebar rounded-lg box-shadow-lg" id="shop-sidebar">
            <div class="cz-sidebar-header box-shadow-sm">
              <button class="close ml-auto" type="button" data-dismiss="sidebar" aria-label="Close"><span class="d-inline-block font-size-xs font-weight-normal align-middle"><?php echo e(Helper::translation(4455,$translate,'')); ?></span><span class="d-inline-block align-middle ml-2" aria-hidden="true">&times;</span></button>
            </div>
            <div class="cz-sidebar-body" data-simplebar data-simplebar-auto-hide="true">
              <!-- Categories-->
              <div class="widget cz-filter mb-4 pb-4 border-bottom">
                <h3 class="widget-title"><?php echo e(Helper::translation(3870,$translate,'')); ?></h3>
                <div class="input-group-overlay input-group-sm mb-2">
                  <input class="cz-filter-search form-control form-control-sm appended-form-control" type="text" placeholder="Search">
                  <div class="input-group-append-overlay"><span class="input-group-text"><i class="dwg-search"></i></span></div>
                </div>
                <?php /*?>@if(count($category['view']) != 0)
                <ul class="widget-list cz-filter-list list-unstyled pt-1" style="max-height: 12rem;" data-simplebar data-simplebar-auto-hide="false">
                  @foreach($category['view'] as $cat)
                  <li class="cz-filter-item d-flex justify-content-between align-items-center mb-1">
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox" id="{{ $cat->cat_id }}" name="category_names[]" value="{{ $cat->cat_id }}">
                      <label class="custom-control-label cz-filter-item-text" for="{{ $cat->cat_id }}">{{ $cat->category_name }}</label>
                    </div><span class="font-size-xs text-muted">{{ $count_item->has($cat->cat_id) ? count($count_item[$cat->cat_id]) : 0 }}</span>
                  </li>
                  @endforeach 
                </ul>
                @endif<?php */?>
                <?php if(count($category['view']) != 0): ?>
                <ul class="widget-list cz-filter-list list-unstyled pt-1" style="max-height: 12rem;" data-simplebar data-simplebar-auto-hide="false">
                  <?php $__currentLoopData = $category['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li class="cz-filter-item d-flex justify-content-between align-items-center mb-1">
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox" id="<?php echo e($cat->cat_id); ?>" name="category_names[]" value="<?php echo e('category_'.$cat->cat_id); ?>">
                      <label class="custom-control-label cz-filter-item-text" for="<?php echo e($cat->cat_id); ?>"><?php echo e($cat->category_name); ?></label>
                      <?php $__currentLoopData = $cat->subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <br/>
                      <span class="ml-2"><input class="custom-control-input" type="checkbox" id="<?php echo e($sub_category->subcat_id); ?>" name="category_names[]" value="<?php echo e('subcategory_'.$sub_category->subcat_id); ?>">
                      <label class="custom-control-label cz-filter-item-text" for="<?php echo e($sub_category->subcat_id); ?>"><?php echo e($sub_category->subcategory_name); ?></label>
                      </span>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    
                  </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                </ul>
                <?php endif; ?>
              </div>
              <div class="widget cz-filter mb-4 pb-4 border-bottom">
                <h3 class="widget-title"><?php echo e(Helper::translation(4458,$translate,'')); ?></h3>
                <div class="input-group-overlay input-group-sm mb-2">
                  <select class="cz-filter-search form-control form-control-sm appended-form-control" name="orderby">
                  <option value="desc"><?php echo e(Helper::translation(4461,$translate,'')); ?></option>
                  <option value="asc"><?php echo e(Helper::translation(4464,$translate,'')); ?></option>
                  <option value="desc"><?php echo e(Helper::translation(4467,$translate,'')); ?></option>
                 </select>            
                </div>
              </div>
              <!-- Price range-->
              <div class="widget mb-4 pb-4 border-bottom">
                <h3 class="widget-title"><?php echo e(Helper::translation(4290,$translate,'')); ?></h3>
                <div class="cz-range-slider" data-start-min="<?php echo e($minprice['price']->regular_price); ?>" data-start-max="<?php echo e($maxprice['price']->extended_price); ?>" data-min="<?php echo e($allsettings->site_range_min_price); ?>" data-max="<?php echo e($allsettings->site_range_max_price); ?>" data-step="1">
                  <div class="cz-range-slider-ui"></div>
                  <div class="d-flex pb-1">
                    <div class="w-50 pr-2 mr-2">
                      <div class="input-group input-group-sm">
                        <div class="input-group-prepend"><span class="input-group-text"><?php echo e($allsettings->site_currency_symbol); ?></span></div>
                        <input class="form-control cz-range-slider-value-min" type="text" name="min_price">
                      </div>
                    </div>
                    <div class="w-50 pl-2">
                      <div class="input-group input-group-sm">
                        <div class="input-group-prepend"><span class="input-group-text"><?php echo e($allsettings->site_currency_symbol); ?></span></div>
                        <input class="form-control cz-range-slider-value-max" type="text" name="max_price">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="input-group-append">
                  <button class="btn btn-primary btn-sm font-size-base" type="submit"><?php echo e(Helper::translation(4104,$translate,'')); ?></button>
             </div>
              <!-- Filter by Brand-->
              <?php if(in_array('shop',$sidebar_ads)): ?>
           <div class="mt-4" align="center">
           <?php echo html_entity_decode($allsettings->sidebar_ads); ?>
           </div>
           <?php endif; ?>
           </div>
          </div>
          </form>
        </aside>
        <div class="col-lg-8">
         <div class="row pt-2 mx-n2">
         <?php if(in_array('shop',$top_ads)): ?>
          <div class="mt-2 mb-2" align="center">
             <?php echo html_entity_decode($allsettings->top_ads); ?>
          </div>
          <?php endif; ?>
        <!-- Product-->
        <?php if(count($itemData['item']) != 0): ?>
        <?php $no = 1; ?>
        <?php $__currentLoopData = $itemData['item']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $featured): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
        $price = Helper::price_info($featured->product_flash_sale,$featured->regular_price);
        $count_rating = Helper::count_rating($featured->ratings);
        ?>
        <div class="col-lg-4 col-md-4 col-sm-6 px-2 mb-3 prod-item">
          <!-- Product-->
          <div class="card product-card-alt">
            <div class="product-thumb">
              <?php if(Auth::guest()): ?> 
              <a class="btn-wishlist btn-sm" href="<?php echo e(URL::to('/login')); ?>"><i class="dwg-heart"></i></a>
              <?php endif; ?>
              <?php if(Auth::check()): ?>
              <?php if($featured->user_id != Auth::user()->id): ?>
              <a class="btn-wishlist btn-sm" href="<?php echo e(url('/item')); ?>/<?php echo e(base64_encode($featured->product_id)); ?>/favorite/<?php echo e(base64_encode($featured->product_liked)); ?>"><i class="dwg-heart"></i></a>
              <?php endif; ?>
              <?php endif; ?>
              <div class="product-card-actions"><a class="btn btn-light btn-icon btn-shadow font-size-base mx-2" href="<?php echo e(URL::to('/item')); ?>/<?php echo e($featured->product_slug); ?>"><i class="dwg-eye"></i></a>
              <?php
              $checkif_purchased = Helper::if_purchased($featured->product_token);
              ?>
              <?php if($checkif_purchased == 0): ?>
              <?php if(Auth::check()): ?>
              <?php if(Auth::user()->id != 1): ?>
              <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2" href="<?php echo e(URL::to('/add-to-cart')); ?>/<?php echo e($featured->product_slug); ?>"><i class="dwg-cart"></i></a>
              <?php endif; ?>
              <?php else: ?>
              <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2" href="<?php echo e(URL::to('/add-to-cart')); ?>/<?php echo e($featured->product_slug); ?>"><i class="dwg-cart"></i></a>
              <?php endif; ?>
              <?php endif; ?>  
              </div><a class="product-thumb-overlay" href="<?php echo e(URL::to('/item')); ?>/<?php echo e($featured->product_slug); ?>"></a>
              <?php if($featured->product_image!=''): ?>
              <img src="<?php echo e(url('/')); ?>/public/storage/product/<?php echo e($featured->product_image); ?>" alt="<?php echo e($featured->product_name); ?>">
              <?php else: ?>
              <img src="<?php echo e(url('/')); ?>/public/img/no-image.png" alt="<?php echo e($featured->product_name); ?>">
              <?php endif; ?>
            </div>
            <div class="card-body">
              <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">
                <div class="text-muted font-size-xs mr-1"><a class="product-meta font-weight-medium" href="<?php echo e(URL::to('/shop')); ?>/category/<?php echo e($featured->category_slug); ?>"><?php echo e($featured->category_name); ?></a></div>
                <div class="star-rating">
                    <?php if($count_rating == 0): ?>
                    <i class="sr-star dwg-star"></i>
                    <i class="sr-star dwg-star"></i>
                    <i class="sr-star dwg-star"></i>
                    <i class="sr-star dwg-star"></i>
                    <i class="sr-star dwg-star"></i>
                    <?php endif; ?>
                    <?php if($count_rating == 1): ?>
                    <i class="sr-star dwg-star-filled active"></i>
                    <i class="sr-star dwg-star"></i>
                    <i class="sr-star dwg-star"></i>
                    <i class="sr-star dwg-star"></i>
                    <i class="sr-star dwg-star"></i>
                    <?php endif; ?>
                    <?php if($count_rating == 2): ?>
                    <i class="sr-star dwg-star-filled active"></i>
                    <i class="sr-star dwg-star-filled active"></i>
                    <i class="sr-star dwg-star"></i>
                    <i class="sr-star dwg-star"></i>
                    <i class="sr-star dwg-star"></i>
                    <?php endif; ?>
                    <?php if($count_rating == 3): ?>
                    <i class="sr-star dwg-star-filled active"></i>
                    <i class="sr-star dwg-star-filled active"></i>
                    <i class="sr-star dwg-star-filled active"></i>
                    <i class="sr-star dwg-star"></i>
                    <i class="sr-star dwg-star"></i>
                    <?php endif; ?>
                    <?php if($count_rating == 4): ?>
                    <i class="sr-star dwg-star-filled active"></i>
                    <i class="sr-star dwg-star-filled active"></i>
                    <i class="sr-star dwg-star-filled active"></i>
                    <i class="sr-star dwg-star-filled active"></i>
                    <i class="sr-star dwg-star"></i>
                    <?php endif; ?>
                    <?php if($count_rating == 5): ?>
                    <i class="sr-star dwg-star-filled active"></i>
                    <i class="sr-star dwg-star-filled active"></i>
                    <i class="sr-star dwg-star-filled active"></i>
                    <i class="sr-star dwg-star-filled active"></i>
                    <i class="sr-star dwg-star-filled active"></i>
                    <?php endif; ?>
                </div>
               </div>
              <h3 class="product-title font-size-sm mb-2 title"><a href="<?php echo e(URL::to('/item')); ?>/<?php echo e($featured->product_slug); ?>"><?php echo e($featured->product_name); ?></a></h3>
              <div class="d-flex flex-wrap justify-content-between align-items-center">
                <div class="font-size-sm mr-2"><i class="dwg-download text-muted mr-1"></i><?php echo e($featured->product_sold); ?><span class="font-size-xs ml-1"><?php echo e(Helper::translation(4050,$translate,'')); ?></span>
                </div>
                <div><?php if($featured->product_flash_sale == 1): ?><del class="price-old"><?php echo e($allsettings->site_currency_symbol); ?><?php echo e($featured->regular_price); ?></del><?php endif; ?> <span class="bg-faded-accent text-accent rounded-sm py-1 px-2"><?php echo e($allsettings->site_currency_symbol); ?><?php echo e($price); ?></span></div>
              </div>
            </div>
          </div>
        </div>
        <!-- Product-->
        <?php $no++; ?>
	    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       </div>
       <?php if($method == 'get'): ?>
       <?php echo e($itemData['item']->links('pagination::bootstrap-4')); ?>

       <?php endif; ?>
       <?php /*?><div class="text-right">
            <div class="turn-page" id="itempager"></div>
       </div><?php */?>
       <?php if(in_array('shop',$bottom_ads)): ?>
       <div class="mt-3 mb-4 pb-4" align="center">
         <?php echo html_entity_decode($allsettings->bottom_ads); ?>
       </div>
       <?php endif; ?>
       <?php else: ?>
       <div><?php echo e(Helper::translation(4470,$translate,'')); ?></div>
       <?php endif; ?>
       </div>
        </div>
      </div>
    </div>
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH C:\Users\sabuz\Downloads\downgred latest\downgrade\resources\views/pages/shop.blade.php ENDPATH**/ ?>