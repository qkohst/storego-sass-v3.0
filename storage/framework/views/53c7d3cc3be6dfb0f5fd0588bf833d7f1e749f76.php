<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Coupons')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 "><?php echo e(__('Coupons')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <a href="#" data-size="lg" data-url="<?php echo e(route('coupons.create')); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Add Coupon')); ?>" class="btn btn-sm btn-white bor-radius">
        <i class="fa fa-plus"> <?php echo e(__('Add Coupon')); ?></i>
    </a>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        $(document).on('click', '#code-generate', function () {
            var length = 10;
            var result = '';
            var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            var charactersLength = characters.length;
            for (var i = 0; i < length; i++) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }
            $('#auto-code').val(result);
        });
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="selection-datatable" class="table table-hover" width="100%">
                            <thead class="thead-light">
                            <tr>
                                <th> <?php echo e(__('Name')); ?></th>
                                <th> <?php echo e(__('Code')); ?></th>
                                <th> <?php echo e(__('Discount (%)')); ?></th>
                                <th> <?php echo e(__('Limit')); ?></th>
                                <th> <?php echo e(__('Used')); ?></th>
                                <th class="text-right"> <?php echo e(__('Action')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="font-style">
                                    <td><?php echo e($coupon->name); ?></td>
                                    <td><?php echo e($coupon->code); ?></td>
                                    <td><?php echo e($coupon->discount); ?></td>
                                    <td><?php echo e($coupon->limit); ?></td>
                                    <td><?php echo e($coupon->used_coupon()); ?></td>
                                    <td class="text-right">

                                        <a href="<?php echo e(route('coupons.show',$coupon->id)); ?>" class="action-item" data-toggle="tooltip" data-original-title="<?php echo e(__('Details')); ?>">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="#" class="action-item" data-size="lg" data-ajax-popup="true" data-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>" data-url="<?php echo e(route('coupons.edit',[$coupon->id])); ?>">
                                            <i class="fas fa-edit"></i></a>

                                        <a href="#" class="action-item" data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="<?php echo e(__('Are You Sure?').' | '.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-form-<?php echo e($coupon->id); ?>').submit();">
                                            <i class="fas fa-trash"></i></a>
                                        </a>
                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['coupons.destroy', $coupon->id],'id'=>'delete-form-'.$coupon->id]); ?>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\MY PROJECT\LARAVEL\1. From Fiver\storego-saas-v3.0\main_file\resources\views/coupon/index.blade.php ENDPATH**/ ?>