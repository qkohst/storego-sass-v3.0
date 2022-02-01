<!DOCTYPE html>
<html lang="en" dir="<?php echo e(env('SITE_RTL') == 'on'?'rtl':''); ?>">
<?php
    $userstore = \App\Models\UserStore::where('store_id', $store->id)->first();
    $settings   =\DB::table('settings')->where('name','company_favicon')->where('created_by', $userstore->user_id)->first();
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php echo e(ucfirst(env('APP_NAME'))); ?> - <?php echo e(ucfirst($store->tagline)); ?>">

    <meta name="keywords" content="<?php echo e($store->metakeyword); ?>">
    <meta name="description" content="<?php echo e($store->metadesc); ?>">

    <title><?php echo $__env->yieldContent('page-title'); ?> - <?php echo e(($store->tagline) ?  $store->tagline : env('APP_NAME', ucfirst($store->name))); ?></title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="icon" href="<?php echo e(asset(Storage::url('uploads/logo/').(!empty($settings->value)?$settings->value:'favicon.png'))); ?>" type="image/png">

    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/@fortawesome/fontawesome-free/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/theme1/css/swiper.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/animate.css/animate.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/theme1/css/purpose.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/theme1/css/storego.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/theme1/css/'.(!empty($store->store_theme) ? $store->store_theme : 'green-color.css'))); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/custom.css')); ?>">
    <?php if(env('SITE_RTL')=='on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap-rtl.css')); ?>">
    <?php endif; ?>
    <?php echo $__env->yieldPushContent('css-page'); ?>
</head>
<body>
<?php
    if(!empty(session()->get('lang')))
    {
        $currantLang = session()->get('lang');
    }else{
        $currantLang = $store->lang;  
        
    }
    $languages=\App\Models\Utility::languages();
    $storethemesetting=\App\Models\Utility::demoStoreThemeSetting($store->id,$store->theme_dir);
?>
<header class="header" id="header-main">
    <!-- Topbar -->
    <?php if($storethemesetting['enable_top_bar'] == 'on'): ?>
        <div id="navbar-top-main" class="navbar-top bg-l-gray">
            <div class="container px-0">
                <div class="navbar-nav align-items-center">
                    <div class="d-none d-lg-inline-block">
                        <span class="navbar-text mr-3 t-gray top-header-text pl-2">
                      <i class="fas fa-bell"></i>
                        <?php echo e(!empty($storethemesetting['top_bar_title'])?$storethemesetting['top_bar_title']:'<b>FREE SHIPPING</b> world wide for all orders over $199'); ?>

                    </span>
                    </div>
                    <div class="ml-auto">
                        <ul class="nav topbar-social">
                            <li class="nav-item">
                                <a href="tel:<?php echo e(!empty($storethemesetting['top_bar_number'])?$storethemesetting['top_bar_number']:'2123081220'); ?>" class="nav-link">
                                    <i class="fas fa-phone-volume"></i> <span class="text-primary mr-2"><?php echo e(!empty($storethemesetting['top_bar_number'])?$storethemesetting['top_bar_number']:'(212) 308-1220'); ?></span> <?php echo e(__('Request a call')); ?></a>
                            </li>
                            <?php if(!empty($storethemesetting['whatsapp'])): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="https://wa.me/<?php echo e($storethemesetting['whatsapp']); ?>" target="_blank">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if(!empty($storethemesetting['facebook'])): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e($storethemesetting['facebook']); ?>" target="_blank">
                                        <i class="fab fa-facebook-square"></i>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if(!empty($storethemesetting['twitter'])): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e($storethemesetting['twitter']); ?>" target="_blank">
                                        <i class="fab fa-twitter-square"></i>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if(!empty($storethemesetting['email'])): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="mailto:<?php echo e($storethemesetting['email']); ?>">
                                        <i class="far fa-envelope"></i>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if(!empty($storethemesetting['instagram'])): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e($storethemesetting['instagram']); ?>" target="_blank">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if(!empty($storethemesetting['youtube'])): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e($storethemesetting['youtube']); ?>" target="_blank">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
