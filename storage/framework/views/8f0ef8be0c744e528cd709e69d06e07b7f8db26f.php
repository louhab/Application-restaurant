
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
                            <div class="d-flex flex-row justify-content-between align-items-center border-bottom bp-1">
                            <h3 class="text-secondary"><i class="fas fa-th-list"></i> Categories</h3>
                            <a href="<?php echo e(route('categories.create')); ?>" class="btn btn-primary"> <i class="fas fa-plus fa-x2"></i></a>
                            </div>
                            <table class=" table table-hover table-responsive-sm">
                            <thead>
                            <th>ID</th>
                            <th>Titre</th>
                            <th>Action </th>
                            </thead>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tbody>
                           
                            <td><?php echo e($category->id); ?></td>
                            <td><?php echo e($category->title); ?></td>
                            <td class="d-flex flex-row justify-content-center align-items-center">
                            <a href="<?php echo e(route('categories.edit', $category->slug )); ?>" class="btn btn-warning">  editer </a>
                           <form id="<?php echo e($category->id); ?>"
                           action="<?php echo e(route('categories.destroy', $category->slug )); ?>" method="post">
                           <?php echo csrf_field(); ?>
                           <?php echo method_field("delete"); ?>
                            <button
                            onclick="
                            event.preventDefault();
                            if(confirm('voulez vous supprimer la categories <?php echo e($category->title); ?> ?'))
                            document.getElementById(<?php echo e($category->id); ?>).submit()
                            "
                             class="btn btn-danger">supprimer </button></form>

                            </td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            </table>
                            <div class="my-3 d-flex justify-content-center align-items-center">
                           
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp5\htdocs\restaurant\resources\views/management/categories/index.blade.php ENDPATH**/ ?>