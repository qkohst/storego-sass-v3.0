<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Home')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>

<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <?php if($storethemesetting['enable_header_img'] == 'on'): ?>
        <section class="slice slice-xl bg-cover bg-size--cover home-banner" data-offset-top="#header-main" style="background-image: url(<?php echo e(asset(Storage::url('uploads/store_logo/'.(!empty($storethemesetting['header_img'])?$storethemesetting['header_img']:'home-banner.png')))); ?>); background-position: center center;">
            <span class="mask bg-dark opacity-3"></span>
            <div class="container py-6">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="h1 text-white store-title">
                            <?php echo e(!empty($storethemesetting['header_title'])?$storethemesetting['header_title']:'Home Accessories'); ?>

                        </h2>
                        <p class="lead text-white mt-4 store-dcs">
                            <?php echo e(!empty($storethemesetting['header_desc'])?$storethemesetting['header_desc']:'There is only that moment and the incredible certainty that everything under the sun has been written by one hand only.'); ?>

                        </p>
                        <button href="#" class="btn btn-white btn-white btn-icon rounded-pill hover-translate-y-n3 mt-4" id="pro_scroll">
                            <span class="btn-inner--text"><?php echo e(!empty($storethemesetting->button_text)?$storethemesetting->button_text:'Start shopping'); ?></span>
                            <span class="btn-inner--icon"><i class="fas fa-angle-right"></i></span>
                        </button>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Features -->
    <?php if(isset($storethemesetting['enable_features']) && $storethemesetting['enable_features'] == 'on'): ?>
        <section class="store-promotions mt-70">
            <div class="container">
                <div class="row">
                    <?php if(isset($storethemesetting['enable_features1']) &&$storethemesetting['enable_features1'] == 'on'): ?>
                        <?php if(isset($storethemesetting['features_icon1'])): ?>
                            <div class="col-lg-4 col-sm-6">
                                <div class="mb-4">
                                    <div class="icon text-primary">
                                        <?php echo $storethemesetting['features_icon1']; ?>

                                    </div>
                                    <strong class="text-primary"><?php echo e($storethemesetting['features_title1']); ?></strong>
                                    <p class=" mt-2 mb-0 t-gray"><?php echo e($storethemesetting['features_description1']); ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if(isset($storethemesetting['enable_features2']) &&$storethemesetting['enable_features2'] == 'on'): ?>
                        <?php if(isset($storethemesetting['features_icon2'])): ?>
                            <div class="col-lg-4 col-sm-6">
                                <div class="mb-4">
                                    <div class="icon text-primary">
                                        <?php echo $storethemesetting['features_icon2']; ?>

                                    </div>
                                    <strong class="text-primary"><?php echo e($storethemesetting['features_title2']); ?></strong>
                                    <p class=" mt-2 mb-0 t-gray"><?php echo e($storethemesetting['features_description2']); ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if(isset($storethemesetting['enable_features3']) &&$storethemesetting['enable_features3'] == 'on'): ?>
                        <?php if(isset($storethemesetting['features_icon3'])): ?>
                            <div class="col-lg-4 col-sm-6">
                                <div class="mb-4">
                                    <div class="icon text-primary">
                                        <?php echo $storethemesetting['features_icon3']; ?>

                                    </div>
                                    <strong class="text-primary"><?php echo e($storethemesetting['features_title3']); ?></strong>
                                    <p class=" mt-2 mb-0 t-gray"><?php echo e($storethemesetting['features_description3']); ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Products -->
    <?php if($products['Start shopping']->count() > 0): ?>
        <section id="pro_items" class="bestsellers-section">
            <div class="container">
                <div class="row">
                    <div class="pr-title mb-4">
                        <h3 class=" mt-4 store-title text-primary"><?php echo e(__('Products')); ?></h3>
                        <div class="p-tablist">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="nav-item">
                                        <a href="#<?php echo preg_replace('/[^A-Za-z0-9\-]/','_',$category); ?>" data-id="<?php echo e($key); ?>" class="nav-link <?php echo e(($key==0)?'active':''); ?> productTab" id="electronic-tab" data-toggle="tab" role="tab" aria-controls="home" aria-selected="false">
                                            <?php echo e($category); ?>

                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content bestsellers-tabs" id="myTabContent">
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="tab-pane fade <?php echo e(($key=="Start shopping")?'active show':''); ?>" id="<?php echo preg_replace('/[^A-Za-z0-9\-]/', '_', $key); ?>" role="tabpanel" aria-labelledby="shopping-tab">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <?php if($items->count() > 0): ?>
                                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-xl-3 col-lg-4 col-sm-6 product-box">
                                                    <div class="card card-fluid card-product">
                                                        <div class="card-image">
                                                            <a href="<?php echo e(route('store.product.product_view',[$store->slug,$product->id])); ?>">
                                                                <?php if(!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/'.$product->is_cover)): ?>
                                                                    <img alt="Image placeholder" src="<?php echo e(asset(Storage::url('uploads/is_cover_image/'.$product->is_cover))); ?>" class="img-center img-fluid">
                                                                <?php else: ?>
                                                                    <img alt="Image placeholder" src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>" class="img-center img-fluid">
                                                                <?php endif; ?>
                                                            </a>
                                                        </div>
                                                        <div class="card-body pt-0">
                                                            <span class="static-rating static-rating-sm">
                                                                <?php if($store->enable_rating == 'on'): ?>
                                                                    <?php for($i =1;$i<=5;$i++): ?>
                                                                        <?php
                                                                            $icon = 'fa-star';
                                                                            $color = '';
                                                                            $newVal1 = ($i-0.5);
                                                                            if($product->product_rating() < $i && $product->product_rating() >= $newVal1)
                                                                            {
                                                                                $icon = 'fa-star-half-alt';
                                                                            }
                                                                            if($product->product_rating() >= $newVal1)
                                                                            {
                                                                                $color = 'text-warning';
                                                                            }
                                                                        ?>
                                                                        <i class="star fas <?php echo e($icon .' '. $color); ?>"></i>
                                                                    <?php endfor; ?>
                                                                <?php endif; ?>
                                                            </span>
                                                            <h6>
                                                                <a class="t-black13" href="<?php echo e(route('store.product.product_view',[$store->slug,$product->id])); ?>">
                                                                    <?php echo e($product->name); ?>

                                                                </a>
                                                            </h6>
                                                            <p class="text-sm">
                                                                <span class="td-gray"><?php echo e(__('Category')); ?>:</span> <?php echo e($product->product_category()); ?>

                                                            </p>
                                                            <div class="product-price mt-3">
                                                            <span class="card-price t-black15">
                                                                <?php if($product->enable_product_variant == 'on'): ?>
                                                                    <?php echo e(__('In variant')); ?>

                                                                <?php else: ?>
                                                                    <?php echo e(\App\Models\Utility::priceFormat($product->price)); ?>

                                                                <?php endif; ?>
                                                            </span>
                                                                <?php if($product->enable_product_variant == 'on'): ?>
                                                                    <a href="<?php echo e(route('store.product.product_view',[$store->slug,$product->id])); ?>" class="action-item pcart-icon bg-primary">
                                                                        <i class="fas fa-shopping-basket"></i>
                                                                    </a>
                                                                <?php else: ?>
                                                                    <a class="action-item pcart-icon bg-primary add_to_cart" data-id="<?php echo e($product->id); ?>">
                                                                        <i class="fas fa-shopping-basket"></i>
                                                                    </a>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                        <div class="actions card-product-actions">
                                                            <?php if(!empty($wishlist) && isset($wishlist[$product->id]['product_id'])): ?>
                                                                <?php if($wishlist[$product->id]['product_id'] != $product->id): ?>
                                                                    <button type="button" class="action-item wishlist-icon bg-light-gray add_to_wishlist wishlist_<?php echo e($product->id); ?>" data-id="<?php echo e($product->id); ?>">
                                                                        <i class="far fa-heart"></i>
                                                                    </button>
                                                                <?php else: ?>
                                                                    <button type="button" class="action-item wishlist-icon bg-light-gray" data-id="<?php echo e($product->id); ?>" disabled>
                                                                        <i class="fas fa-heart"></i>
                                                                    </button>
                                                                <?php endif; ?>
                                                            <?php else: ?>
                                                                <button type="button" class="action-item wishlist-icon bg-light-gray add_to_wishlist wishlist_<?php echo e($product->id); ?>" data-id="<?php echo e($product->id); ?>">
                                                                    <i class="far fa-heart"></i>
                                                                </button>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <div class="col-12 product-box">
                                                <div class="card card-product">
                                                    <h6 class="m-0 text-center no_record"><i class="fas fa-ban"></i> <?php echo e(__('No Record Found')); ?></h6>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- subscriber-->
    <?php if(isset($storethemesetting['enable_email_subscriber']) && $storethemesetting['enable_email_subscriber']=='on'): ?>
        <?php if($storethemesetting['enable_email_subscriber'] == 'on'): ?>
            <section class="slice slice-xl bg-cover bg-size--cover" style="background-image: url(<?php echo e(asset(Storage::url('uploads/store_logo/'.(!empty($storethemesetting['subscriber_img'])?$storethemesetting['subscriber_img']:'img-17.jpg')))); ?>); background-position: center center;">
                <div class="container py-6">
                    <div class="row justify-content-center">
                        <div class="col-sm-12 col-lg-12 col-xl-12 text-center">
                            <div class="mb-5">
                                <h1 class="text-white store-title"><?php echo e(!empty($storethemesetting['subscriber_title'])?$storethemesetting['subscriber_title']:'Always on time'); ?></h1>
                                <p class="lead text-white mt-2 store-dcs"><?php echo e(!empty($storethemesetting['subscriber_sub_title'])?$storethemesetting['subscriber_sub_title']:'Subscription here'); ?></p>
                            </div>
                            <?php echo e(Form::open(array('route' => array('subscriptions.store_email', $store->id),'method' => 'POST'))); ?>

                            <div class="form-group mb-0 form-subscribe">
                                <div class="input-group input-group-lg input-group-merge">
                                    <?php echo e(Form::email('email',null,array('class'=>'form-control bg-white form-control-flush rounded-pill','aria-label'=>'Enter your email address','placeholder'=>__('Enter Your Email Address')))); ?>

                                    <div class="input-group-append ml-3">
                                        <button type="submit" class="btn btn-primary rounded-pill hover-translate-y-n3 btn-icon mr-sm-4 scroll-me">
                                            <span class="btn-inner--text"><?php echo e(__('Subscribe')); ?></span>
                                            <span class="far fa-paper-plane"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Products -->
    <?php if(count($topRatedProducts)>0): ?>
        <section class="top-product">
            <div class="container">
                <div class="row">
                    <div class="pr-title">
                        <h3 class=" mt-4 store-title text-primary"><?php echo e(__('Top rated products')); ?></h3>
                        <a href="<?php echo e(route('store.categorie.product',$store->slug)); ?>" class="btn btn-sm btn-primary rounded-pill btn-icon">
                            <span class="btn-inner--text"><?php echo e(__('Show more products')); ?></span>
                            <i class="fas fa-shopping-basket"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <?php $__currentLoopData = $topRatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $topRatedProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-xl-3 col-lg-4 col-sm-6 product-box">
                            <div class="card card-product">
                                <div class="card-image">
                                    <a href="<?php echo e(route('store.product.product_view',[$store->slug,$product->id])); ?>">
                                        <?php if(!empty($topRatedProduct->product->is_cover) && \Storage::exists('uploads/is_cover_image/'.$topRatedProduct->product->is_cover)): ?>
                                            <img alt="Image placeholder" src="<?php echo e(asset(Storage::url('uploads/is_cover_image/'.$topRatedProduct->product->is_cover))); ?>" class="img-center img-fluid">
                                        <?php else: ?>
                                            <img alt="Image placeholder" src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>" class="img-center img-fluid">
                                        <?php endif; ?>
                                    </a>
                                </div>
                                <div class="card-body pt-0">
                                <span class="static-rating static-rating-sm">
                                <?php if($store->enable_rating == 'on'): ?>
                                        <?php for($i =1;$i<=5;$i++): ?>
                                            <?php
                                                $icon = 'fa-star';
                                                $color = '';
                                                $newVal1 = ($i-0.5);
                                                if($topRatedProduct->product->product_rating() < $i && $product->product_rating() >= $newVal1)
                                                {
                                                    $icon = 'fa-star-half-alt';
                                                }
                                                if($product->product_rating() >= $newVal1)
                                                {
                                                    $color = 'text-warning';
                                                }
                                            ?>
                                            <i class="star fas <?php echo e($icon .' '. $color); ?>"></i>
                                        <?php endfor; ?>
                                    <?php endif; ?>
                                </span>
                                    <h6><a class="t-black13" href="#"><?php echo e($topRatedProduct->product->name); ?></a></h6>
                                    <p class="text-sm">
                                        <span class="td-gray"><?php echo e(__('Category')); ?>:</span> <?php echo e($topRatedProduct->product->product_category()); ?>

                                    </p>
                                    <div class="product-price mt-3">
                                        <span class="card-price t-black15">
                                            <?php if($topRatedProduct->product->enable_product_variant == 'on'): ?>
                                                <?php echo e(__('In variant')); ?>

                                            <?php else: ?>
                                                <?php echo e(\App\Models\Utility::priceFormat($topRatedProduct->product->price)); ?>

                                            <?php endif; ?>
                                        </span>
                                        <?php if($topRatedProduct->product->enable_product_variant == 'on'): ?>
                                            <a href="<?php echo e(route('store.product.product_view',[$store->slug,$topRatedProduct->product->id])); ?>" class="action-item pcart-icon bg-primary">
                                                <i class="fas fa-shopping-basket"></i>
                                            </a>
                                        <?php else: ?>
                                            <a href="javascript:void(0)" class="action-item pcart-icon bg-primary add_to_cart" data-id="<?php echo e($topRatedProduct->product->id); ?>">
                                                <i class="fas fa-shopping-basket"></i>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="actions card-product-actions">
                                    <?php if(!empty($wishlist) && isset($wishlist[$topRatedProduct->product->id]['product_id'])): ?>
                                        <?php if($wishlist[$topRatedProduct->product->id]['product_id'] != $topRatedProduct->product->id): ?>
                                            <button type="button" class="action-item wishlist-icon bg-light-gray add_to_wishlist wishlist_<?php echo e($topRatedProduct->product->id); ?>" data-id="<?php echo e($topRatedProduct->product->id); ?>">
                                                <i class="far fa-heart"></i>
                                            </button>
                                        <?php else: ?>
                                            <button type="button" class="action-item wishlist-icon bg-light-gray" data-id="<?php echo e($topRatedProduct->product->id); ?>" disabled>
                                                <i class="fas fa-heart"></i>
                                            </button>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <button type="button" class="action-item wishlist-icon bg-light-gray add_to_wishlist wishlist_<?php echo e($topRatedProduct->product->id); ?>" data-id="<?php echo e($topRatedProduct->product->id); ?>">
                                            <i class="far fa-heart"></i>
                                        </button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Products categories-->
    <?php if(isset($storethemesetting['enable_categories']) && $storethemesetting['enable_categories'] == 'on' && !empty($pro_categories)): ?>
        <?php if($storethemesetting['enable_categories'] == 'on'): ?>
            <section class="categorie-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-5 text-center">
                                <h3 class=" mt-4 store-title text-primary"><?php echo e(!empty($storethemesetting['categories'])?$storethemesetting['categories']:'Categories'); ?></h3>
                                <div class="fluid-paragraph mt-3">
                                    <p class="lead lh-180 store-dcs"><?php echo e(!empty($storethemesetting['categories_title'])?$storethemesetting['categories_title']:'There is only that moment and the incredible certainty <br> that
                                    everything
                                    under the sun has been written by one hand only.'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <?php $__currentLoopData = $pro_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$pro_categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($product_count[$key] > 0): ?>
                                <div class="col-lg-4 col-md-6 col-sm-6 categories-box mb-4">
                                    <div class="cat-box">
                                        <?php if(!empty($pro_categorie->categorie_img) && \Storage::exists('uploads/product_image/'.$product->categorie_img)): ?>
                                            <img alt="Image placeholder" src="<?php echo e(asset(Storage::url('uploads/product_image/'.$pro_categorie->categorie_img))); ?>" class="product bor-radius" height="350px">
                                        <?php else: ?>
                                            <img alt="Image placeholder" src="<?php echo e(asset(Storage::url('uploads/product_image/default.jpg'))); ?>" class="product bor-radius" height="350px">
                                        <?php endif; ?>
                                    </div>
                                    <div class="cat-dcs">
                                        <h3 class="t-white"><?php echo e($pro_categorie->name); ?></h3>
                                        <p class="t-white"><?php echo e(__('Products')); ?>: <?php echo e(!empty($product_count[$key])?$product_count[$key]:'0'); ?></p>
                                        <a href="<?php echo e(route('store.categorie.product',[$store->slug,$pro_categorie->name])); ?>" class="btn btn-sm btn-primary rounded-pill btn-icon">
                                            <span class="btn-inner--text"><?php echo e(__('Show more products')); ?></span>
                                            <span class="btn-inner--icon">
                                                <i class="fas fa-shopping-basket"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Testimonials (v1) -->
    <?php if(isset($storethemesetting['enable_testimonial']) && $storethemesetting['enable_testimonial']=='on'): ?>
        <section class="slice testimonial-section">
            <div class="container-fulid">
                <div class="mb-5 text-center">
                    <h3 class=" mt-4 store-title text-primary"><?php echo e(!empty($storethemesetting['testimonial_main_heading'])?$storethemesetting['testimonial_main_heading']:'Testimonials'); ?></h3>
                    <div class="fluid-paragraph mt-3">
                        <p class="lead lh-180 store-dcs"><?php echo e(!empty($storethemesetting['testimonial_main_heading_title'])?$storethemesetting['testimonial_main_heading_title']:'There is only that moment and the incredible certainty that <br> everything
                            under the sun has been written by one hand only.'); ?></p>
                    </div>
                </div>
                <div class="container">
                    <div class="row testimonial-slider">
                        <div class="col-lg-12">
                            <div class="swiper-js-container overflow-hidden">
                                <div class="swiper-container" data-swiper-items="1" data-swiper-space-between="0" data-swiper-sm-items="2"
                                     data-swiper-xl-items="3">
                                    <div class="swiper-wrapper">
                                        <?php if(isset($storethemesetting['enable_testimonial1']) && $storethemesetting['enable_testimonial1']=='on'): ?>
                                            <div class="swiper-slide p-3">
                                                <div class="card bg-transparent">
                                                    <div class="card-body">
                                                        <p class="t-dcs t-gray"><?php echo e($storethemesetting['testimonial_description1']); ?></p>
                                                        <div class="d-flex align-items-center">
                                                            <div>
                                                                <img alt="" src="<?php echo e(asset(Storage::url('uploads/store_logo/'.(!empty($storethemesetting['testimonial_img1'])?$storethemesetting['testimonial_img1']:'qo.png')))); ?>" class="avatar rounded-circle">
                                                            </div>
                                                            <div class="pl-3">
                                                                <h5 class="t-author t-black14"><?php echo e($storethemesetting['testimonial_name1']); ?></h5>
                                                                <small class="d-block t-author-dcs"><?php echo e($storethemesetting['testimonial_about_us1']); ?></small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(isset($storethemesetting['enable_testimonial2']) && $storethemesetting['enable_testimonial2']=='on'): ?>
                                            <div class="swiper-slide p-3">
                                                <div class="card bg-transparent">
                                                    <div class="card-body">
                                                        <p class="t-dcs t-gray"><?php echo e($storethemesetting['testimonial_description2']); ?></p>
                                                        <div class="d-flex align-items-center">
                                                            <div>
                                                                <img alt="" src="<?php echo e(asset(Storage::url('uploads/store_logo/'.(!empty($storethemesetting['testimonial_img2'])?$storethemesetting['testimonial_img1']:'qo.png')))); ?>" class="avatar rounded-circle">
                                                            </div>
                                                            <div class="pl-3">
                                                                <h5 class="t-author t-black14"><?php echo e($storethemesetting['testimonial_name2']); ?></h5>
                                                                <small class="d-block t-author-dcs"><?php echo e($storethemesetting['testimonial_about_us2']); ?></small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(isset($storethemesetting['enable_testimonial3']) && $storethemesetting['enable_testimonial3']=='on'): ?>
                                            <div class="swiper-slide p-3">
                                                <div class="card bg-transparent">
                                                    <div class="card-body">
                                                        <p class="t-dcs t-gray"><?php echo e($storethemesetting['testimonial_description2']); ?></p>
                                                        <div class="d-flex align-items-center">
                                                            <div>
                                                                <img alt="" src="<?php echo e(asset(Storage::url('uploads/store_logo/'.(!empty($storethemesetting['testimonial_img3'])?$storethemesetting['testimonial_img1']:'qo.png')))); ?>" class="avatar rounded-circle">
                                                            </div>
                                                            <div class="pl-3">
                                                                <h5 class="t-author t-black14"><?php echo e($storethemesetting['testimonial_name3']); ?></h5>
                                                                <small class="d-block t-author-dcs"><?php echo e($storethemesetting['testimonial_about_us3']); ?></small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <!-- Add Pagination -->
                                <div class="swiper-pagination w-100 mt-4 d-flex align-items-center justify-content-center"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Client Logo -->
    <?php if(isset($storethemesetting['enable_brand_logo']) && $storethemesetting['enable_brand_logo']=='on'): ?>
        <div class="client-logo">
            <div class="container">
                <div class="row">
                    <?php if(!empty($storethemesetting['brand_logo'])): ?>
                        <?php $__currentLoopData = explode(',',$storethemesetting['brand_logo']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                                <a href="#">
                                    <?php if(!empty($value) && \Storage::exists('uploads/store_logo/'.$value)): ?>
                                        <img src="<?php echo e(asset(Storage::url('uploads/store_logo/').(!empty($value)?$value:'storego-image.png'))); ?>" alt="Footer logo">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset(Storage::url('uploads/logo/brand_logo.png'))); ?>" alt="Footer logo">
                                    <?php endif; ?>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        $(".add_to_cart").click(function (e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            var variants = [];
            $(".variant-selection").each(function (index, element) {
                variants.push(element.value);
            });

            if (jQuery.inArray('', variants) != -1) {
                show_toastr('Error', "<?php echo e(__('Please select all option.')); ?>", 'error');
                return false;
            }
            var variation_ids = $('#variant_id').val();

            $.ajax({
                url: '<?php echo e(route('user.addToCart', ['__product_id',$store->slug,'variation_id'])); ?>'.replace('__product_id', id).replace('variation_id', variation_ids ?? 0),
                type: "POST",
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    variants: variants.join(' : '),
                },
                success: function (response) {
                    if (response.status == "Success") {
                        show_toastr('Success', response.success, 'success');
                        $("#shoping_counts").html(response.item_count);
                    } else {
                        show_toastr('Error', response.error, 'error');
                    }
                },
                error: function (result) {
                    console.log('error');
                }
            });
        });

        $(document).on('click', '.add_to_wishlist', function (e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            $.ajax({
                type: "POST",
                url: '<?php echo e(route('store.addtowishlist', [$store->slug,'__product_id'])); ?>'.replace('__product_id', id),
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                },
                success: function (response) {
                    if (response.status == "Success") {
                        show_toastr('Success', response.message, 'success');
                        $('.wishlist_' + response.id).removeClass('add_to_wishlist');
                        $('.wishlist_' + response.id).html('<i class="fas fa-heart"></i>');
                        $('.wishlist_count').html(response.count);
                    } else {
                        show_toastr('Error', response.message, 'error');
                    }
                },
                error: function (result) {
                }
            });
        });

        $(".productTab").click(function (e) {
            e.preventDefault();
            $('.productTab').removeClass('active')

        });

        $("#pro_scroll").click(function () {
            $('html, body').animate({
                scrollTop: $("#pro_items").offset().top
            }, 1000);
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.theme1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\MY PROJECT\LARAVEL\1. From Fiver\storego-saas-v3.0\main_file\resources\views/storefront/theme1/index.blade.php ENDPATH**/ ?>