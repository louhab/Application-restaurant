<?php if($errors->all()): ?>
<?php $__currentLoopData = $errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="alert aler-danger"><?php echo e($error); ?></div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php if(session()->has("success")): ?>
<div class="alert alert-sucess alert-dismissible fade show" role="alert"><strong><?php echo e(session()->get("success")); ?></strong>
<button class="close" type="button" data-dismss="alert" area-label="close"
>
<span>&times;</span>
</button>
</div>
<?php endif; ?><?php /**PATH C:\xampp5\htdocs\restaurant\resources\views/layouts/alert.blade.php ENDPATH**/ ?>