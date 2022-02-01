<?php echo e(Form::model($productCategorie, array('route' => array('product_categorie.update', $productCategorie->id), 'method' => 'PUT','enctype'=>'multipart/form-data'))); ?>

<div class="row">
    <div class="col-12">
        <div class="form-group">
            <?php echo e(Form::label('name',__('Name'),array('class'=>'form-control-label'))); ?>

            <?php echo e(Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Product Category')))); ?>

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
        <div class="form-group">
            <label for="categorie_img" class="form-control-label"><?php echo e(__('Upload Categorie Image')); ?></label>
            <input type="file" name="categorie_img" id="categorie_img" class="custom-input-file">
            <label for="categorie_img">
                <i class="fa fa-upload"></i>
                <span><?php echo e(__('Choose a file')); ?></span>
            </label>
        </div>
    </div>
</div>
<div class="text-right">
    <?php echo e(Form::submit(__('Update'),array('class'=>'btn btn-sm btn-primary rounded-pill'))); ?>

</div>
<?php echo e(Form::close()); ?>

<?php /**PATH E:\MY PROJECT\LARAVEL\1. From Fiver\storego-saas-v3.0\main_file\resources\views/product_category/edit.blade.php ENDPATH**/ ?>