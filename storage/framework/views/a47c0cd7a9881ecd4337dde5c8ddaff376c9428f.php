<?php echo e(Form::model($pageOption, array('route' => array('custom-page.update', $pageOption->id), 'method' => 'PUT'))); ?>

<div class="row">
    <div class="col-12">
        <div class="form-group">
            <?php echo e(Form::label('name',__('Name'))); ?>

            <?php echo e(Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Name')))); ?>

            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-name" role="alert">
                    <strong class="text-danger"><?php echo e($message); ?></strong>
                </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
    </div>
    <div class="form-group col-md-6">
        <?php echo e(Form::label('enable_page_header',__('Page Header Display'),array('class'=>'form-control-label mb-3'))); ?>

        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" name="enable_page_header" id="enable_page_header" <?php echo e(($pageOption['enable_page_header'] == 'on') ? 'checked=checked' : ''); ?>>
            <label class="custom-control-label form-control-label" for="enable_page_header"></label>
        </div>
    </div>
    <div class="form-group col-md-12">
        <?php echo e(Form::label('contents',__('Contents'),array('class'=>'form-control-label'))); ?>

        <?php echo e(Form::textarea('contents',null,array('class'=>'form-control summernote-simple','rows'=>3,'placehold   er'=>__('Contents')))); ?>

        <?php $__errorArgs = ['contents'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="invalid-contents" role="alert">
             <strong class="text-danger"><?php echo e($message); ?></strong>
         </span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
</div>
<div class="text-right">
    <?php echo e(Form::submit(__('Update'),array('class'=>'btn btn-sm btn-primary rounded-pill'))); ?>

</div>
<?php echo e(Form::close()); ?>

<?php /**PATH E:\MY PROJECT\LARAVEL\1. From Fiver\storego-saas-v3.0\main_file\resources\views/pageoption/edit.blade.php ENDPATH**/ ?>