
<?php $__env->startSection('title','Create Category'); ?>
<?php $__env->startPush('links'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin-assets/app-assets/vendors/css/forms/toggle/switchery.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin-assets/app-assets/css/plugins/forms/switch.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('admin-assets/dropify/css/dropify.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('admin-assets/summernote/dist/summernote.css')); ?>"/>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jstree/3.3.3/themes/default/style.min.css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.5.1/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.5.1/css/froala_style.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopPush(); ?>
<?php $__env->startSection('main'); ?>

<div class="content-header row">

    <div class="content-header-left col-md-6 col-12 mb-2">
      <h5 class="content-header-title mb-0">Category Create</h5>
    </div>

    <div class="content-header-right col-md-6 col-12">
      <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group" role="group">
            <?php if (\Illuminate\Support\Facades\Blade::check('can', 'add_category')): ?>
            <button class="btn btn-danger btn-sm" data-action="resetForm" onclick="deleteForm('<?php echo e(route('admin.category.destroy',@$category->id)); ?>')"> Delete </button>&nbsp;&nbsp;&nbsp;
                <a href="<?php echo e(route('admin.category.create')); ?>" class="btn btn-primary btn-sm">Add Category</a> &nbsp;&nbsp;&nbsp;
                <button class="btn btn-primary btn-sm" onclick="subCategory('<?php echo e(adminRoute('destroy',$category->id)); ?>')">+ New Sub Category </button>
            <?php endif; ?>
       </div>
    </div>
</div>
</div>

<div class="card">
    <div class="card-content">
        <div class="card-body">
          
            <div class="row my-1">
                <div class="col-lg-3 col-3">

                    <div class="tree" id="category">
                    </div>

                </div>

                <div class="col-lg-9 col-9">


                <?php echo Form::open(['method' => 'PUT', 'route'=>['admin.'.request()->segment(2).'.update',$category->id], 'class' => 'form-horizontal','files'=>true]); ?>

                       
                     <div class="row my-1">
                        <div class="col-lg-7 col-7">

                            <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                    <?php echo Form::label('name', 'Category Name'); ?>

                                    <?php echo Form::text('name', $category->name, ['class' => 'form-control', 'required' => 'required','placeholder'=>'Category']); ?>

                                    <small class="text-danger"><?php echo e($errors->first('name')); ?></small>
                                </div>


                                <div class="form-group<?php echo e($errors->has('body') ? ' has-error' : ''); ?>">
                                    <?php echo Form::label('body', 'Content'); ?>

                                    <?php echo Form::textarea('body', $category->body, ['class' => 'form-control summernote', 'required' => 'required']); ?>

                                    <small class="text-danger"><?php echo e($errors->first('body')); ?></small>
                                </div>
                            
                                <div class="btn-group">
                                    <?php echo Form::submit("Add Category", ['class' => 'btn btn-info']); ?>

                                </div>
                        </div>

                        <div class="col-lg-5 col-5">

                            
                            <div class="form-group">
                                <div class="checkbox<?php echo e($errors->has('status') ? ' has-error' : ''); ?>">
                                    <?php echo Form::label('status', 'Status'); ?><br>
                                     <?php echo Form::checkbox('status', '1', 1, ['id' => 'switch1','class'=>'switch']); ?> 
                                </div>
                                <small class="text-danger"><?php echo e($errors->first('status')); ?></small>
                            </div>

                            <div class="form-group <?php echo e($errors->has('image') ? ' has-error' : ''); ?>">

                                    <?php echo Form::label('image', 'Image'); ?>


                                    <?php echo Form::file('image', ['class'=>'dropify']); ?>


                                    <small class="text-danger"><?php echo e($errors->first('image')); ?></small>

                            </div>
                            
                        </div>
                    </div>
                <?php echo Form::close(); ?>

            </div>
            </div>
          

        </div>
             
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('admin-assets/summernote/dist/summernote.js')); ?>"></script>
<script src="<?php echo e(asset('admin-assets/app-assets/vendors/js/forms/toggle/bootstrap-checkbox.min.js')); ?>"
  type="text/javascript"></script>
<script src="<?php echo e(asset('admin-assets/dropify/js/dropify.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin-assets/dropify/dropify.js')); ?>"></script>
<script src="<?php echo e(asset('admin-assets/app-assets/vendors/js/forms/toggle/switchery.min.js')); ?>" type="text/javascript"></script>
 <script src="<?php echo e(asset('admin-assets/app-assets/js/scripts/forms/switch.js')); ?>" type="text/javascript"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/jstree/3.3.3/jstree.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.5.1//js/froala_editor.pkgd.min.js"></script>

<script type="text/javascript">

    jQuery(document).ready(function() {



        $('.summernote').summernote({

            height: 350, // set editor height

            minHeight: null, // set minimum height of editor

            maxHeight: null, // set maximum height of editor

            focus: false, // set focus to editable area after initializing summernote

            popover: { image: [], link: [], air: [] }

        });



        $('.inline-editor').summernote({

            airMode: true

        });



    });

    function subCategory(url){
    window.location.href = url;
};


    $('body').find('button').on('click', function(e) {
        if ($(this).attr('data-action') === 'resetForm') {
            $('form#CreateCategoryForm').trigger('reset');
        }
    });
    $('#category').on('click', 'li a', function() {    
        window.location.href = $(this).attr('href')+"/edit";
    });


    $("#category").jstree({
        "core": {
            "check_callback": true,
            'data': {
                'url': '/admin/category',
                'data': function(node) {}
            }
        },
        "plugins": ['core', "dnd", 'json_data', 'sort', 'json'],
        "types": {
            "#": {
                "max_depth": 3,
            }
        },
        "sort": function(a, b) {},
    })
    .bind("move_node.jstree", function(e, data) {
        <?php if (\Illuminate\Support\Facades\Blade::check('can', 'category_edit')): ?>
        axios.put('<?php echo e(adminRoute('update','')); ?>/' + data.node.id, {
                'parent': data.parent,
                'position': data.position,
            }).then(response => {
            toastr.success('category updated');
        }).catch(error => {
            toastr.error('Error in updating category ..');
        });
        <?php endif; ?>
    })
 </script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/ta2workout/resources/views/admin/category/edit.blade.php ENDPATH**/ ?>