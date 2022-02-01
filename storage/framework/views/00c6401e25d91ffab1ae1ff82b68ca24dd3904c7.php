<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Store')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 "><?php echo e(__('Store')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <a href="<?php echo e(route('store.subDomain')); ?>" class="btn btn-sm btn-white bor-radius">
        <?php echo e(__('Sub Domain')); ?>

    </a>
    <a href="<?php echo e(route('store.customDomain')); ?>" class="btn btn-sm btn-white bor-radius">
        <?php echo e(__('Custom Domain')); ?>

    </a>
    <a href="<?php echo e(route('store.grid')); ?>" data-title="<?php echo e(__('Create New Store')); ?>" class="btn btn-sm btn-white bor-radius">
        <?php echo e(__('Grid View')); ?>

    </a>
    <a href="#" data-size="lg" data-url="<?php echo e(route('store-resource.create')); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Create New Store')); ?>" class="btn btn-sm btn-white btn-icon-only rounded-circle">
        <i class="fa fa-plus"></i>
    </a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('filter'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/summernote/summernote-bs4.css')); ?>">

<?php $__env->stopPush(); ?>
<?php $__env->startPush('script-page'); ?>
    <script src="<?php echo e(asset('assets/libs/summernote/summernote-bs4.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Listing -->
    <div class="card">
        <!-- Card header -->
        <div class="card-header actions-toolbar">
            <div class="actions-search" id="actions-search">
                <div class="input-group input-group-merge input-group-flush">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-transparent"><i class="far fa-search"></i></span>
                    </div>
                    <input type="text" class="form-control form-control-flush" placeholder="Type and hit enter ...">
                    <div class="input-group-append">
                        <a href="#" class="input-group-text bg-transparent" data-action="search-close" data-target="#actions-search"><i class="far fa-times"></i></a>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between align-items-center">
                <div class="col">
                    <h6 class="d-inline-block mb-0"><?php echo e(__('All Store')); ?></h6>
                </div>
            </div>
        </div>
        <!-- Table -->
        <div class="table-responsive">
            <table class="table align-items-center">
                <thead>
                <tr>
                    <th scope="col"><?php echo e(__('User Name')); ?></th>
                    <th scope="col"><?php echo e(__('Email')); ?></th>
                    <th scope="col"><?php echo e(__('Stores')); ?></th>
                    <th scope="col"><?php echo e(__('Plan')); ?></th>
                    <th scope="col"><?php echo e(__('Created At')); ?></th>
                    <th scope="col" class="text-right"><?php echo e(__('Action')); ?></th>
                </tr>
                </thead>
                <tbody class="list">
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($usr->name); ?></td>
                        <td><?php echo e($usr->email); ?></td>
                        <td><?php echo e($usr->stores->count()); ?></td>
                        <td><?php echo e(!empty($usr->currentPlan->name)?$usr->currentPlan->name:'-'); ?></td>
                        <td><?php echo e(\App\Models\Utility::dateFormat($usr->created_at)); ?></td>
                        <td class="text-right">
                            <!-- Actions -->
                            <div class="actions ml-3">
                                <a href="#" data-size="lg" data-url="<?php echo e(route('store-resource.edit',$usr->id)); ?>" data-ajax-popup="true" class="action-item" data-title="<?php echo e(__('Edit Store')); ?>" data-toggle="tooltip" title="" data-original-title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" class="action-item" data-size="lg" data-url="<?php echo e(route('plan.upgrade',$usr->id)); ?>" data-ajax-popup="true" data-toggle="tooltip" data-title="<?php echo e(__('Upgrade Plan')); ?>">
                                    <i class="fas fa-trophy"></i>
                                </a>
                                <a href="#" class="action-item" data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="<?php echo e(__('Are You Sure?').' | '.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-form-<?php echo e($usr->id); ?>').submit();">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['store-resource.destroy', $usr->id],'id'=>'delete-form-'.$usr->id]); ?>

                                <?php echo Form::close(); ?>

                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        $(document).on('click', '#billing_data', function () {
            $("[name='shipping_address']").val($("[name='billing_address']").val());
            $("[name='shipping_city']").val($("[name='billing_city']").val());
            $("[name='shipping_state']").val($("[name='billing_state']").val());
            $("[name='shipping_country']").val($("[name='billing_country']").val());
            $("[name='shipping_postalcode']").val($("[name='billing_postalcode']").val());
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\MY PROJECT\LARAVEL\1. From Fiver\storego-saas-v3.0\main_file\resources\views/admin_store/index.blade.php ENDPATH**/ ?>