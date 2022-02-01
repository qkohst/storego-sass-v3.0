<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Login')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="w-100">
        <div class="row justify-content-center">
            <div class="form-group auth-lang">
                <select name="language" id="language" class="form-control" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                    <?php $__currentLoopData = \App\Models\Utility::languages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php if($lang == $language): ?> selected <?php endif; ?> value="<?php echo e(route('login',$language)); ?>"><?php echo e(Str::upper($language)); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="col-sm-8 col-lg-4">
                <div class="row justify-content-center mb-3">
                    <a class="navbar-brand" href="#">
                        <img src="<?php echo e(asset(Storage::url('uploads/logo/logo.png'))); ?>" class="auth-logo" width="250">
                    </a>
                </div>
                <div class="card shadow zindex-100 mb-0">
                    <div class="card-body px-md-5 py-5">
                        <div class="mb-5">
                            <h6 class="h3"><?php echo e(__('Login')); ?></h6>
                            <p class="text-muted mb-0"><?php echo e(__('Sign in to your account to continue.')); ?></p>
                        </div>
                        <span class="clearfix"></span>
                        <?php echo e(Form::open(array('route'=>'login','method'=>'post','id'=>'loginForm','class'=> 'login-form' ))); ?>

                        <div class="form-group">
                            <?php echo e(Form::label('email',__('Email'),array('class' => 'form-control-label'))); ?>


                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <?php echo e(Form::text('email',null,array('class'=>'form-control','placeholder'=>__('Enter Your Email')))); ?>

                            </div>
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-email text-danger" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group mb-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <?php echo e(Form::label('password',__('Password'),array('class' => 'form-control-label'))); ?>

                                </div>
                                <div class="mb-3">
                                    <div class="text-center">
                                        <?php if(Route::has('password.request')): ?>
                                            <a href="<?php echo e(route('password.request',$lang)); ?>" class="small text-muted text-underline--dashed border-primary">
                                                <?php echo e(__('Forgot Your Password?')); ?>

                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <?php echo e(Form::password('password',array('class'=>'form-control','placeholder'=>__('Enter Your Password')))); ?>

                                <div class="input-group-append">
                                <span class="input-group-text">
                                  <a href="#" data-toggle="password-text" data-target="#password">
                                    <i class="fas fa-eye"></i>
                                  </a>
                                </span>
                                </div>
                            </div>
                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-password text-danger" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                            </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <?php echo e(Form::submit(__('Login'),array('class'=>'btn btn-sm btn-primary btn-icon rounded-pill text-white','id'=>'saveBtn'))); ?>

                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                    <div class="card-footer px-md-5"><small><?php echo e(__('Not registered')); ?>?</small>
                        <a href="<?php echo e(route('register',$lang)); ?>" class="small font-weight-bold"><?php echo e(__('Create account')); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\MY PROJECT\LARAVEL\1. From Fiver\storego-saas-v3.0\main_file\resources\views/auth/login.blade.php ENDPATH**/ ?>