<?php endif; ?>
<!-- Main navbar -->
    <nav class="navbar navbar-main navbar-expand-lg navbar-transparent" id="navbar-main">
        <div class="container px-lg-0">
            <!-- Logo -->
            <a class="navbar-brand mr-lg-5" href="<?php echo e(route('store.slug',$store->slug)); ?>">
                <?php if(!empty($store->logo)): ?>
                    <img alt="Image placeholder" src="<?php echo e(asset(Storage::url('uploads/store_logo/'.$store->logo))); ?>" id="navbar-logo" style="height: 40px;">
                <?php else: ?>
                    <img alt="Image placeholder" src="<?php echo e(asset(Storage::url('uploads/store_logo/header_logo.png'))); ?>" id="navbar-logo" style="height: 40px;">
                <?php endif; ?>
            </a>
            <!-- Navbar collapse trigger -->
            <button class="navbar-toggler pr-0" type="button" data-toggle="collapse" data-target="#navbar-main-collapse"
                    aria-controls="navbar-main-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar nav -->
            <div class="collapse navbar-collapse" id="navbar-main-collapse">
                <ul class="navbar-nav align-items-lg-center">
                    <!-- Home - Overview  -->
                    <li class="nav-item ">
                        <a class="nav-link" href="<?php echo e(route('store.slug',$store->slug)); ?>"><?php echo e(ucfirst($store->name)); ?></a>
                    </li>
                    <?php if(!empty($page_slug_urls)): ?>
                        <?php $__currentLoopData = $page_slug_urls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$page_slug_url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($page_slug_url->enable_page_header == 'on'): ?>
                                <li class="nav-item ">
                                    <a class="nav-link" href="<?php echo e(env('APP_URL') . '/page/' . $page_slug_url->slug); ?>"><?php echo e(ucfirst($page_slug_url->name)); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    <?php if($store['blog_enable'] == "on" && !empty($blog)): ?>
                        <li class="nav-item ">
                            <a class="nav-link" href="<?php echo e(route('store.blog',$store->slug)); ?>"><?php echo e(__('Blog')); ?></a>
                        </li>
                    <?php endif; ?>
                </ul>
                <ul class="navbar-nav align-items-lg-center ml-lg-auto nav-my-store">
                    <li class="nav-item d-lg-none d-xl-block">
                        <div class="form-group header-search">
                            <form action="<?php echo e(route('store.categorie.product',[$store->slug,'Start shopping'])); ?>" method="get">
                                <div class="input-group input-group-lg input-group-merge rounded-pill bg--gray">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-block bg--gray rounded-pill border-0"><i
                                                class="fas fa-search"></i></button>
                                    </div>
                                    <input type="text" name="search_data" class="form-control form-control-flush" placeholder="Type your product...">
                                </div>
                            </form>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('store.wishlist',$store->slug)); ?>" class="nav-heart btn  ml-2 bg--gray rounded-pill hover-translate-y-n3 icon-font">
                            <i class="fas fa-heart"></i>
                            <span class="badge badge-pill badge-floating border-dark wishlist_count"><?php echo e(!empty($wishlist)?count($wishlist):'0'); ?></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('store.cart',$store->slug)); ?>" class="nav-heart btn btn-primary ml-2 mr-2 rounded-pill hover-translate-y-n3 ">
                            <i class="fas fa-shopping-basket"></i>
                            <p class="badge badge-pill badge-floating bg-green border-dark shoping_counts" id="shoping_counts">
                                <?php echo e(!empty($total_item)?$total_item:'0'); ?>

                            </p>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-language"></i>
                            <?php echo e(Str::upper($currantLang)); ?>

                        </a>
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(route('change.languagestore',[$store->slug,$language])); ?>" class="dropdown-item <?php if($language == $currantLang): ?> active-language <?php endif; ?>">
                                    <span> <?php echo e(Str::upper($language)); ?></span>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<?php echo $__env->yieldContent('content'); ?>

