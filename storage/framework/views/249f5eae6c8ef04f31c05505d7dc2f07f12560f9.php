<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Email Templates')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h5 d-inline-block text-white font-weight-bold mb-0 "><?php echo e(__('Email Templates')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script type="text/javascript">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('On-Off Email Template')): ?>
        $(document).on("click", ".email-template-checkbox", function () {
            var chbox = $(this);
            $.ajax({
                url: chbox.attr('data-url'),
                data: {_token: $('meta[name="csrf-token"]').attr('content'), status: chbox.val()},
                type: 'PUT',
                success: function (response) {
                    if (response.is_success) {
                        show_toastr('Success', response.success, 'success');
                        if (chbox.val() == 1) {
                            $('#' + chbox.attr('id')).val(0);
                        } else {
                            $('#' + chbox.attr('id')).val(1);
                        }
                    } else {
                        show_toastr('Error', response.error, 'error');
                    }
                },
                error: function (response) {
                    response = response.responseJSON;
                    if (response.is_success) {
                        show_toastr('Error', response.error, 'error');
                    } else {
                        show_toastr('Error', response, 'error');
                    }
                }
            })
        });
        <?php endif; ?>
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('action-btn'); ?>
    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th width="92%"> <?php echo e(__('Name')); ?></th>
                                <?php if(\Auth::user()->type == 'Super Admin'): ?>
                                    <th> <?php echo e(__('Action')); ?></th>
                                <?php elseif(\Auth::user()->type == 'Owner'): ?>
                                    <th> <?php echo e(__('On/Off')); ?></th>
                                <?php endif; ?>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $EmailTemplates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $EmailTemplate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($EmailTemplate->name); ?></td>
                                    <td class="">
                                        <a href="<?php echo e(route('manage.email.language',[$EmailTemplate->id,\Auth::user()->lang])); ?>" class="edit-icon">
                                            <i class="fas fa-eye"></i>
                                        </a>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\MY PROJECT\LARAVEL\1. From Fiver\storego-saas-v3.0\main_file\resources\views/email_templates/index.blade.php ENDPATH**/ ?>