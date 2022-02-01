<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Product')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 "><?php echo e(__('Product')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <a href="<?php echo e(route('product.index')); ?>" class="btn btn-sm btn-white bor-radius ml-4">
        <?php echo e(__('List View')); ?>

    </a>
    <a href="<?php echo e(route('product.create')); ?>" class="btn btn-sm btn-white btn-icon-only rounded-circle">
        <i class="fa fa-plus"></i>
    </a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('filter'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 col-sm-6">
                <div class="card card-product">
                    <div class="card-header border-0">
                        <h2 class="h6">
                            <a href="<?php echo e(route('product.show',$product->id)); ?>"><?php echo e($product->name); ?></a>
                        </h2>
                    </div>
                    <!-- Product image -->
                    <figure class="figure">
                        <img alt="Image placeholder" src="<?php echo e(asset(Storage::url('uploads/is_cover_image/'.$product->is_cover))); ?>" class="img-center img-fluid">
                    </figure>
                    <div class="card-body">
                        <!-- Price -->
                        <div class="d-flex align-items-center mt-4">
                            <span class="h6 mb-0"><?php echo e(\App\Models\Utility::priceFormat($product->price)); ?></span>
                            <?php if($product->quantity == 0): ?>
                                <span class="badge badge-danger rounded-pill ml-auto">
                                <?php echo e(__('Out of stock')); ?>

                                </span>
                            <?php else: ?>
                                <span class="badge badge-success rounded-pill ml-auto">
                                    <?php echo e(__('In stock')); ?>

                                </span>
                            <?php endif; ?>
                        </div>
                        <div>
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
                                <i class="fas <?php echo e($icon .' '. $color); ?>"></i>
                            <?php endfor; ?>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="actions d-flex justify-content-between">
                            <a href="<?php echo e(route('product.show',$product->id)); ?>" class="action-item">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="<?php echo e(route('product.edit',$product->id)); ?>" class="action-item">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" class="action-item mr-2 " data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="<?php echo e(__('Are You Sure?').' | '.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-form-<?php echo e($product->id); ?>').submit();">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </div>
                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['product.destroy', $product->id],'id'=>'delete-form-'.$product->id]); ?>

                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\MY PROJECT\LARAVEL\1. From Fiver\storego-saas-v3.0\main_file\resources\views/product/grid.blade.php ENDPATH**/ ?>