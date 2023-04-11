<?php $__env->startSection('content'); ?>
<div class="container" style="margin-top: 160px;">
  <h1 style="margin-bottom: 40px;">Elegir Carreras disponibles</h1>
  <?php if(count($races) == 0): ?>
    <p>Ya has seleccionado todas las carreras!</p>
  <?php else: ?>
    <form action="../chooseRaces/<?php echo e($id); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="row">
            <?php $__currentLoopData = $races; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $race): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php 
                $id = $race['id'];
                $imagen = preg_replace('([^A-Za-z0-9 ])', '', $race['promotion']);
            ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                <img class="card-img-top" src="http://localhost/bikerollSalma/resources/img/<?php echo strtolower($imagen) ?>.jpg" alt="Card image cap" style="height: 200px;">
                <div class="card-body">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="racescheck[]" value="<?php echo e($id); ?>">
                    <label class="form-check-label"><h5 class="card-title"><?php echo e($race['title']); ?></h5></label>
                    </div>
                </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <input type="submit" name="select" value="Seleccionar" class="btn btn-primary mt-3">
    </form>
  <?php endif; ?>
  <a href="<?php echo e(url('/paginaPrincipal')); ?>" class="btn btn-secondary mt-3">Pagina principal</a>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bikerollSalma\resources\views/admin/sponsors/elegirCarreras.blade.php ENDPATH**/ ?>