<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Shipping')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <a href="<?php echo e(route('shipping.export')); ?>" class="btn btn-sm btn-white bor-radius ml-4">
        <i class="fa fa-file-excel"></i> <?php echo e(__('Export')); ?>

    </a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card">
        <ul class="nav nav-tabs nav-overflow profile-tab-list" role="tablist">
            <li class="nav-item ml-4">
                <a href="#location" id="location_tab" class="nav-link active" data-toggle="tab" role="tab" aria-controls="home" aria-selected="true">
                    <i class="fas fa-location-arrow mr-2"></i><?php echo e(__('Location')); ?>

                </a>
            </li>
            <li class="nav-item ml-4">
                <a href="#shipping" id="shipping_tab" class="nav-link" data-toggle="tab" role="tab" aria-controls="home" aria-selected="true">
                    <i class="fas fa-shipping-fast mr-2"></i>
                    <?php echo e(__('Shipping')); ?>

                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="location" role="tabpanel" aria-labelledby="orders-tab">
                <!-- Table -->
                <div class="table-responsive">
                    <div class="employee_menu view_employee">
                        <div class="card-header actions-toolbar border-0">
                            <div class="row justify-content-between align-items-center">
                                <div class="col">
                                    <h6 class="d-inline-block mb-0 text-capitalize"><?php echo e(__('Location')); ?></h6>
                                </div>
                                <div class="col text-right">
                                    <div class="actions">
                                        <div class="rounded-pill d-inline-block search_round">
                                            <div class="input-group input-group-sm input-group-merge input-group-flush">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-transparent"><i class="fas fa-search"></i></span>
                                                </div>
                                                <input type="text" id="user_keyword" class="form-control form-control-flush search-user" placeholder="<?php echo e(__('Search Location')); ?>">
                                            </div>
                                        </div>
                                        <a href="#" data-size="lg" data-url="<?php echo e(route('location.create')); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Create New Location')); ?>" class="btn btn-sm btn-primary btn-icon-only rounded-circle">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table align-items-center employee_tableese">
                                <thead>
                                <tr>
                                    <th scope="col" class="sort" data-sort="name"><?php echo e(__('Name')); ?></th>
                                    <th scope="col" class="sort" data-sort="name"><?php echo e(__('Created At')); ?></th>
                                    <th class="text-right"><?php echo e(__('Action')); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr data-name="<?php echo e($location->name); ?>">
                                        <td class="sorting_1"><?php echo e($location->name); ?></td>
                                        <td class="sorting_1"><?php echo e(\App\Models\Utility::dateFormat($location->created_at)); ?></td>
                                        <td class="action text-right">
                                            <a href="#" data-size="lg" data-url="<?php echo e(route('location.edit',$location->id)); ?>" data-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Edit type')); ?>" class="action-item"> <i class="far fa-edit"></i>
                                            </a>
                                            <a href="#" class="action-item" data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="<?php echo e(__('Are You Sure?').' | '.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-form-<?php echo e($location->id); ?>').submit();">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['location.destroy', $location->id],'id'=>'delete-location-form-'.$location->id]); ?>

                                            <?php echo Form::close(); ?>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-pane" id="shipping" role="tabpanel" aria-labelledby="orders-tab">
                <div class="table-responsive">
                    <div class="employee_menu view_employee">
                        <div class="card-header actions-toolbar border-0">
                            <div class="row justify-content-between align-items-center">
                                <div class="col">
                                    <h6 class="d-inline-block mb-0 text-capitalize"><?php echo e(__('Shipping')); ?></h6>
                                </div>
                                <div class="col text-right">
                                    <div class="actions">
                                        <div class="rounded-pill d-inline-block search_round">
                                            <div class="input-group input-group-sm input-group-merge input-group-flush">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-transparent"><i class="fas fa-search"></i></span>
                                                </div>
                                                <input type="text" id="user_keyword" class="form-control form-control-flush search-user" placeholder="<?php echo e(__('Search Shipping')); ?>">
                                            </div>
                                        </div>
                                        <a href="#" data-size="lg" data-url="<?php echo e(route('shipping.create')); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Create New Shipping')); ?>" class="btn btn-sm btn-primary btn-icon-only rounded-circle">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table align-items-center employee_tableese">
                                <thead>
                                <tr>
                                    <th scope="col" class="sort" data-sort="name"><?php echo e(__('Name')); ?></th>
                                    <th scope="col" class="sort" data-sort="name"><?php echo e(__('Price')); ?></th>
                                    <th scope="col" class="sort" data-sort="name"><?php echo e(__('Location')); ?></th>
                                    <th scope="col" class="sort" data-sort="name"><?php echo e(__('Created At')); ?></th>
                                    <th class="text-right"><?php echo e(__('Action')); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $shippings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipping): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr data-name="<?php echo e($shipping->name); ?>">
                                        <td class="sorting_1"><?php echo e($shipping->name); ?></td>
                                        <td class="sorting_1"><?php echo e(\App\Models\Utility::priceFormat($shipping->price)); ?></td>
                                        <td class="sorting_1"><?php echo e(!empty($shipping->locationName()) ? $shipping->locationName() :'-'); ?></td>
                                        <td class="sorting_1"><?php echo e(\App\Models\Utility::dateFormat($shipping->created_at)); ?></td>
                                        <td class="action text-right">
                                            <a href="#" data-size="lg" data-url="<?php echo e(route('shipping.edit',$shipping->id)); ?>" data-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Edit type')); ?>" class="action-item"> <i class="far fa-edit"></i>
                                            </a>
                                            <a href="#" class="action-item" data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="<?php echo e(__('Are You Sure?').' | '.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-form-<?php echo e($shipping->id); ?>').submit();">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['shipping.destroy', $shipping->id],'id'=>'delete-form-'.$shipping->id]); ?>

                                            <?php echo Form::close(); ?>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        $(document).ready(function () {
            $(document).on('keyup', '.search-user', function () {
                var value = $(this).val();
                $('.employee_tableese tbody>tr').each(function (index) {
                    var name = $(this).attr('data-name');
                    if (name.includes(value)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\MY PROJECT\LARAVEL\1. From Fiver\storego-saas-v3.0\main_file\resources\views/shipping/index.blade.php ENDPATH**/ ?>