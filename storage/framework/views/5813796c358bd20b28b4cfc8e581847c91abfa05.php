<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Product')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 "><?php echo e(__('Product')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('filter'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/summernote/summernote-bs4.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script-page'); ?>
    <script src="<?php echo e(asset('assets/libs/summernote/summernote-bs4.js')); ?>"></script>
    <script>
        var Dropzones = function () {
            var e = $('[data-toggle="dropzone1"]'), t = $(".dz-preview");
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            e.length && (Dropzone.autoDiscover = !1, e.each(function () {
                var e, a, n, o, i;
                e = $(this), a = void 0 !== e.data("dropzone-multiple"), n = e.find(t), o = void 0, i = {
                    url: "<?php echo e(route('product.store')); ?>",
                    headers: {
                        'x-csrf-token': CSRF_TOKEN,
                    },
                    thumbnailWidth: null,
                    thumbnailHeight: null,
                    previewsContainer: n.get(0),
                    previewTemplate: n.html(),
                    maxFiles: 10,
                    parallelUploads: 10,
                    autoProcessQueue: false,
                    uploadMultiple: true,
                    acceptedFiles: a ? null : "image/*",
                    success: function (file, response) {
                        if (response.flag == "success") {
                            show_toastr('success', response.msg, 'success');
                            window.location.href = "<?php echo e(route('product.index')); ?>";
                        } else {
                            show_toastr('Error', response.msg, 'error');
                        }
                    },
                    error: function (file, response) {
                        // Dropzones.removeFile(file);
                        if (response.error) {
                            show_toastr('Error', response.error, 'error');
                        } else {
                            show_toastr('Error', response, 'error');
                        }
                    },
                    init: function () {
                        var myDropzone = this;

                        this.on("addedfile", function (e) {
                            !a && o && this.removeFile(o), o = e
                        })
                    }
                }, n.html(""), e.dropzone(i)
            }))
        }()

        $('#submit-all').on('click', function () {
            var fd = new FormData();
            var file = document.getElementById('is_cover_image').files[0];
            var attachmentfile = document.getElementById('attachment').files[0];
            var downloadable_prodcutfile = document.getElementById('downloadable_prodcut').files[0];
            if (file) {
                fd.append('is_cover_image', file);
            }
            if (attachmentfile) {
                fd.append('attachment', attachmentfile);
            }
            if (downloadable_prodcutfile) {
                fd.append('downloadable_prodcut', downloadable_prodcutfile);
            }

            var files = $('[data-toggle="dropzone1"]').get(0).dropzone.getAcceptedFiles();
            $.each(files, function (key, file) {
                fd.append('multiple_files[' + key + ']', $('[data-toggle="dropzone1"]')[0].dropzone.getAcceptedFiles()[key]); // attach dropzone image element
            });
            var other_data = $('#frmTarget').serializeArray();
            $.each(other_data, function (key, input) {
                fd.append(input.name, input.value);
            });

            $.ajax({
                url: "<?php echo e(route('product.store')); ?>",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: fd,
                contentType: false,
                processData: false,
                type: 'POST',
                success: function (data) {
                    if (data.flag == "success") {
                        show_toastr('success', data.msg, 'success');
                        window.location.href = "<?php echo e(route('product.index')); ?>";
                    } else {
                        show_toastr('Error', data.msg, 'error');
                    }
                },
                error: function (data) {
                    // Dropzones.removeFile(file);
                    if (data.error) {
                        show_toastr('Error', data.error, 'error');
                    } else {
                        show_toastr('Error', data, 'error');
                    }
                },
            });
        });

        $(document).on('click', '.get-variants', function (e) {

            $("#commonModal .modal-title").html('<?php echo e(__("Add Variants")); ?>');
            $("#commonModal .modal-dialog").addClass('modal-md');
            $("#commonModal").modal('show');

            $.get('<?php echo e(route('product.variants.create')); ?>', {}, function (data) {
                $('#commonModal .modal-body').html(data);
            });
        });

        $(document).on('click', '.add-variants', function (e) {
            e.preventDefault();

            var form = $(this).parents('form');
            var variantNameEle = $('#variant_name');
            var variantOptionsEle = $('#variant_options');
            var isValid = true;

            if (variantNameEle.val() == '') {
                variantNameEle.focus();
                isValid = false;
            } else if (variantOptionsEle.val() == '') {
                variantOptionsEle.focus();
                isValid = false;
            }

            if (isValid) {
                $.ajax({
                    url: form.attr('action'),
                    datType: 'json',
                    data: {
                        variant_name: variantNameEle.val(),
                        variant_options: variantOptionsEle.val(),
                        hiddenVariantOptions: $('#hiddenVariantOptions').val()
                    },
                    success: function (data) {
                        $('#hiddenVariantOptions').val(data.hiddenVariantOptions);
                        $('.variant-table').html(data.varitantHTML);
                        $("#commonModal").modal('hide');
                    }
                })
            }
        });

        $('#cost').trigger('keyup');
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div id="account_edit" class="tabs-card">
                <div class="card ">
                    <div class="card-body">
                        <?php echo e(Form::open(array('method'=>'post','id'=>'frmTarget','enctype'=>'multipart/form-data'))); ?>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('name',__('Name'),array('class'=>'form-control-label'))); ?>

                                    <?php echo e(Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Name')))); ?>

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('product_categorie',__('Product Categories'),array('class'=>'form-control-label'))); ?>

                                    <?php echo Form::select('product_categorie[]', $product_categorie, null,array('class' => 'form-control','data-toggle'=>'select','multiple')); ?>

                                    <?php if(count($product_categorie) == 0): ?>
                                        <?php echo e(__('Add product category')); ?>

                                        <a href="<?php echo e(route('product_categorie.index')); ?>">
                                            <?php echo e(__('Click here')); ?>

                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('SKU',__('SKU'),array('class'=>'form-control-label'))); ?>

                                    <?php echo e(Form::text('SKU',null,array('class'=>'form-control','placeholder'=>__('Enter SKU')))); ?>

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('product_tax',__('Product Tax'),array('class'=>'form-control-label'))); ?>

                                    <?php echo e(Form::select('product_tax[]', $product_tax,null, array('class' => 'form-control','data-toggle'=>'select','multiple'))); ?>

                                    <?php if(count($product_tax) == 0): ?>
                                        <?php echo e(__('Add product tax')); ?>

                                        <a href="<?php echo e(route('product_tax.index')); ?>">
                                            <?php echo e(__('Click here')); ?>

                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-6 proprice">
                                <div class="form-group">
                                    <?php echo e(Form::label('price',__('Price'),array('class'=>'form-control-label'))); ?>

                                    <?php echo e(Form::number('price', null, array('step' => 'any','class' => 'form-control'))); ?>

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('last_price',__('Last Price'),array('class'=>'form-control-label'))); ?>

                                    <?php echo e(Form::number('last_price', null, array('step' => 'any','class' => 'form-control'))); ?>

                                </div>
                            </div>
                            <div class="col-6 proprice">
                                <div class="form-group">
                                    <?php echo e(Form::label('quantity',__('Stock Quantity'),array('class'=>'form-control-label'))); ?>

                                    <?php echo e(Form::text('quantity',null,array('class'=>'form-control','placeholder'=>__('Enter Stock Quantity'),'required'=>'required'))); ?>

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="attachment" class="form-control-label"><?php echo e(__('Attachment')); ?></label>
                                    <input type="file" name="attachment" id="attachment" class="custom-input-file">
                                    <label for="attachment">
                                        <i class="fa fa-upload"></i>
                                        <span><?php echo e(__('Choose a file')); ?></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="downloadable_prodcut" class="form-control-label font-bold-700"><?php echo e(__('Downloadable Product')); ?></label>
                                    <input type="file" name="downloadable_prodcut" id="downloadable_prodcut" class="custom-input-file">
                                    <label for="downloadable_prodcut">
                                        <i class="fa fa-upload"></i>
                                        <span><?php echo e(__('Choose a file')); ?></span>
                                    </label>
                                </div>
                            </div>

                            <div class="col-12">
                                <h6><?php echo e(__('Custom Field')); ?> </h6>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('custom_field_1',__('Custom Field'),array('class'=>'form-control-label'))); ?>

                                    <?php echo e(Form::text('custom_field_1',null,array('class'=>'form-control','placeholder'=>__('Enter Custom Field'),'required'=>'required'))); ?>

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('custom_value_1',__('Custom Value'),array('class'=>'form-control-label'))); ?>

                                    <?php echo e(Form::text('custom_value_1',null,array('class'=>'form-control','placeholder'=>__('Enter Custom Value'),'required'=>'required'))); ?>

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('custom_field_2',__('Custom Field'),array('class'=>'form-control-label'))); ?>

                                    <?php echo e(Form::text('custom_field_2',null,array('class'=>'form-control','placeholder'=>__('Enter Custom Field'),'required'=>'required'))); ?>

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('custom_value_2',__('Custom Value'),array('class'=>'form-control-label'))); ?>

                                    <?php echo e(Form::text('custom_value_2',null,array('class'=>'form-control','placeholder'=>__('Enter Custom Value'),'required'=>'required'))); ?>

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('custom_field_3',__('Custom Field'),array('class'=>'form-control-label'))); ?>

                                    <?php echo e(Form::text('custom_field_3',null,array('class'=>'form-control','placeholder'=>__('Enter Custom Field'),'required'=>'required'))); ?>

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('custom_value_3',__('Custom Value'),array('class'=>'form-control-label'))); ?>

                                    <?php echo e(Form::text('custom_value_3',null,array('class'=>'form-control','placeholder'=>__('Enter Custom Value'),'required'=>'required'))); ?>

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('custom_field_4',__('Custom Field'),array('class'=>'form-control-label'))); ?>

                                    <?php echo e(Form::text('custom_field_4',null,array('class'=>'form-control','placeholder'=>__('Enter Custom Field'),'required'=>'required'))); ?>

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('custom_value_4',__('Custom Value'),array('class'=>'form-control-label'))); ?>

                                    <?php echo e(Form::text('custom_value_4',null,array('class'=>'form-control','placeholder'=>__('Enter Custom Value'),'required'=>'required'))); ?>

                                </div>
                            </div>


                            <div class="form-group col-md-6 py-4">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" name="product_display" class="custom-control-input" id="product_display">
                                    <label name="product_display" class="custom-control-label form-control-label" for="product_display"></label>
                                    <?php echo e(Form::label('product_display',__('Product Display'),array('class'=>'form-control-label'))); ?>

                                </div>
                                <?php $__errorArgs = ['product_display'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-product_display" role="alert">
                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group col-md-6 py-4">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" name="enable_product_variant" id="enable_product_variant" >

                                    <label class="custom-control-label form-control-label" for="enable_product_variant"><?php echo e(__('Display Variants')); ?></label>
                                </div>
                            </div>
                            <div id="productVariant" class="col-md-12">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card my-3">
                                            <div class="card-header">
                                                <div class="row flex-grow-1">
                                                    <div class="col-md d-flex align-items-center">
                                                        <h5 class="card-header-title"><?php echo e(__('Product Variants')); ?></h5>
                                                    </div>
                                                    <div class="col-md-auto">
                                                        <button type="button" class="btn btn-sm btn-primary get-variants"><i class="fas fa-plus"></i> <?php echo e(__('Add Variant')); ?></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <input type="hidden" id="hiddenVariantOptions" name="hiddenVariantOptions" value="{}">
                                                <div class="variant-table">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 border-0">
                                <div class="row">
                                    <div class="col-6">
                                        <h5 class="mb-0"><?php echo e(__('Product Image')); ?></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('sub_images',__('Upload Product Images'),array('class'=>'form-control-label'))); ?>

                                            <div class="dropzone dropzone-multiple" data-toggle="dropzone1" data-dropzone-url="http://" data-dropzone-multiple>
                                                <div class="fallback">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="dropzone-1" name="file" multiple>
                                                        <label class="custom-file-label" for="customFileUpload"><?php echo e(__('Choose file')); ?></label>
                                                    </div>
                                                </div>
                                                <ul class="dz-preview dz-preview-multiple list-group list-group-lg list-group-flush">
                                                    <li class="list-group-item px-0">
                                                        <div class="row align-items-center">
                                                            <div class="col-auto">
                                                                <div class="avatar">
                                                                    <img class="rounded" src="" alt="Image placeholder" data-dz-thumbnail>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <h6 class="text-sm mb-1" data-dz-name>...</h6>
                                                                <p class="small text-muted mb-0" data-dz-size></p>
                                                            </div>
                                                            <div class="col-auto">
                                                                <a href="#" class="dropdown-item" data-dz-remove>
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="is_cover_image" class="form-control-label"><?php echo e(__('Upload Cover Image')); ?></label>
                                            <input type="file" name="is_cover_image" id="is_cover_image" class="custom-input-file">
                                            <label for="is_cover_image">
                                                <i class="fa fa-upload"></i>
                                                <span><?php echo e(__('Choose a file')); ?></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 pt-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('description',__('Product Description'),array('class'=>'form-control-label'))); ?>

                                    <?php echo e(Form::textarea('description',null,array('class'=>'form-control summernote-simple','rows'=>2,'placeholder'=>__('Product Description')))); ?>

                                </div>
                            </div>
                            <div class="col-12 pt-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('specification',__('Product Specification'),array('class'=>'form-control-label'))); ?>

                                    <?php echo e(Form::textarea('specification',null,array('class'=>'form-control summernote-simple','rows'=>3,'placeholder'=>__('Product Specification')))); ?>

                                </div>
                            </div>
                            <div class="col-12 pt-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('detail',__('Product Details'),array('class'=>'form-control-label'))); ?>

                                    <?php echo e(Form::textarea('detail',null,array('class'=>'form-control summernote-simple','rows'=>3,'placeholder'=>__('Product Details')))); ?>

                                </div>
                            </div>
                        </div>
                        <div class="w-100 text-right">
                            <button type="button" class="btn btn-sm btn-primary rounded-pill mr-auto" id="submit-all"><?php echo e(__('Save')); ?></button>
                        </div>
                    </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\MY PROJECT\LARAVEL\1. From Fiver\storego-saas-v3.0\main_file\resources\views/product/create.blade.php ENDPATH**/ ?>