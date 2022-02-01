<?php echo e(Form::open(array('url'=>'custom-page','method'=>'post'))); ?>

<div class="row">
    <div class="col-12">
        <div class="form-group">
            <?php echo e(Form::label('name',__('Name'))); ?>

            <?php echo e(Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Name'),'required'=>'required'))); ?>

        </div>
    </div>
    <div class="form-group col-md-6">
        <?php echo e(Form::label('enable_page_header',__('Page Header Display'),array('class'=>'form-control-label mb-3'))); ?>

        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" name="enable_page_header" id="enable_page_header">
            <label class="custom-control-label form-control-label" for="enable_page_header"></label>
        </div>
    </div>
    <div class="form-group col-md-12">
        <?php echo e(Form::label('contents',__('Content'),array('class'=>'form-control-label'))); ?>

        <?php echo e(Form::textarea('contents',null,array('class'=>'form-control summernote-simple','rows'=>3,'placehold   er'=>__('Content')))); ?>

    </div>
    <div class="w-100 text-right">
        <?php echo e(Form::submit(__('Save'),array('class'=>'btn btn-sm btn-primary rounded-pill mr-auto'))); ?>

    </div>
</div>
<?php echo e(Form::close()); ?>

<?php /**PATH E:\MY PROJECT\LARAVEL\1. From Fiver\storego-saas-v3.0\main_file\resources\views/pageoption/create.blade.php ENDPATH**/ ?>