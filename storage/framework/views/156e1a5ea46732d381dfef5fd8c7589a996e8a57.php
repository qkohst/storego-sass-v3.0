<?php echo e(Form::open(array('url'=>'shipping','method'=>'post'))); ?>

<div class="row">
    <div class="col-12">
        <div class="form-group">
            <?php echo e(Form::label('name',__('Name'),array('class'=>'form-control-label'))); ?>

            <?php echo e(Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Name'),'required'=>'required'))); ?>

        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <?php echo e(Form::label('price',__('Price'),array('class'=>'form-control-label'))); ?>

            <?php echo e(Form::text('price',null,array('class'=>'form-control','placeholder'=>__('Enter Price'),'required'=>'required'))); ?>

        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <?php echo e(Form::label('Location',__('Location'),array('class'=>'form-control-label'))); ?>

            <?php echo Form::select('location[]', $locations, null,array('class' => 'form-control','data-toggle'=>'select','multiple')); ?>

        </div>
    </div>
    <div class="w-100 text-right">
        <?php echo e(Form::submit(__('Save'),array('class'=>'btn btn-sm btn-primary rounded-pill mr-auto'))); ?>

    </div>
</div>
<?php echo e(Form::close()); ?>

<?php /**PATH E:\MY PROJECT\LARAVEL\1. From Fiver\storego-saas-v3.0\main_file\resources\views/shipping/create.blade.php ENDPATH**/ ?>