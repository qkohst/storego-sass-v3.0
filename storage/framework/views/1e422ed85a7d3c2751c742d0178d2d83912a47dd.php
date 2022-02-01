<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Wish list')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <section class="top-product">
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xl-3 col-lg-4 col-sm-6 product-box wishlist_<?php echo e($product['product_id']); ?>">
                        <div class="card card-product">
                            <div class="card-image">
                                <a href="<?php echo e(route('store.product.product_view',[$store->slug,$product['product_id']])); ?>">
                                    <?php if(!empty($product['image'])): ?>
                                        <img alt="Image placeholder" src="<?php echo e(asset($product['image'])); ?>" class="img-center img-fluid">
                                    <?php else: ?>
                                        <img alt="Image placeholder" src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>" class="img-center img-fluid">
                                    <?php endif; ?>
                                </a>
                            </div>
                            <div class="card-body pt-0">
                                <span class="static-rating static-rating-sm">
                                    <?php if($store['enable_rating'] == 'on'): ?>
                                        <?php for($i =1;$i<=5;$i++): ?>
                                            <?php
                                                $icon = 'fa-star';
                                                $color = '';
                                                $newVal1 = ($i-0.5);
                                                if(\App\Models\Product::getRatingById($product['product_id']) < $i && \App\Models\Product::getRatingById($product['product_id']) >= $newVal1)
                                                {
                                                    $icon = 'fa-star-half-alt';
                                                }
                                                if(\App\Models\Product::getRatingById($product['product_id']) >= $newVal1)
                                                {
                                                    $color = 'text-warning';
                                                }
                                            ?>
                                            <i class="star fas <?php echo e($icon .' '. $color); ?>"></i>
                                        <?php endfor; ?>
                                    <?php endif; ?>
                                </span>
                                <h6><a class="t-black13" href="<?php echo e(route('store.product.product_view',[$store->slug,$product['product_id']])); ?>"><?php echo e($product['product_name']); ?></a></h6>
                                <p class="text-sm">
                                    <span class="td-gray"><?php echo e(__('Category')); ?>:</span> <?php echo e(\App\Models\Product::getCategoryById($product['product_id'])); ?>

                                </p>
                                <div class="product-price mt-3">
                                    <span class="card-price t-black15">
                                        <?php if($product['enable_product_variant'] == 'on'): ?>
                                            <?php echo e(__('In variant')); ?>

                                        <?php else: ?>
                                            <?php echo e(\App\Models\Utility::priceFormat($product['price'])); ?>

                                        <?php endif; ?>
                                    </span>
                                        <?php if($product['enable_product_variant'] == 'on'): ?>
                                            <a href="<?php echo e(route('store.product.product_view',[$store->slug,$product['product_id']])); ?>" class="action-item pcart-icon bg-primary" >
                                                <i class="fas fa-shopping-basket"></i>
                                            </a>
                                        <?php else: ?>
                                            <a href="javascript:void(0)" class="action-item pcart-icon bg-primary add_to_cart" data-id="<?php echo e($product['product_id']); ?>">
                                                <i class="fas fa-shopping-basket"></i>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                            </div>
                            <div class="actions card-product-actions">
                                <button type="button" class="action-item wishlist-icon bg-light-gray delete_wishlist_item" id="delete_wishlist_item1" data-id="<?php echo e($product['product_id']); ?>">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        $(document).on('click', '.delete_wishlist_item', function (e) {
            e.preventDefault();
            var id = $(this).attr('data-id');

            $.ajax({
                type: "DELETE",
                url: '<?php echo e(route('delete.wishlist_item', [$store->slug,'__product_id'])); ?>'.replace('__product_id', id),
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                },
                success: function (response) {
                    if (response.status == "success") {
                        show_toastr('Success', response.message, 'success');
                        $('.wishlist_' + response.id).remove();
                        $('.wishlist_count').html(response.count);

                    } else {
                        show_toastr('Error', response.message, 'error');
                    }
                },
                error: function (result) {
                }
            });
        });

        $(".add_to_cart").click(function (e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            var variants = [];
            $(".variant-selection").each(function (index, element) {
                variants.push(element.value);
            });

            if (jQuery.inArray('', variants) != -1) {
                show_toastr('Error', "<?php echo e(__('Please select all option.')); ?>", 'error');
                return false;
            }
            var variation_ids = $('#variant_id').val();

            $.ajax({
                url: '<?php echo e(route('user.addToCart', ['__product_id',$store->slug,'variation_id'])); ?>'.replace('__product_id', id).replace('variation_id', variation_ids ?? 0),
                type: "POST",
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    variants: variants.join(' : '),
                },
                success: function (response) {
                    if (response.status == "Success") {
                        show_toastr('Success', response.success, 'success');
                        $("#shoping_counts").html(response.item_count);
                    } else {
                        show_toastr('Error', response.error, 'error');
                    }
                },
                error: function (result) {
                    console.log('error');
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.theme1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\MY PROJECT\LARAVEL\1. From Fiver\storego-saas-v3.0\main_file\resources\views/storefront/theme1/wishlist.blade.php ENDPATH**/ ?>