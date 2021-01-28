
<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="justify-content-center row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                        <?php echo $__env->make('layouts.seidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        </div>
                        <div class="col-md-8">
                            <div class="d-flex flex-row justify-content-between align-items-center border-bottom bp-1 mb-3 ">
                            <h3 class="text-secondary"><i class="fas fa-plus"></i> modifier la  table <?php echo e($table->names); ?> </h3>
                            <a href="<?php echo e(route('tables.index')); ?>" class="btn btn-primary"> <i class="fas fa-home fa-x2"></i></a>
                            </div>
                            <form method="post" action="<?php echo e(route('tables.update',$table->slug)); ?>" class="mb-3">
                             <?php echo method_field("put"); ?>
                             <?php echo csrf_field(); ?> 
                             <div class="form-group">
                                 <input type="text" name="names" value="<?php echo e($table->names); ?>" id="" class="form-control">
                             </div>
                             <div class="form-group">
                                <select name="statu" id="statu" class="form-control">
                                <option value="" disabled > Disponible </option>
                                <option <?php echo e($table->statu ==="oui" ? "selected" : ""); ?>  > oui </option>
                                <option  <?php echo e($table->statu ==="non" ? "selected" : ""); ?> > non </option>
                                </select>
                             </div>
                             <div class="form-group">
                              <button class="btn btn-primary"> valider </button>
                             </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp5\htdocs\restaurant\resources\views/management/tables/edit.blade.php ENDPATH**/ ?>