<?php $__env->startSection('content'); ?>
<style>
    td,th{border: 1px solid;}
    td{width: 80px}
    table{width: 1500px;margin: auto;text-align: center;}
    img{width: 50%;height: 50%}
    iframe{max-width:400px !important;max-height:200px;width:100% !important;}

</style>

<div class="container air">
<form action="editarCarrera" method="post">
    <?php echo csrf_field(); ?>
<div class="input-group col-lg-12" style="margin:20px 0 20px;">
    
        <input type="text" name="buscador" class="form-control col-lg-12" placeholder="Búsqueda..." aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
            <input type="submit" value="Buscar" name="buscButton" class="btn btn-outline-secondary" type="button">
            </div>
</div>
</form>


    <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 style="display:inline">Todas las carreras</h1>
                    <a href="<?php echo e(url('/paginaPrincipal')); ?>" class="btn btn-primary float-right" style="margin-top: 10px;">Volver a la página principal</a>
                </div>
            </div>
    </div>
    <hr>

    <?php if ($carreras->count()==0){
        echo '<p> Actualmente no hay carreras que mostrar </p>';
    }
    else{ ?>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <?php $__currentLoopData = $carreras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $id = $row['id'];
                ?>
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100">
                    <div class="card-header">
                        <h5 class="card-title"><?php echo e($row['title']); ?></h5>
                    </div>
                    <div class="card-body">
                        <?php $prom=preg_replace('([^A-Za-z0-9 ])', '', $row['promotion'])?>
                        <p class="card-text" style="max-height:300px;text-align:center"><a href="cartelCarrera/<?php echo e($id); ?>"><img src="../resources/img/<?php echo strtolower($prom) ?>.jpg" alt="" style="margin:0 auto;"></a>
                        <!-- <p class="card-text"><strong>Descripción: </strong><?php echo e($row['description']); ?></p> -->
                        <p class="card-text"><strong>Fecha: </strong> <?php echo e($row['date']); ?></p>
                        <p class="card-text"><strong>Salida: </strong> <?php echo e($row['start']); ?> </p>
                        <p class="card-text"><strong>Nº de participantes: </strong> <?php echo e($row['number_participants']); ?> </p>
                        <p class="card-text"><strong>Distancia y desnivel:</strong> <?php echo e($row['km']); ?>km / <?php echo e($row['unevenness']); ?>m </p>
                        
                       
                        <p class="card-text"><strong>Precio: </strong> <?php echo e($row['price']); ?>€</p>


                        <p class="card-text"><a href="runnersRace/<?php echo e($id); ?>"><img src="../resources/img/edit.png" alt="" style="width:20px;height:20px;"></a><strong> Corredores apuntados </strong> </p>
                        <p class="card-text"><a href="aseguradoraC/<?php echo e($id); ?>"><img src="../resources/img/edit.png" alt="" style="width:20px;height:20px;"></a> <strong>Gestionar aseguradoras </strong></p>

                        <?php 
                        //Si la carrera ya ha terminado permitir subir fotos
                        if (date($row['date'])<date('Y-m-d H:i:s')){   
                            ?><p class="card-text"><a href="subirFotos/<?php echo e($id); ?>"><img src="../resources/img/upload.png" alt="" style="width:20px;height:20px;"></a><strong> Subir fotos</strong> </p><?php
                        }
                        else{
                            ?><p><img src="../resources/img/bloquear.png" alt="" style="width:20px;height:20px;"><strong> Subir fotos</strong> </p><?php
                        }
                        ?>

                        
                        <p class="card-text"><a href="verFotos/<?php echo e($id); ?>"><img src="../resources/img/ver.png" alt="" style="width:20px;height:20px;"></a><strong> Ver fotos</strong></p>

                        <p class="card-text">
                            <?php if($row['state'] == 0): ?>
                                <a href="estadoCarrera/<?php echo e($id); ?>"><img src="../resources/img/off.png" alt="" style="width:30px;height:30px;"></a>
                            <?php else: ?>
                                <a href="estadoCarrera/<?php echo e($id); ?>"><img src="../resources/img/on.png" alt="" style="width:30px;height:30px;"></a>
                            <?php endif; ?>
                            <strong>Estado</strong>
                        </p>

                        <p class="card-text"><?php echo $row['image']?></p>
                        
                        
                        
                    </div>
                    <div class="card-footer">
                        <a href="datosCarrera/<?php echo e($id); ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Editar</a>
                        <a href="imagenCarrera/<?php echo e($id); ?>" class="btn btn-primary float-right"><i class="bi bi-pencil-square"></i> Actualizar mapa</a>
                    </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php }?>
   
<!-- <a href="<?php echo e(url('/paginaPrincipal')); ?>">Volver atras</a> -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bikerollSalma\resources\views/admin/carreras/editarCarrera.blade.php ENDPATH**/ ?>