<script src="<?php echo e(asset('assets/js/site.core.js')); ?>"></script>
<!-- Page JS -->
<script src="<?php echo e(asset('assets/libs/dropzone/dist/min/dropzone.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/libs/progressbar.js/dist/progressbar.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/libs/apexcharts/dist/apexcharts.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/libs/bootstrap-notify/bootstrap-notify.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/libs/select2/dist/js/select2.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/libs/moment/min/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/libs/fullcalendar/dist/fullcalendar.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/libs/flatpickr/dist/flatpickr.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/libs/quill/dist/quill.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/libs/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/libs/autosize/dist/autosize.min.js')); ?>"></script>
<!-- Site JS -->
<script src="<?php echo e(asset('assets/js/site.js')); ?>"></script>

<script src="<?php echo e(asset('assets/js/letter.avatar.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/js/custom.js')); ?>"></script>
<?php if(Session::has('success')): ?>
    <script>
        show_toastr('<?php echo e(__('Success')); ?>', '<?php echo session('success'); ?>', 'success');
    </script>
    <?php echo e(Session::forget('success')); ?>

<?php endif; ?>
<?php if(Session::has('error')): ?>
    <script>
        show_toastr('<?php echo e(__('Error')); ?>', '<?php echo session('error'); ?>', 'error');
    </script>
    <?php echo e(Session::forget('error')); ?>

<?php endif; ?>

<?php if(App\Models\Utility::getValByName('gdpr_cookie') == 'on'): ?>

    <script type="text/javascript">

        var defaults = {
            'messageLocales': {
                /*'en': 'We use cookies to make sure you can have the best experience on our website. If you continue to use this site we assume that you will be happy with it.'*/
                'en': "<?php echo e(App\Models\Utility::getValByName('cookie_text')); ?>"
            },
            'buttonLocales': {
                'en': 'Ok'
            },
            'cookieNoticePosition': 'bottom',
            'learnMoreLinkEnabled': false,
            'learnMoreLinkHref': '/cookie-banner-information.html',
            'learnMoreLinkText': {
                'it': 'Saperne di più',
                'en': 'Learn more',
                'de': 'Mehr erfahren',
                'fr': 'En savoir plus'
            },
            'buttonLocales': {
                'en': 'Ok'
            },
            'expiresIn': 30,
            'buttonBgColor': '#d35400',
            'buttonTextColor': '#fff',
            'noticeBgColor': '#051c4b',
            'noticeTextColor': '#fff',
            'linkColor': '#009fdd'
        };
    </script>
    <script src="<?php echo e(asset('assets/js/cookie.notice.js')); ?>"></script>
<?php endif; ?>

<?php echo $__env->yieldPushContent('script-page'); ?>
<?php /**PATH E:\MY PROJECT\LARAVEL\1. From Fiver\storego-saas-v3.0\main_file\resources\views/partials/admin/footer.blade.php ENDPATH**/ ?>