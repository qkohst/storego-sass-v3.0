<!DOCTYPE html>
<html lang="en" dir="<?php echo e(env('SITE_RTL') == 'on'?'rtl':''); ?>">

<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

<?php echo $__env->make('partials.admin.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body class="application application-offset">
<div class="container-fluid container-application">
    <?php
        $users=\Auth::user();
        $currantLang = $users->currentLanguages();
        $languages=\App\Models\Utility::languages();
        $footer_text=isset(\App\Models\Utility::settings()['footer_text']) ? \App\Models\Utility::settings()['footer_text'] : '';
    ?>
    <div class="main-content position-relative">
        <?php echo $__env->make('partials.admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="page-content">
            <?php echo $__env->make('partials.admin.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="footer pt-5 pb-4 footer-light" id="footer-main">
            <div class="row text-center text-sm-left align-items-sm-center">
                <div class="col-sm-6">
                    <p class="text-sm mb-0"><?php echo e($footer_text); ?></p>
                </div>
                <div class="col-sm-6 mb-md-0">
                    <ul class="nav justify-content-center justify-content-md-end">
                        <li class="nav-item dropdown border-right">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="h6 text-sm mb-0"><i class="fas fa-globe-asia"></i>
                                    <?php echo e(Str::upper($currantLang)); ?>

                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(route('change.language',$language)); ?>" class="dropdown-item <?php if($language == $currantLang): ?> active-language <?php endif; ?>">
                                        <span> <?php echo e(Str::upper($language)); ?></span>
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('change.mode')); ?>"><?php echo e((Auth::user()->mode == 'light') ? __('Dark Mode') : __('Light Mode')); ?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="commonModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header align-items-center">
                    <div class="modal-title">
                        <h6 class="mb-0" id="modelCommanModelLabel"></h6>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>
<?php echo $__env->make('partials.admin.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>
</html>
<?php /**PATH E:\MY PROJECT\LARAVEL\1. From Fiver\storego-saas-v3.0\main_file\resources\views/layouts/admin.blade.php ENDPATH**/ ?>