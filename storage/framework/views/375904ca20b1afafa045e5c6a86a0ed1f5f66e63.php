<?php
$logo =asset(Storage::url('uploads/logo/'));
$company_logo =\App\Models\Utility::getValByName('company_logo');
$user = \Auth::user();
$plan = \App\Models\Plan::where('id', $user->plan)->first();
?>
<nav class="navbar navbar-main navbar-expand-lg navbar-dark bg-primary navbar-border" id="navbar-main">
    <div class="container-fluid">
        <!-- Brand + Toggler (for mobile devices) -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-main-collapse" aria-controls="navbar-main-collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- User's navbar -->
        <div class="navbar-user d-lg-none ml-auto">
            <ul class="navbar-nav flex-row align-items-center">
                <li class="nav-item dropdown dropdown-animate">
                    <a class="nav-link pr-lg-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="<?php echo e(asset(Storage::url('uploads/profile/'.(!empty($user['avatar'])?$user['avatar']:'avatar.png')))); ?>">
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right dropdown-menu-arrow">
                        <h6 class="dropdown-header px-0">Hi, <?php echo e(\Auth::user()->name); ?>!</h6>
                        <a href="<?php echo e(route('profile')); ?>" class="dropdown-item">
                            <i class="fas fa-user"></i>
                            <span><?php echo e(__('My profile')); ?></span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="dropdown-item has-icon text-danger">
                            <i class="fas fa-sign-out-alt"></i>
                            <span><?php echo e(__('Logout')); ?></span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
        <!-- Navbar nav -->
        <div class="collapse navbar-collapse navbar-collapse-fade" id="navbar-main-collapse">
            <ul class="navbar-nav align-items-lg-center">
                <!-- Overview  -->
                <li class="nav-item">
                    <div class="d-flex align-items-center mr-5">
                        <a class="navbar-brand" href="<?php echo e(route('dashboard')); ?>">
                            <?php if(\Illuminate\Support\Facades\Auth::user()->type == 'super admin'): ?>
                            <img class="img-fluid" src="<?php echo e($logo.'/logo.png'); ?>" alt="Store logo" height="40px">
                            <?php else: ?>
                            <img class="img-fluid" src="<?php echo e($logo.'/'.(isset($company_logo) && !empty($company_logo)?$company_logo:'logo.png')); ?>" alt="Store logo" height="40px">
                            <!-- <img class="img-fluid" src="/storage/uplasseoads/img/coingate.png" alt="Store logo Coba" height="40px"> -->
                            <?php endif; ?>
                        </a>
                    </div>
                </li>
                <li class="border-top opacity-2 my-2"></li>
                <!-- Home  -->

                <?php if(Auth::user()->type == 'Owner'): ?>
                <li class="nav-item dropdown dropdown-animate" data-toggle="hover">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo e(__('Dashboard')); ?>

                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow p-lg-0">
                        <!-- Top dropdown menu -->
                        <div class="p-lg-4">
                            <a class="dropdown-item" href="<?php echo e(route('dashboard')); ?>">
                                <?php echo e(__('Dashboard')); ?>

                            </a>
                            <a class="dropdown-item" href="<?php echo e(route('storeanalytic')); ?>">
                                <?php echo e(__('Store Analytics')); ?>

                            </a>
                        </div>
                    </div>
                </li>
                <!-- Application menu -->
                <li class="nav-item dropdown dropdown-animate" data-toggle="hover">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo e(__('Shop')); ?>

                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow p-lg-0">
                        <!-- Top dropdown menu -->
                        <div class="p-lg-4">
                            <a class="dropdown-item" href="<?php echo e(route('product.index')); ?>">
                                <?php echo e(__('Products')); ?>

                            </a>
                            <a href="<?php echo e(route('product_categorie.index')); ?>" class="dropdown-item" role="button">
                                <?php echo e(__('Product Category')); ?>

                            </a>
                            <a href="<?php echo e(route('product_tax.index')); ?>" class="dropdown-item" role="button">
                                <?php echo e(__('Product Tax')); ?>

                            </a>
                            <a href="<?php echo e(route('product-coupon.index')); ?>" class="dropdown-item" role="button">
                                <?php echo e(__('Product Coupon')); ?>

                            </a>
                            <a href="<?php echo e(route('subscriptions.index')); ?>" class="dropdown-item" role="button">
                                <?php echo e(__('Subscriber')); ?>

                            </a>
                            <?php if($plan->shipping_method == 'on'): ?>
                            <a href="<?php echo e(route('shipping.index')); ?>" class="dropdown-item" role="button">
                                <?php echo e(__('Shipping')); ?>

                            </a>
                            <?php endif; ?>
                            <?php if($plan->additional_page == 'on'): ?>
                            <a href="<?php echo e(route('custom-page.index')); ?>" class="dropdown-item" role="button">
                                <?php echo e(__('Custom Page')); ?>

                            </a>
                            <?php endif; ?>
                            <?php if($plan->blog == 'on'): ?>
                            <a href="<?php echo e(route('blog.index')); ?>" class="dropdown-item" role="button">
                                <?php echo e(__('Blog')); ?>

                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('orders.index')); ?>" class="nav-link">
                        <span><?php echo e(__('Orders')); ?></span>
                    </a>
                </li>
                <?php endif; ?>

                <?php if(Auth::user()->type == 'super admin'): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('dashboard')); ?>" class="nav-link">
                        <span><?php echo e(__('Dashboard')); ?></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('store-resource.index')); ?>" class="nav-link">
                        <span><?php echo e(__('Stores')); ?></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('coupons.index')); ?>" class="nav-link">
                        <span> <?php echo e(__('Coupons')); ?> </span>
                    </a>
                </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('plans.index')); ?>" class="nav-link">
                        <span> <?php echo e(__('Plans')); ?> </span>
                    </a>
                </li>
                <?php if(Auth::user()->type == 'super admin'): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('manage.language',[$currantLang])); ?>" class="nav-link <?php echo e((Request::segment(1) == 'manage-language')?'active':''); ?>">
                        <?php echo e(__('Language')); ?>

                    </a>
                </li>
                <?php endif; ?>
                <?php if(Auth::user()->type == 'super admin'): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('custom_landing_page.index')); ?>" class="nav-link">
                        <?php echo e(__('Landing page')); ?>

                    </a>
                </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('settings')); ?>">
                        <?php if(Auth::user()->type == 'super admin'): ?>
                        <?php echo e(__('Settings')); ?>

                        <?php else: ?>
                        <?php echo e(__('Store Settings')); ?>

                        <?php endif; ?>
                    </a>
                </li>
                <?php if(Auth::user()->type == 'super admin'): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('plan_request.index')); ?>">
                        <?php echo e(__('Plan Request')); ?>

                    </a>
                </li>
                <?php endif; ?>
                <?php if(Auth::user()->type == 'super admin'): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('email_template.index')); ?>">
                        <?php echo e(__('Email Templates')); ?>

                    </a>
                </li>
                <?php endif; ?>
                <li class="border-top opacity-2 my-2"></li>
            </ul>
            <!-- Right menu -->
            <ul class="navbar-nav ml-lg-auto align-items-center float-left wsdb vhdasgvc">
                <?php if(Auth::user()->type == 'Owner'): ?>
                <li class="nav-item dropdown dropdown-animate">
                    <a class="nav-link pr-lg-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media media-pill align-items-center p-2">
                            <?php $__currentLoopData = \Auth::user()->stores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(\Auth::user()->current_store == $store->id): ?>
                            <div class="d-lg-block">
                                <span class="mb-0 text-sm  font-weight-bold"><img src="<?php echo e($logo.'/'.(isset($favicon) && !empty($favicon)?$favicon:'favicon.png')); ?>" type="image" width="20px"><?php echo e($store->name); ?></span>
                            </div>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right dropdown-menu-arrow">
                        <?php $__currentLoopData = Auth::user()->stores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($store->is_active): ?>
                        <a href="<?php if(Auth::user()->current_store == $store->id): ?>#<?php else: ?> <?php echo e(route('change_store',$store->id)); ?> <?php endif; ?>" title="<?php echo e($store->name); ?>" class="dropdown-item notify-item">
                            <?php if(Auth::user()->current_store == $store->id): ?>
                            <i class="fas fa-check"></i>
                            <?php endif; ?>
                            <span><?php echo e($store->name); ?></span>
                        </a>
                        <?php else: ?>
                        <a href="#" class="dropdown-item notify-item" title="<?php echo e(__('Locked')); ?>">
                            <i class="fas fa-lock"></i>
                            <span><?php echo e($store->name); ?></span>
                            <?php if(isset($store->pivot->permission)): ?>
                            <?php if($store->pivot->permission =='Owner'): ?>
                            <span class="badge badge-primary"><?php echo e(__($store->pivot->permission)); ?></span>
                            <?php else: ?>
                            <span class="badge badge-secondary"><?php echo e(__('Shared')); ?></span>
                            <?php endif; ?>
                            <?php endif; ?>
                        </a>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="dropdown-divider"></div>
                        <?php if(auth()->guard('web')->check()): ?>
                        <?php if(Auth::user()->type == 'Owner'): ?>
                        <a href="#" data-size="lg" data-url="<?php echo e(route('store-resource.create')); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Create New Store')); ?>" class="dropdown-item notify-item">
                            <i class="fa fa-plus"></i><span><?php echo e(__('Create New Store')); ?></span>
                        </a>
                        <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </li>
                <?php endif; ?>

                <li class="nav-item dropdown dropdown-animate float-left responsive_none">
                    <a class="nav-link pr-lg-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media media-pill align-items-center">
                            <span class="avatar rounded-circle avatar_img">
                                <img alt="Image placeholder" src="<?php echo e(asset(Storage::url('uploads/profile/'.(!empty($user['avatar'])?$user['avatar']:'avatar.png')))); ?>">
                            </span>
                            <div class="ml-2 d-none d-lg-block avatar_name">
                                <span class="mb-0 text-sm  font-weight-bold"><?php echo e(\Auth::user()->name); ?></span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right dropdown-menu-arrow">
                        <h6 class="dropdown-header px-0"><?php echo e(__('Hi')); ?>, <?php echo e(\Auth::user()->name); ?>!</h6>
                        <a href="<?php echo e(route('profile')); ?>" class="dropdown-item">
                            <i class="fas fa-user"></i>
                            <span><?php echo e(__('My profile')); ?></span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="dropdown-item has-icon text-danger">
                            <i class="fas fa-sign-out-alt"></i>
                            <span><?php echo e(__('Logout')); ?></span>
                        </a>
                        <form id="frm-logout" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                            <?php echo e(csrf_field()); ?>

                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav><?php /**PATH E:\MY PROJECT\LARAVEL\1. From Fiver\storego-saas-v3.0\main_file\resources\views/partials/admin/header.blade.php ENDPATH**/ ?>