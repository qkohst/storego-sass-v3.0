<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Order')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0"><?php echo e(__('Orders')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <a href="<?php echo e(route('order.export')); ?>" class="btn btn-sm btn-white bor-radius ml-4">
        <i class="fa fa-file-excel"></i> <?php echo e(__('Export')); ?>

    </a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('filter'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="table-responsive">
            <table class="table align-items-center">
                <thead>
                <tr>
                    <th scope="col"><?php echo e(__('Order')); ?></th>
                    <th scope="col" class="sort"><?php echo e(__('Date')); ?></th>
                    <th scope="col" class="sort"><?php echo e(__('Name')); ?></th>
                    <th scope="col" class="sort"><?php echo e(__('Value')); ?></th>
                    <th scope="col" class="sort"><?php echo e(__('Payment Type')); ?></th>
                    <th scope="col" class="text-right"><?php echo e(__("Action")); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th scope="row">
                            <a href="<?php echo e(route('orders.show',\Illuminate\Support\Facades\Crypt::encrypt($order->id))); ?>" class="btn btn-sm btn-white btn-icon rounded-pill text-dark">
                                <span class="btn-inner--text"><?php echo e('#'.$order->order_id); ?></span>
                            </a>
                        </th>
                        <td class="order">
                            <span class="h6 text-sm font-weight-bold mb-0"><?php echo e(\App\Models\Utility::dateFormat($order->created_at)); ?></span>
                        </td>
                        <td>
                            <span class="client"><?php echo e($order->name); ?></span>
                        </td>
                        <td>
                            <span class="value text-sm mb-0"><?php echo e(\App\Models\Utility::priceFormat($order->price)); ?></span>
                        </td>
                        <td>
                            <span class="taxes text-sm mb-0"><?php echo e($order->payment_type); ?></span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center justify-content-end">
                                <?php if($order->status != 'Cancel Order'): ?>
                                    <button type="button" class="btn btn-sm <?php echo e(($order->status == 'pending')?'btn-soft-info':'btn-soft-success'); ?> btn-icon rounded-pill">
                                        <span class="btn-inner--icon">
                                         <?php if($order->status == 'pending'): ?>
                                                <i class="fas fa-check soft-success"></i>
                                            <?php else: ?>
                                                <i class="fa fa-check-double soft-success"></i>
                                            <?php endif; ?>
                                        </span>
                                        <?php if($order->status == 'pending'): ?>
                                            <span class="btn-inner--text">
                                                <?php echo e(__('Pending')); ?>: <?php echo e(\App\Models\Utility::dateFormat($order->created_at)); ?>

                                            </span>
                                        <?php else: ?>
                                            <span class="btn-inner--text">
                                                <?php echo e(__('Delivered')); ?>: <?php echo e(\App\Models\Utility::dateFormat($order->updated_at)); ?>

                                            </span>
                                        <?php endif; ?>
                                    </button>
                                <?php else: ?>
                                    <button type="button" class="btn btn-sm btn-soft-danger btn-icon rounded-pill">
                                        <span class="btn-inner--icon">
                                            <?php if($order->status == 'pending'): ?>
                                                <i class="fas fa-check soft-success"></i>
                                            <?php else: ?>
                                                <i class="fa fa-check-double soft-success"></i>
                                            <?php endif; ?>
                                        </span>
                                        <span class="btn-inner--text">
                                            <?php echo e(__('Cancel Order')); ?>: <?php echo e(\App\Models\Utility::dateFormat($order->created_at)); ?>

                                        </span>
                                    </button>
                            <?php endif; ?>
                            <!-- Actions -->
                                <div class="actions ml-3">
                                    <a href="<?php echo e(route('orders.show',\Illuminate\Support\Facades\Crypt::encrypt($order->id))); ?>" class="action-item mr-2" data-toggle="tooltip" data-title="<?php echo e(__('Details')); ?>">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="#" class="action-item mr-2 " data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="<?php echo e(__('Are You Sure?').' | '.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-form-<?php echo e($order->id); ?>').submit();">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['orders.destroy', $order->id],'id'=>'delete-form-'.$order->id]); ?>

                                    <?php echo Form::close(); ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\MY PROJECT\LARAVEL\1. From Fiver\storego-saas-v3.0\main_file\resources\views/orders/index.blade.php ENDPATH**/ ?>