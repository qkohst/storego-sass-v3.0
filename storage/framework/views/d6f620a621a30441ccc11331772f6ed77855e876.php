<?php ( $store_logo=asset(Storage::url('uploads/product_image/'))); ?>

<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Product Categorie')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h5 d-inline-block text-white font-weight-bold mb-0 "><?php echo e(__('Product Categorie')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="#"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item active text-white" aria-current="page"><?php echo e(__('Product Categorie')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <a href="#" data-size="lg" data-url="<?php echo e(route('product_categorie.create')); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Create New Product Category')); ?>" class="btn btn-sm btn-white btn-icon-only rounded-circle">
        <i class="fa fa-plus"></i>
    </a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('filter'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card">
        <!-- Table -->
        <div class="table-responsive">
            <div class="employee_menu view_employee">
                <div class="card-header actions-toolbar border-0">
                    <div class="row justify-content-between align-items-center">
                        <div class="col">
                            <h6 class="d-inline-block mb-0 text-capitalize"><?php echo e(__('Categories')); ?></h6>
                        </div>
                        <div class="col text-right">
                            <div class="actions">
                                <div class="rounded-pill d-inline-block search_round">
                                    <div class="input-group input-group-sm input-group-merge input-group-flush">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-transparent"><i class="fas fa-search"></i></span>
                                        </div>
                                        <input type="text" id="user_keyword" class="form-control form-control-flush search-user" placeholder="<?php echo e(__('Search Categories')); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Table -->
                <div class="table-responsive">
                    <table class="table align-items-center employee_tableese">
                        <thead>
                        <tr>
                            <th scope="col" class="sort" data-sort="name"><?php echo e(__('Categorie Name')); ?></th>
                            <th class="text-right"><?php echo e(__('Action')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $product_categorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr data-name="<?php echo e($product_category->name); ?>">
                                <td scope="row">
                                    <div class="media align-items-center">
                                        <div>
                                            <?php if($product_category->categorie_img): ?>
                                                <img alt="Image placeholder" src="<?php echo e($store_logo); ?>/<?php echo e($product_category->categorie_img); ?>" class="rounded-circle" style="width: 80px; height: 80px;">
                                            <?php else: ?>
                                                <img alt="Image placeholder" src="<?php echo e($store_logo); ?>/default.jpg" class="rounded-circle" style="width: 100px; height: 80px;">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </td>
                                <td class="sorting_1"><?php echo e($product_category->name); ?></td>
                                <td class="action text-right">
                                    <a href="#" data-size="lg" data-url="<?php echo e(route('product_categorie.edit',$product_category->id)); ?>" data-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Edit Categories')); ?>" class="action-item">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <a href="#" class="action-item" data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="<?php echo e(__('Are You Sure?').' | '.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-form-<?php echo e($product_category->id); ?>').submit();">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['product_categorie.destroy', $product_category->id],'id'=>'delete-form-'.$product_category->id]); ?>

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
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        $(document).ready(function () {
            $(document).on('keyup', '.search-user', function () {
            var value = $(this).val();
            $('.employee_tableese tbody>tr').each(function (index) {
                var name = $(this).attr('data-name').toLowerCase();
                if (name.includes(value.toLowerCase())) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\MY PROJECT\LARAVEL\1. From Fiver\storego-saas-v3.0\main_file\resources\views/product_category/index.blade.php ENDPATH**/ ?>