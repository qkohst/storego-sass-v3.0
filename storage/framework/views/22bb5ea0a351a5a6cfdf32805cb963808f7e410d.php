<?php echo e(Form::open(array('url'=>'product_categorie','method'=>'post','enctype'=>'multipart/form-data'))); ?>

<div class="row">
    <div class="col-12">
        <div class="form-group">
            <?php echo e(Form::label('name',__('Name'),array('class'=>'form-control-label'))); ?>

            <?php echo e(Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Product Category'),'required'=>'required'))); ?>

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
    <div class="w-100 text-right">
        <?php echo e(Form::submit(__('Save'),array('class'=>'btn btn-sm btn-primary rounded-pill mr-auto'))); ?>

    </div>
</div>
<?php echo e(Form::close()); ?>

<?php /**PATH E:\MY PROJECT\LARAVEL\1. From Fiver\storego-saas-v3.0\main_file\resources\views/product_category/create.blade.php ENDPATH**/ ?>