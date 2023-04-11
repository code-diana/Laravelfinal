<?php $__env->startSection('content'); ?>
<?php
    $id_race = $id;
?>

<div class="container mt-5 air">
    <h1 class="mb-4">Corredores apuntados en la carrera <?php echo e($id_race); ?></h1>
    
    <div class="row">
        <div class="col-md-6">
            <form action="<?php echo e($id_race); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="input-group">
                    <input type="text" name="buscador" class="form-control" placeholder="Buscar por nombre o precio...">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" name="buscButton">Buscar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <div class="container mt-3 air">
        <div class="row">
            <div class="col-lg-12">
                <a href="<?php echo e(url('/paginaPrincipal')); ?>" class="btn btn-primary float-right" style="margin-top: 10px;">Página principal</a>
            </div>
        </div>
    </div>
    <?php if(count($runners)==0): ?>
        <p>¡No se han encontrado resultados!</p>
    <?php else: ?>
        <div class="row mt-4">
            <?php $__currentLoopData = $runners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $runner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    //Calcular la edad de la persona depende de su fecha de nacimiento
                    $edad = now()->diff($runner->birth_date)->y;
                ?>

                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title"><?php echo e($runner->name . ' ' . $runner->last_name); ?></h2>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo e($edad); ?> años</h6>
                            
                            <?php if($runner->sex == 1): ?>
                                <p class="card-text"><strong>Género:</strong> Mujer</p>
                            <?php else: ?>
                                <p class="card-text"><strong>Género:</strong> Hombre</p>
                            <?php endif; ?>
                            <p class="card-text"><strong>Dirección:</strong> <?php echo e($runner->adress); ?></p>
                            
                            <?php if($runner->pro == 1): ?>
                                <p class="card-text"><strong>Pro:</strong> Sí</p>
                                <p class="card-text"><strong>Número de federación:</strong> <?php echo e($runner->federation_number); ?></p>
                            <?php else: ?>
                                <p class="card-text"><strong>Pro:</strong> No</p>
                                <p class="card-text"><strong>Número de federación:</strong> ----</p>
                            <?php endif; ?>
                            <p class="card-text"><strong>Dorsal:</strong> <?php echo e($runner->dorsal); ?></p>
                            <p class="card-text"><strong>Puntos:</strong> <?php echo e($runner->points); ?></p>

                            <?php
                                $id_runner = $runner->id;
                                //Link de la pagina en real
                                //$url = route('datosQr' , ['id_runner' => $id_runner , 'id_race' => $id_race]);
                                $url = "http://www.dianasalma-pruebas.com.mialias.net/bikeroll/public/datosQr/$id_runner/$id_race";
                            ?>
                            <div class="qr"><?php echo QrCode::size(100)->backgroundColor(255, 255, 255)->color(0,0,0)->generate($url); ?></div>
                            <?php echo e($url); ?>

                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bikerollSalma\resources\views/admin/inscripciones/runnersRace.blade.php ENDPATH**/ ?>