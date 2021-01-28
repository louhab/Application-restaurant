
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
                            <h3 class="text-secondary"><i class="fas fa-chair"></i> Tables </h3>
                            <a href="<?php echo e(route('tables.create')); ?>" class="btn btn-primary"> <i class="fas fa-plus fa-x2"></i></a>
                            </div>
                            <table class=" table table-hover table-responsive-sm">
                            <thead>
                            <th>ID</th>
                            <th>Nom de la table</th>
                            <th>Disponible</th>
                            <th>Action </th>
                            </thead>
                            <?php $__currentLoopData = $tables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $table): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tbody>
                           
                            <td><?php echo e($table->id); ?></td>
                            <td><?php echo e($table->names); ?></td>
                            <td>
                            <?php if($table->statu === "oui"): ?>
                            <span class="badge badge-success"> oui </span>
                            <?php elseif($table->statu === "non"): ?>
                            <span class="badge badge-danger"> non </span>
                            <?php endif; ?>
                            </td>
                            <td class="d-flex flex-row justify-content-center align-items-center">
                            <a href="<?php echo e(route('tables.edit', $table->slug )); ?>" class="btn btn-warning">  editer </a>
                           <form id="<?php echo e($table->id); ?>"
                           action="<?php echo e(route('tables.destroy', $table->slug )); ?>" method="post">
                           <?php echo csrf_field(); ?>
                           <?php echo method_field("delete"); ?>
                            <button
                            onclick="
                            event.preventDefault();
                            if(confirm('voulez vous supprimer la categories <?php echo e($table->names); ?> ?'))
                            document.getElementById(<?php echo e($table->id); ?>).submit()
                            "
                             class="btn btn-danger">supprimer </button></form>

                            </td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            </table>
                            <div class="my-3 d-flex justify-content-center align-items-center">
                            <?php echo e($tables->links()); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp5\htdocs\restaurant\resources\views/management/tables/index.blade.php ENDPATH**/ ?>