<?php if($storethemesetting['enable_footer_note'] == 'on' || $storethemesetting['enable_footer'] == 'on'): ?>
    <footer id="footer-main">
        <div class="container">
            <?php if($storethemesetting['enable_footer_note'] == 'on'): ?>
                <div class="row pt-md top-footer delimiter-top">
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <a href="<?php echo e(route('store.slug',$store->slug)); ?>">
                            <?php if(!empty($storethemesetting['footer_logo']) && \Storage::exists('uploads/store_logo/'.$storethemesetting['footer_logo'])): ?>
                                <img src="<?php echo e(asset(Storage::url('uploads/store_logo/'.$storethemesetting['footer_logo']))); ?>" alt="Footer logo" style="height: 40px;">
                            <?php else: ?>
                                <img src="<?php echo e(asset(Storage::url('uploads/store_logo/footer_logo.png'))); ?>" alt="Footer logo" style="height: 40px;">
                            <?php endif; ?>
                        </a>
                    </div>
                    <?php if(isset($storethemesetting['enable_quick_link1']) && $storethemesetting['enable_quick_link1'] == 'on'): ?>
                        <div class="col-lg-2 col-md-3 col-6 col-sm-6 col-6 col-sm-4 ml-lg-auto mb-5 mb-lg-0">
                            <h6 class="heading mb-3 text-primary"><?php echo e(__($storethemesetting['quick_link_header_name1'])); ?></h6>
                            <ul class="list-unstyled f-list">
                                <li><a class="t-gray" target="_blank" href="<?php echo e($storethemesetting['quick_link_url1']); ?>"><?php echo e(__($storethemesetting['quick_link_name1'])); ?></a></li>

                                <li><a class="t-gray" target="_blank" href="<?php echo e($storethemesetting['quick_link_url12']); ?>"><?php echo e(__($storethemesetting['quick_link_name12'])); ?></a></li>

                                <li><a class="t-gray" target="_blank" href="<?php echo e($storethemesetting['quick_link_url13']); ?>"><?php echo e(__($storethemesetting['quick_link_name13'])); ?></a></li>

                                <li><a class="t-gray" target="_blank" href="<?php echo e($storethemesetting['quick_link_url14']); ?>"><?php echo e(__($storethemesetting['quick_link_name14'])); ?></a></li>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <?php if(isset($storethemesetting['enable_quick_link2']) && $storethemesetting['enable_quick_link2'] == 'on'): ?>
                        <div class="col-lg-2 col-md-3 col-6 col-sm-6 col-6 col-sm-4 ml-lg-auto mb-5 mb-lg-0">
                            <h6 class="heading mb-3 text-primary"><?php echo e(__($storethemesetting['quick_link_header_name2'])); ?></h6>
                            <ul class="list-unstyled f-list">
                                <li><a class="t-gray" target="_blank" href="<?php echo e($storethemesetting['quick_link_url21']); ?>"><?php echo e(__($storethemesetting['quick_link_name21'])); ?></a></li>

                                <li><a class="t-gray" target="_blank" href="<?php echo e($storethemesetting['quick_link_url22']); ?>"><?php echo e(__($storethemesetting['quick_link_name22'])); ?></a></li>

                                <li><a class="t-gray" target="_blank" href="<?php echo e($storethemesetting['quick_link_url23']); ?>"><?php echo e(__($storethemesetting['quick_link_name23'])); ?></a></li>

                                <li><a class="t-gray" target="_blank" href="<?php echo e($storethemesetting['quick_link_url24']); ?>"><?php echo e(__($storethemesetting['quick_link_name24'])); ?></a></li>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <?php if(isset($storethemesetting['enable_quick_link3']) && $storethemesetting['enable_quick_link3'] == 'on'): ?>
                        <div class="col-lg-2 col-md-3 col-6 col-sm-6 col-6 col-sm-4 ml-lg-auto mb-5 mb-lg-0">
                            <h6 class="heading mb-3 text-primary"><?php echo e(__($storethemesetting['quick_link_header_name3'])); ?></h6>
                            <ul class="list-unstyled f-list">
                                <li><a class="t-gray" target="_blank" href="<?php echo e($storethemesetting['quick_link_url31']); ?>"><?php echo e(__($storethemesetting['quick_link_name31'])); ?></a></li>

                                <li><a class="t-gray" target="_blank" href="<?php echo e($storethemesetting['quick_link_url32']); ?>"><?php echo e(__($storethemesetting['quick_link_name32'])); ?></a></li>

                                <li><a class="t-gray" target="_blank" href="<?php echo e($storethemesetting['quick_link_url33']); ?>"><?php echo e(__($storethemesetting['quick_link_name33'])); ?></a></li>

                                <li><a class="t-gray" target="_blank" href="<?php echo e($storethemesetting['quick_link_url34']); ?>"><?php echo e(__($storethemesetting['quick_link_name34'])); ?></a></li>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <?php if(isset($storethemesetting['enable_quick_link4']) && $storethemesetting['enable_quick_link4'] == 'on'): ?>
                        <div class="col-lg-2 col-md-3 col-6 col-sm-6 col-6 col-sm-4 ml-lg-auto mb-5 mb-lg-0">
                            <h6 class="heading mb-3 text-primary"><?php echo e(__($storethemesetting['quick_link_header_name4'])); ?></h6>
                            <ul class="list-unstyled f-list">
                                <li><a class="t-gray" target="_blank" href="<?php echo e($storethemesetting['quick_link_url41']); ?>"><?php echo e(__($storethemesetting['quick_link_name41'])); ?></a></li>

                                <li><a class="t-gray" target="_blank" href="<?php echo e($storethemesetting['quick_link_url42']); ?>"><?php echo e(__($storethemesetting['quick_link_name42'])); ?></a></li>

                                <li><a class="t-gray" target="_blank" href="<?php echo e($storethemesetting['quick_link_url43']); ?>"><?php echo e(__($storethemesetting['quick_link_name43'])); ?></a></li>

                                <li><a class="t-gray" target="_blank" href="<?php echo e($storethemesetting['quick_link_url44']); ?>"><?php echo e(__($storethemesetting['quick_link_name44'])); ?></a></li>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php if($storethemesetting['enable_footer'] == 'on'): ?>
                <div class="row align-items-center justify-content-md-between py-2 delimiter-top">
                    <div class="col-md-6">
                        <div class="copyright text-sm font-weight-bold text-center text-md-left">
                            <?php echo e($storethemesetting['footer_note']); ?>

                        </div>
                    </div>
                    <div class="col-md-6 footer-social">
                        <ul class="nav justify-content-center justify-content-md-end mt-3 mt-md-0">
                            <li class="nav-item d-flex align-items-center">
                                <p class="mb-0"><?php echo e(__('Follow us on')); ?> :</p>
                            </li>
                            <?php if(!empty($storethemesetting['whatsapp'])): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="https://wa.me/<?php echo e($storethemesetting['whatsapp']); ?>" target="_blank">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if(!empty($storethemesetting['facebook'])): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e($storethemesetting['facebook']); ?>" target="_blank">
                                        <i class="fab fa-facebook-square"></i>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if(!empty($storethemesetting['twitter'])): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e($storethemesetting['twitter']); ?>" target="_blank">
                                        <i class="fab fa-twitter-square"></i>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if(!empty($storethemesetting['email'])): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="mailto:<?php echo e($storethemesetting['email']); ?>">
                                        <i class="far fa-envelope"></i>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if(!empty($storethemesetting['instagram'])): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e($storethemesetting['instagram']); ?>" target="_blank">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if(!empty($storethemesetting['youtube'])): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e($storethemesetting['youtube']); ?>" target="_blank">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </footer>
