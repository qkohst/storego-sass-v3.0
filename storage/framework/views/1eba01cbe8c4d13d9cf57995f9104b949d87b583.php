<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Plans')); ?>

<?php $__env->stopSection(); ?>
<?php
    $dir= asset(Storage::url('uploads/plan'));
?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 "><?php echo e(__('Plans')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <?php if(Auth::user()->type == 'super admin'): ?>
        <?php if((isset($admin_payments_setting['is_stripe_enabled']) && $admin_payments_setting['is_stripe_enabled'] == 'on')
            || (isset($admin_payments_setting['is_paypal_enabled']) && $admin_payments_setting['is_paypal_enabled'] == 'on')
            || (isset($admin_payments_setting['is_paystack_enabled']) && $admin_payments_setting['is_paystack_enabled'] == 'on')
            || (isset($admin_payments_setting['is_flutterwave_enabled']) && $admin_payments_setting['is_flutterwave_enabled'] == 'on')
            || (isset($admin_payments_setting['is_razorpay_enabled']) && $admin_payments_setting['is_razorpay_enabled'] == 'on')
            || (isset($admin_payments_setting['is_mercado_enabled']) && $admin_payments_setting['is_mercado_enabled'] == 'on')
            || (isset($admin_payments_setting['is_paytm_enabled']) && $admin_payments_setting['is_paytm_enabled'] == 'on')
            || (isset($admin_payments_setting['is_mollie_enabled']) && $admin_payments_setting['is_mollie_enabled'] == 'on')
            || (isset($admin_payments_setting['is_skrill_enabled']) && $admin_payments_setting['is_skrill_enabled'] == 'on')
            || (isset($admin_payments_setting['is_coingate_enabled']) && $admin_payments_setting['is_coingate_enabled'] == 'on')
        ): ?>
            <div class="">
                <button type="button" class="btn btn-sm btn-white bor-radius ml-4" data-ajax-popup="true" data-size="lg" data-title="<?php echo e(__('Add Plan')); ?>" data-url="<?php echo e(route('plans.create')); ?>">
                    <i class="fas fa-plus"></i> <?php echo e(__('Add Plan')); ?>

                </button>
            </div>
        <?php endif; ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-3">
                <div class="card card-fluid">
                    <div class="card-header border-0 pb-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-0"><?php echo e($plan->name); ?></h6>
                            </div>
                            <div class="text-right">
                                <div class="actions">
                                    <?php if( \Auth::user()->type == 'super admin'): ?>
                                        <a title="Edit Plan" data-size="lg" href="#" class="action-item" data-url="<?php echo e(route('plans.edit',$plan->id)); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Edit Plan')); ?>" data-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>"><i class="fas fa-edit"></i></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body text-center <?php echo e(!empty(\Auth::user()->type != 'super admin')?'plan-box':''); ?>">
                        <a href="#" class="avatar rounded-circle avatar-lg hover-translate-y-n3">
                            <?php if(!empty($plan->image)): ?>
                                <img alt="Image placeholder" src="<?php echo e($dir.'/'.$plan->image); ?>" class="">
                            <?php endif; ?>
                        </a>

                        <h5 class="h6 my-4"> <?php echo e(env('CURRENCY_SYMBOL').$plan->price.' / ' . __($plan->duration)); ?></h5>

                        <?php if(\Auth::user()->type=='Owner' && \Auth::user()->plan == $plan->id): ?>
                            <h5 class="h6 my-4">
                                <?php echo e(__('Expired : ')); ?> <?php echo e(\Auth::user()->plan_expire_date ? \App\Models\Utility::dateFormat(\Auth::user()->plan_expire_date):__('Unlimited')); ?>

                            </h5>
                        <?php endif; ?>

                        <h5 class="h6 my-4"><?php echo e($plan->description); ?></h5>
                        <?php if(\Auth::user()->type == 'Owner' && \Auth::user()->plan == $plan->id): ?>
                            <span class="clearfix"></span>
                            <span class="badge badge-pill badge-success"><?php echo e(__('Active')); ?></span>
                        <?php endif; ?>
                        <?php if(($plan->id != \Auth::user()->plan) && \Auth::user()->type!='super admin' ): ?>
                            <?php if($plan->price > 0): ?>
                                <a class="badge badge-pill badge-primary" href="<?php echo e(route('stripe',\Illuminate\Support\Facades\Crypt::encrypt($plan->id))); ?>" data-toggle="tooltip" data-original-title="<?php echo e(__('Buy Plan')); ?>">
                                    <i class="fas fa-cart-plus"></i>
                                </a>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                    <?php if(\Auth::user()->type != 'super admin' && \Auth::user()->plan != $plan->id): ?>

                         <?php if($plan->id != 1): ?>

                            <div class="text-center">
                                <?php if(\Auth::user()->requested_plan != $plan->id): ?>
                                    <a href="<?php echo e(route('send.request',[\Illuminate\Support\Facades\Crypt::encrypt($plan->id)])); ?>" class="badge badge-pill badge-success" data-title="<?php echo e(__('Send Request')); ?>" data-toggle="tooltip">
                                        <span class="btn-inner--icon"><i class="fas fa-share"></i></span>

                                    </a>
                                <?php else: ?>
                                    <a href="<?php echo e(route('request.cancel',\Auth::user()->id)); ?>" class="badge badge-pill badge-danger" data-title="<?php echo e(__('Cancle Request')); ?>" data-toggle="tooltip">
                                        <span class="btn-inner--icon"><i class="fas fa-times"></i></span>
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <?php endif; ?>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-6 text-center">
                                <?php if($plan->max_products == '-1'): ?>
                                    <span class="h5 mb-0"><?php echo e(__('Unlimited')); ?></span>
                                <?php else: ?>
                                    <span class="h5 mb-0"><?php echo e($plan->max_products); ?></span>
                                <?php endif; ?>
                                <span class="d-block text-sm"><?php echo e(__('Products')); ?></span>
                            </div>
                            <div class="col-6 text-center">
                                <span class="h5 mb-0">
                                    <?php if($plan->max_stores == '-1'): ?>
                                        <span class="h5 mb-0"><?php echo e(__('Unlimited')); ?></span>
                                    <?php else: ?>
                                        <span class="h5 mb-0"><?php echo e($plan->max_stores); ?></span>
                                    <?php endif; ?>
                                </span>
                                <span class="d-block text-sm"><?php echo e(__('Store')); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <ul class="plan-detail">
                                <?php if($plan->enable_custdomain == 'on'): ?>
                                    <li><?php echo e(__('Custom Domain')); ?></li>
                                <?php else: ?>
                                    <div><?php echo e(__('Custom Domain')); ?></div>
                                <?php endif; ?>
                                <?php if($plan->enable_custsubdomain == 'on'): ?>
                                    <li><?php echo e(__('Sub Domain')); ?></li>
                                <?php else: ?>
                                    <div><?php echo e(__('Sub Domain')); ?></div>
                                <?php endif; ?>
                                <?php if($plan->shipping_method == 'on'): ?>
                                    <li><?php echo e(__('Shipping Method')); ?></li>
                                <?php else: ?>
                                    <div><?php echo e(__('Shipping Method')); ?></div>
                                <?php endif; ?>
                                <?php if($plan->additional_page == 'on'): ?>
                                    <li><?php echo e(__('Additional Page')); ?></li>
                                <?php else: ?>
                                    <div><?php echo e(__('Additional Page')); ?></div>
                                <?php endif; ?>
                                <?php if($plan->blog == 'on'): ?>
                                    <li><?php echo e(__('Blog')); ?></li>
                                <?php else: ?>
                                    <div><?php echo e(__('Blog')); ?></div>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="card">
        <!-- Table -->
        <div class="table-responsive">
            <table class="table align-items-center dataTable">
                <thead>
                <tr>
                    <th scope="col" class="sort" data-sort="name"> <?php echo e(__('Order Id')); ?></th>
                    <th scope="col" class="sort" data-sort="budget"><?php echo e(__('Date')); ?></th>
                    <th scope="col" class="sort" data-sort="status"><?php echo e(__('Name')); ?></th>
                    <th scope="col"><?php echo e(__('Plan Name')); ?></th>
                    <th scope="col" class="sort" data-sort="completion"> <?php echo e(__('Price')); ?></th>
                    <th scope="col" class="sort" data-sort="completion"> <?php echo e(__('Payment Type')); ?></th>
                    <th scope="col" class="sort" data-sort="completion"> <?php echo e(__('Status')); ?></th>
                    <th scope="col" class="sort" data-sort="completion"> <?php echo e(__('Coupon')); ?></th>
                    <th scope="col" class="sort" data-sort="completion"> <?php echo e(__('Invoice')); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($order->order_id); ?></td>
                        <td><?php echo e($order->created_at->format('d M Y')); ?></td>
                        <td><?php echo e($order->user_name); ?></td>
                        <td><?php echo e($order->plan_name); ?></td>
                        <td><?php echo e(env('CURRENCY_SYMBOL').$order->price); ?></td>
                        <td><?php echo e($order->payment_type); ?></td>
                        <td>
                            <?php if($order->payment_status == 'succeeded'): ?>
                                <i class="mdi mdi-circle text-success"></i> <?php echo e(ucfirst($order->payment_status)); ?>

                            <?php else: ?>
                                <i class="mdi mdi-circle text-danger"></i> <?php echo e(ucfirst($order->payment_status)); ?>

                            <?php endif; ?>
                        </td>

                        <td><?php echo e(!empty($order->total_coupon_used)? !empty($order->total_coupon_used->coupon_detail)?$order->total_coupon_used->coupon_detail->code:'-':'-'); ?></td>

                        <td class="text-center">
                            <?php if($order->receipt != 'free coupon' && $order->payment_type == 'STRIPE'): ?>
                                <a href="<?php echo e($order->receipt); ?>" title="Invoice" target="_blank" class=""><i class="fas fa-file-invoice"></i> </a>
                            <?php elseif($order->receipt =='free coupon'): ?>
                                <p><?php echo e(__('Used') .'100 %'. __('discount coupon code.')); ?></p>
                            <?php elseif($order->payment_type == 'Manually'): ?>
                                <p><?php echo e(__('Manually plan upgraded by super admin')); ?></p>
                            <?php else: ?>
                                -
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function () {
            var tohref = '';
            <?php if(Auth::user()->is_register_trial == 1): ?>
                tohref = $('#trial_<?php echo e(Auth::user()->interested_plan_id); ?>').attr("href");
            <?php elseif(Auth::user()->interested_plan_id != 0): ?>
                tohref = $('#interested_plan_<?php echo e(Auth::user()->interested_plan_id); ?>').attr("href");
            <?php endif; ?>

            if (tohref != '') {
                window.location = tohref;
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\MY PROJECT\LARAVEL\1. From Fiver\storego-saas-v3.0\main_file\resources\views/plans/index.blade.php ENDPATH**/ ?>