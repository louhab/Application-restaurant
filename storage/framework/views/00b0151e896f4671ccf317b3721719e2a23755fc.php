
<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="justify-content-center row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                           <?php echo $__env->make('layouts.seidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                           <div class="card">
                           <div class="card-body">
                           <h5 class="font-weight-bold mt-2"> CHoisir la categories </h5>
                      
                           <ul class="list-group mb-3">
                           <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(route('menus.show',$categorie->id)); ?>"
                            class="list-group-item 
                            font-wight-bold
                            list-group-item-action
                            list-group-item-light"><?php echo e($categorie->title); ?></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                           
                           </div>
                           </div>
                        </div>
                        <div class="col-md-8">
                            <div class="d-flex flex-row justify-content-between align-items-center border-bottom bp-1">
                            <h3 class="text-secondary"><i class="fas fa-clipboard-list"></i> Prduits </h3>
                            
                            <a href="<?php echo e(route('menus.create')); ?>" class="btn btn-primary"> <i class="fas fa-plus fa-x2"></i></a>
                            </div>
                            
                            
                            
                            <form action="<?php echo e(route('menu.trie')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="col-md-4">
                            <select name="tries" id="" class="form-control mt-2">
                            <option value="" selected disabled class="font-weight-bold " >Trier par :</option>
                            
                            <option value="price">
                           prix  
                             </option>
                            <option value="name">
                           nom
                            </option>
                            </select>
                            <button class="btn btn-primary mt-2 ">tirer </button>
                            </div>
                            
                            </form>
                           
                            
                            <table class=" table table-hover table-responsive-sm mt-2">
                            <thead>
                            <th>title</th>
                  
                            <th>description </th>
                            <th>price </th>
                            <th>image </th>
                            <th>category </th>
                            <th>Action </th>
                            </thead>
                            <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tbody>
                           
                            <td><?php echo e($menu->title); ?></td>
                            
                            <td><?php echo e(substr($menu->dexcription,0,100)); ?></td>
                            <td><?php echo e($menu->price); ?> DH </td>
                            <td><img src="<?php echo e(asset('images/menu/'.$menu->image)); ?>" alt="<?php echo e($menu->image); ?>" class="fluid" width="60" height="60"></td>
                            <td><?php echo e($menu->category->title); ?></td>
                            <td class="d-flex flex-row justify-content-center align-items-center">
                            <a href="<?php echo e(route('menus.edit',$menu->slug )); ?>" class="btn btn-warning">  editer </a>
                           <form id="<?php echo e($menu->id); ?>"
                           action="<?php echo e(route('menus.destroy',$menu->slug )); ?>" method="post">
                           <?php echo csrf_field(); ?>
                           <?php echo method_field("delete"); ?>
                            <button
                            onclick="
                            event.preventDefault();
                            if(confirm('voulez vous supprimer Menu <?php echo e($menu->title); ?> ?'))
                            document.getElementById(<?php echo e($menu->id); ?>).submit()
                            "
                             class="btn btn-danger">supprimer </button></form>

                            </td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            </table>
                            <div class="my-3 d-flex justify-content-center align-items-center">
                              <a href="<?php echo e(route('menus.index')); ?>" class="btn btn-primary">tous les produits </a>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp5\htdocs\restaurant\resources\views/management/menus/index.blade.php ENDPATH**/ ?>