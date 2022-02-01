<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" dir="<?php echo e(env('SITE_RTL') == 'on'?'rtl':''); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="StoreGo - Business Ecommerce">


    <title><?php echo e((\App\Models\Utility::getValByName('title_text')) ? \App\Models\Utility::getValByName('title_text') : config('app.name', 'StoreGo SaaS')); ?> - <?php echo $__env->yieldContent('page-title'); ?></title>

    <link rel="icon" href="<?php echo e(asset(Storage::url('uploads/logo/')).'/favicon.png'); ?>" type="image/png">
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/@fortawesome/fontawesome-free/css/all.min.css')); ?> ">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/site-light.css')); ?>" id="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/custom.css')); ?>" id="stylesheet">
    <?php if(env('SITE_RTL')=='on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap-rtl.css')); ?>">
    <?php endif; ?>
</head>
<body class="application application-offset">
<div class="container-fluid container-application">
    <div class="main-content position-relative">
        <div class="page-content">
            <div class="min-vh-100 py-5 d-flex align-items-center">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </div>
</div>
</body>
<script src="<?php echo e(asset('assets/js/site.core.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/site.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/demo.js')); ?>"></script>

</html>
<?php /**PATH E:\MY PROJECT\LARAVEL\1. From Fiver\storego-saas-v3.0\main_file\resources\views/layouts/auth.blade.php ENDPATH**/ ?>