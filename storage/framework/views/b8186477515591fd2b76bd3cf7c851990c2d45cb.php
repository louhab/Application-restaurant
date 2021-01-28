
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
                            <h3 class="text-secondary"><i class="fas fa-plus"></i> Ajouter une menu </h3>
                            <a href="<?php echo e(route('menus.index')); ?>" class="btn btn-primary"> <i class="fas fa-home fa-x2"></i></a>
                            </div>
                            <form method="post" action="<?php echo e(route('menus.store')); ?>" class="mb-3"enctype= "multipart/form-data">
                             <?php echo csrf_field(); ?> 
                             <div class="form-group">
                                 <input type="text" name="title" id="" class="form-control">
                             </div>
         
                             <div class="form-group">
                                 <textarea type="text" name="description" 
                                 rows="5"
                                 cols="30"
                                 id="" class="form-control"></textarea>
                             </div>
                             <div class="input-group mb-3">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control" name="price" >
                                <span class="input-group-text">.00</span>
                            </div>
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Image</span>
                                </div>
                            <div class="custom-file">    
                                <input type="file" class="custom-file-input"  name="image">
                                <label class="custom-file-label">2 mega max</label>
                            </div>
                            </div>
                               
                             <div class="form-group ">
                             <select name="category_id" id="category_id" class="form-control">
                             <option value="" selected disabled >Choisir une categorie </option>
                             <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <option value="<?php echo e($categorie->id); ?>">
                             <?php echo e($categorie->title); ?>

                             </option>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp5\htdocs\restaurant\resources\views/management/menus/create.blade.php ENDPATH**/ ?>