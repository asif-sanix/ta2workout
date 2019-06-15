
<?php $__env->startSection('title','Create Slider'); ?>
<?php $__env->startPush('links'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin-assets/app-assets/vendors/css/forms/toggle/switchery.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin-assets/app-assets/css/plugins/forms/switch.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('admin-assets/dropify/css/dropify.min.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('main'); ?>

<div class="content-header row">

    <div class="content-header-left col-md-6 col-12 mb-2">
      <h5 class="content-header-title mb-0">Slider Create</h5>
    </div>

    <div class="content-header-right col-md-6 col-12">
      <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group" role="group">
            <?php if (\Illuminate\Support\Facades\Blade::check('can', 'add_slider')): ?>
                <a href="<?php echo e(route('admin.slider.create')); ?>" class="btn btn-primary btn-sm">Add Slider</a>
            <?php endif; ?>
       </div>
    </div>
</div>
</div>

<div class="card">
    <div class="card-content">
        <div class="card-body">
          <?php echo Form::open(['method' => 'POST', 'route' => 'admin.slider.store', 'class' => 'form-horizontal','files'=>true]); ?>


            <div class="row my-1">
                <div class="col-lg-7 col-7">

                    
                        <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('title', 'Title'); ?>

                            <?php echo Form::text('title', null, ['class' => 'form-control', 'required' => 'required','placeholder'=>'title']); ?>

                            <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
                        </div>

                        <div class="form-group<?php echo e($errors->has('sub_title') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('sub_title', 'Sub Title'); ?>

                            <?php echo Form::text('sub_title', null, ['class' => 'form-control', 'required' => 'required','placeholder'=>'Sub title']); ?>

                            <small class="text-danger"><?php echo e($errors->first('sub_title')); ?></small>
                        </div>

                        <div class="form-group<?php echo e($errors->has('button_text') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('button_text', 'Text On Button'); ?>

                            <?php echo Form::text('button_text', null, ['class' => 'form-control', 'required' => 'required','placeholder'=>'Text On Button']); ?>

                            <small class="text-danger"><?php echo e($errors->first('button_text')); ?></small>
                        </div>

                        <div class="form-group<?php echo e($errors->has('button_link') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('button_link', 'Link On Button'); ?>

                            <?php echo Form::text('button_link', null, ['class' => 'form-control', 'required' => 'required','placeholder'=>'Link On Button']); ?>

                            <small class="text-danger"><?php echo e($errors->first('button_link')); ?></small>
                        </div>
                    
                        <div class="btn-group">
                            <?php echo Form::submit("Add Slider", ['class' => 'btn btn-info']); ?>

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

                            <?php echo Form::label('image', 'Slider Image'); ?>


                            <?php echo Form::file('image', ['class'=>'dropify']); ?>


                            <small class="text-danger"><?php echo e($errors->first('image')); ?></small>

                    </div>
                </div>
            </div>
            <?php echo Form::close(); ?>


        </div>
             
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('admin-assets/app-assets/vendors/js/forms/toggle/bootstrap-checkbox.min.js')); ?>"
  type="text/javascript"></script>
<script src="<?php echo e(asset('admin-assets/dropify/js/dropify.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin-assets/dropify/dropify.js')); ?>"></script>
<script src="<?php echo e(asset('admin-assets/app-assets/vendors/js/forms/toggle/switchery.min.js')); ?>" type="text/javascript"></script>
 <script src="<?php echo e(asset('admin-assets/app-assets/js/scripts/forms/switch.js')); ?>" type="text/javascript"></script>

<script type="text/javascript">

 </script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sanix/resources/views/admin/slider/create.blade.php ENDPATH**/ ?>