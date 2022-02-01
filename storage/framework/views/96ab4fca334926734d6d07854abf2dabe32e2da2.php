<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Sub Domain')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 "><?php echo e(__('Domain')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <a href="<?php echo e(route('store.customDomain')); ?>" class="btn btn-sm btn-white bor-radius">
        <?php echo e(__('Custom Domain')); ?>

    </a>
    <a href="<?php echo e(route('store.grid')); ?>" data-title="<?php echo e(__('Create New Store')); ?>" class="btn btn-sm btn-white bor-radius">
        <?php echo e(__('Grid View')); ?>

    </a>
    <a href="<?php echo e(route('store-resource.index')); ?>" class="btn btn-sm btn-white bor-radius">
        <?php echo e(__('List View')); ?>

    </a>
    <a href="#" data-size="lg" data-url="<?php echo e(route('store-resource.create')); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Create New Store')); ?>" class="btn btn-sm btn-white btn-icon-only rounded-circle">
        <i class="fa fa-plus"></i>
    </a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('filter'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Listing -->
    <div class="card">
        <!-- Card header -->
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <!-- Table -->
        <div class="table-responsive">
            <table class="table align-items-center">
                <thead>
                <tr>
                    <th scope="col"><?php echo e(__('Custom Domain Name')); ?></th>
                    <th scope="col"><?php echo e(__('Store Name')); ?></th>
                    <th scope="col"><?php echo e(__('Email')); ?></th>

                </tr>
                </thead>
                <tbody class="list">
                <?php $__currentLoopData = $stores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <?php echo e($store->subdomain); ?>

                        </td>
                        <td>
                            <?php echo e($store->name); ?>

                        </td>
                        <td>
                            <?php echo e(($store->email)); ?>

                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\MY PROJECT\LARAVEL\1. From Fiver\storego-saas-v3.0\main_file\resources\views/admin_store/subdomain.blade.php ENDPATH**/ ?>