<?php
    $logo=asset(Storage::url('uploads/logo/'));
   $favicon=\App\Models\Utility::getValByName('company_favicon');

?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php echo e(env('APP_NAME')); ?> - Online Store Builder">

    <title><?php echo e((\App\Models\Utility::getValByName('title_text')) ? \App\Models\Utility::getValByName('title_text') : env('APP_NAME', 'StoreGo SaaS')); ?> - <?php echo $__env->yieldContent('page-title'); ?></title>
    <?php if(\Auth::user()->type == 'super admin'): ?>
        <link rel="icon" href="<?php echo e($logo.'/favicon.png'); ?>" type="image" sizes="16x16">
    <?php else: ?>
        <link rel="icon" href="<?php echo e($logo.'/'.(isset($favicon) && !empty($favicon)?$favicon:'favicon.png')); ?>" type="image" sizes="16x16">
    <?php endif; ?>

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/@fortawesome/fontawesome-free/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/fullcalendar/dist/fullcalendar.min.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/animate.css/animate.min.css')); ?>" id="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/select2/dist/css/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/site.css')); ?>" id="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/jquery.dataTables.min.css')); ?>">

    <script type="text/javascript" src="<?php echo e(asset('assets/js/jquery-1.11.1.min.js')); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/site-'.Auth::user()->mode.'.css')); ?>" id="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/custom.css')); ?>" id="stylesheet')}}">
    <?php if(env('SITE_RTL')=='on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap-rtl.css')); ?>">
    <?php endif; ?>
    <?php echo $__env->yieldPushContent('css-page'); ?>
</head>
<?php /**PATH E:\MY PROJECT\LARAVEL\1. From Fiver\storego-saas-v3.0\main_file\resources\views/partials/admin/head.blade.php ENDPATH**/ ?>