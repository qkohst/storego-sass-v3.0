<?php ( $store_logo=asset(Storage::url('uploads/store_logo/'))); ?>

<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Blog')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 "><?php echo e(__('Blog')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/summernote/summernote-bs4.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script-page'); ?>
    <script src="<?php echo e(asset('assets/libs/summernote/summernote-bs4.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('action-btn'); ?>
    <a href="#" data-size="lg" data-url="<?php echo e(route('blog.social')); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Manage Social Blog Button')); ?>" class="btn btn-sm btn-white bor-radius">
        <?php echo e(__('Social Media')); ?>

    </a>
    <a href="#" data-size="lg" data-url="<?php echo e(route('blog.create')); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Create New Blog')); ?>" class="btn btn-sm btn-white btn-icon-only rounded-circle">
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
                            <h6 class="d-inline-block mb-0 text-capitalize"><?php echo e(__('All Blogs')); ?></h6>
                        </div>
                        <div class="col text-right">
                            <div class="actions">
                                <div class="rounded-pill d-inline-block search_round">
                                    <div class="input-group input-group-sm input-group-merge input-group-flush">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-transparent"><i class="fas fa-search"></i></span>
                                        </div>
                                        <input type="text" id="user_keyword" class="form-control form-control-flush search-user" placeholder="<?php echo e(__('Search Blog')); ?>">
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
                            <th scope="col" class="sort" data-sort="name"><?php echo e(__('Blog Cover Image')); ?></th>
                            <th scope="col" class="sort" data-sort="name"><?php echo e(__('Title')); ?></th>
                            <th scope="col" class="sort" data-sort="name"><?php echo e(__('Created At')); ?></th>
                            <th class="text-right"><?php echo e(__('Action')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr data-name="<?php echo e($blog->title); ?>">
                                <td scope="row">
                                    <div class="media align-items-center">
                                        <div>
                                            <img alt="Image placeholder" src="<?php echo e($store_logo); ?>/<?php echo e($blog->blog_cover_image); ?>" class="rounded-circle" style="width: 80px; height: 80px;">
                                        </div>
                                    </div>
                                </td>
                                <td class="sorting_1"><?php echo e($blog->title); ?></td>
                                <td class="sorting_1"><?php echo e(\App\Models\Utility::dateFormat($blog->created_at)); ?></td>
                                <td class="action text-right">
                                    <a href="#" data-size="lg" data-url="<?php echo e(route('blog.edit',$blog->id)); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Edit Blog')); ?>" class="action-item">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <a href="#" class="action-item" data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="<?php echo e(__('Are You Sure?').' | '.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-form-<?php echo e($blog->id); ?>').submit();">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['blog.destroy', $blog->id],'id'=>'delete-form-'.$blog->id]); ?>

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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\MY PROJECT\LARAVEL\1. From Fiver\storego-saas-v3.0\main_file\resources\views/blog/index.blade.php ENDPATH**/ ?>