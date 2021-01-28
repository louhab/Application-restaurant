
<?php $__env->startSection('content'); ?>

<div class="container">
    <form id="add-sale" action="<?php echo e(route('sales.store')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="justify-content-center row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 mb-3">
                       <div class="form-group">
                        <a href="/home" class="btn btn-outline-secondary"><i class="fas fa-chevron-left"></i> Home </a>
                       </div>
                    </div>
                
                
                     <div class="my-2 col-md-4">
                     <h3 class="text-muted border-bottom">
                     <?php echo e(Carbon\Carbon::now()); ?>

                     </h3>
                     </div>
                

                    <div class="col-md-2 mb-3">
                       <div class="form-group">
                        <a href="<?php echo e(route('sales.index')); ?>" class="btn btn-outline-secondary"> Toutes les ventes  </a>
                       </div>
                    </div>
                </div>
                    
              <div class="card">
                <div class="card-body">
                <div class="row">
                <?php $__currentLoopData = $tables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $table): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-3 ">
                <div class="card p-2 
                mb-2 d-flex flex-column 
                justify-contenet-center 
                align-items-center 
                list-group-item-action">
                    <div class="align-self-end">
                    
                    <input type="checkbox" name="table_id[]" id="table" value="<?php echo e($table->id); ?>">
                   
                    </div>
                    <i class="fas fa-chair fa-5x">
                    </i>
                    <span class="mt-2 text-muted font-weight-bold">
                    <?php echo e($table->names); ?>

                    </span>
                    <div class="card p-2 
                mb-2 d-flex flex-column 
                justify-contenet-betwen 
                align-items-center 
                list-group-item-action">
                        <a href="#" class="btn btn-warning"> <i class="fas fa-print"></i>  </a>
                       </div>
                  <hr>
                  <?php $__currentLoopData = $table->sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($sale->created_at >= Carbon\Carbon::today()): ?>
                  <div class="mb-2 mt-2 shadow w-100" id="<?php echo e($sale->id); ?>" style="border:dashed pink">
                  <div class="card">
                  <div class="card-body d-flex flex-column justify-contenet-center align-items-center list-group-item-action">
                  <?php $__currentLoopData = $sale->menus()->where("sales_id",$sale->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <h5 class="font-weight-bold mt-2">
                  <?php echo e($menu->title); ?>

                  </h5>
                  <span class="text-muted">
                  <?php echo e($menu->price); ?>DH
                  </span>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <h5 class="font-weight-bold mt-2">
                 <span class=" badge badge-danger">
                Ser : <?php echo e($sale->servant->names); ?>

                 </span>
                  </h5>
                  <h5 class="font-weight-bold mt-2">
                 <span class=" badge badge-danger">
                qte : <?php echo e($sale->quentity); ?>

                 </span>
                  </h5>
                  <h5 class="font-weight-bold mt-2">
                 <span class=" badge badge-danger">
                total : <?php echo e($sale->totale_price); ?> DH 
                 </span>
                  </h5>
                  <h5 class="font-weight-bold mt-2">
                 <span class=" badge badge-danger">
                statu : <?php echo e($sale->payement_statu); ?>  
                 </span>
                  </h5>
                  
                  </div>
                  </div>
                  </div>
                  <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                </div>
              </div>     
            </div>
        </div>  
        <div class="row justify-content-center mt-2">
        <div class="col-md-12 card p-3">
        <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
           <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <li class="nav-item">
               <a href="#<?php echo e($category->slug); ?>" 
               class="nav-link mr-1 <?php echo e($category->slug==="salade-maroccaine" ? "active" : " "); ?> "
               id="<?php echo e($category->slug); ?>-tab"
               data-toggle="pill"
               role="tab"
               aria-controls="<?php echo e($category->slug); ?>"
               aria-selected="true"
               > <?php echo e($category->title); ?></a>
             </li>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
          <div class="tab-content" id="pills-tabcontent">
          <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="tab-pane fade <?php echo e($category->slug==="salade-maroccaine" ? " active show " : " "); ?>"
           id="<?php echo e($category->slug); ?>"
           role="tabpanel"
           aria-labelledby="pills-home-tab" 
           >
           <div class="row">
           <?php $__currentLoopData = $category->menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <div class="col-md-4 mb-2">
           <div class="card h-100">
           <div class="card-body
           d-flex flex-column 
                justify-contenet-center
             align-items-center">
             <div class="align-self-end">
                <input type="checkbox" name="menu_id[]" id="menu" value="<?php echo e($menu->id); ?>">      
             </div>
             <img src="<?php echo e(asset('images/menu/'.$menu->image)); ?>"
                 alt="<?php echo e($menu->image); ?>"
                  class="img-fluid rounded-circle"
                   width="100" 
                   height="100">
                <h5 class="font-weight-bold mt-2"><?php echo e($menu->title); ?></h5>
                <h5 class="text-muted"><?php echo e($menu->price); ?> DH </h5>   
             </div>
           </div>
           </div>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           </div>
           
           </div>
           
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          </div>
          <div class="row">
           <div class="col-md-6 mx-auto">
           <div class="form-group">
           <select name="servant_id" id="" class="form-control">
           <option value="" selected disabled> Serveur</option>
           <?php $__currentLoopData = $servants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <option value="<?php echo e($servant->id); ?>"><?php echo e($servant->names); ?></option>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           </select>
           </div>
           <div class="input-group mb-3">
           <span class="input-group-text">Qte</span>
            <input type="number" class="form-control" name="qte" >
            
            </div>
            <div class="input-group mb-3">
            <span class="input-group-text">prix totale  </span>
            <input type="number" class="form-control" name="total_price" >
            
            </div>
            <div class="input-group mb-3">
            <span class="input-group-text">totale recue </span>
            <input type="number" class="form-control" name="total_received" >
            
            </div>
            <div class="input-group mb-3">
            <span class="input-group-text">Reste </span>
            <input type="number" class="form-control" name="change" >
            
            </div>
            <div class="form-group">
           <select name="payment_type" id="" class="form-control">
           <option value="" selected disabled> Type de payment </option>
           
           <option value="cash"> Espece </option>
           <option value="card"> card bancaire </option>
          
           </select>
           </div>
           <div class="form-group">
           <select name="payment_statu" id="" class="form-control">
           <option value="" selected disabled>  statue de payment  </option>
           
           <option value="piad"> Paye </option>
           <option value="impiad"> impaye  </option>
          
           </select>
           </div>
           <div class="form-group">
           <button 
           onclick="event.preventDefault();
           document.getElementById('add-sale').submit();
                      "
           class="btn btn-primary"           
           > valider </button>
           </div>
           </div>
        </div>
        </div>
       </div>
     </form> 
    
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp5\htdocs\restaurant\resources\views/payement/index.blade.php ENDPATH**/ ?>