<?php endif; ?>

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


<script src="<?php echo e(asset('assets/theme1/js/purpose.core.js')); ?>"></script>
<script src="<?php echo e(asset('assets/theme1/js/swiper.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/theme1/js/purpose.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/libs/bootstrap-notify/bootstrap-notify.min.js')); ?>"></script>


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
            'noticeBgColor': '#000',
            'noticeTextColor': '#fff',
            'linkColor': '#009fdd'
        };
    </script>
    <script src="<?php echo e(asset('assets/js/cookie.notice.js')); ?>"></script>
<?php endif; ?>


<?php echo $__env->yieldPushContent('script-page'); ?>
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



<?php
    $store_settings = \App\Models\Store::where('slug',$store->slug)->first();
?>
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo e($store_settings->google_analytic); ?>"></script>

<?php echo $store_settings->storejs; ?>


<script>

    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', '<?php echo e($store_settings->google_analytic); ?>');



</script>
<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '<?php echo e($store_settings->fbpixel_code); ?>');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=0000&ev=PageView&noscript=<?php echo e($store_settings->fbpixel_code); ?>"/></noscript>
</body>
</html>
<?php /**PATH E:\MY PROJECT\LARAVEL\1. From Fiver\storego-saas-v3.0\main_file\resources\views/storefront/layout/theme1.blade.php ENDPATH**/ ?>