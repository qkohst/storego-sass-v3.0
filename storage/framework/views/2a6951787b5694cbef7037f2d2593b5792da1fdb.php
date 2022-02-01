<?php echo e(Form::open(array('url'=>'store-resource','method'=>'post'))); ?>

<div class="row">
    <div class="col-12">
        <div class="form-group">
            <?php echo e(Form::label('store_name',__('Store Name'))); ?>

            <?php echo e(Form::text('store_name',null,array('class'=>'form-control','placeholder'=>__('Enter Store Name'),'required'=>'required'))); ?>

        </div>
    </div>
    <?php if(\Auth::user()->type == 'super admin'): ?>
    <div class="col-12">
        <div class="form-group">
            <?php echo e(Form::label('name',__('Name'))); ?>

            <?php echo e(Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Name'),'required'=>'required'))); ?>

        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <?php echo e(Form::label('email',__('Email'))); ?>

            <?php echo e(Form::email('email',null,array('class'=>'form-control','placeholder'=>__('Enter Email'),'required'=>'required'))); ?>

        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <?php echo e(Form::label('password',__('Password'))); ?>

            <?php echo e(Form::password('password',array('class'=>'form-control','placeholder'=>__('Enter Password'),'required'=>'required'))); ?>

        </div>
    </div>
    <?php endif; ?>
    <div class="w-100 text-right">
        <?php echo e(Form::submit(__('Save'),array('class'=>'btn btn-sm btn-primary rounded-pill mr-auto'))); ?>

    </div>
</div>
<?php echo e(Form::close()); ?>

<?php /**PATH E:\MY PROJECT\LARAVEL\1. From Fiver\storego-saas-v3.0\main_file\resources\views/admin_store/create.blade.php ENDPATH**/ ?>