<?php $__env->startSection('content'); ?>
<div class="container air">
        <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                            <h1 style="display:inline"><?php echo e($races['title']); ?></h1>
                    </div>
                </div>
        </div>
                    <hr>

    <div class="row" id="containerinfo" >
        
        <div class="col-lg-8">
            <p><strong>Ruta de la carrera</strong></p>
            <div class="racemap"><?php echo $races['image']?></div>
        </div>

        <div class="col-lg-4">
            <div style="color:#f0f4fa">I</div>

            <div>
                <p><?php echo e($races['description']); ?></p>
            </div>  
            <div>
                <p><strong>Desnivel :</strong> <?php echo e($races['unevenness']); ?> km</p>
            </div>
            <div>
                <p><strong>Numero participantes :</strong> <?php echo e($races['number_participants']); ?></p>
            </div>
            <div>
                <p><strong>Distancia :</strong> <?php echo e($races['km']); ?> km</p>
            </div>

            <?php 
            //Girar fecha :D
            $time = strtotime($races->date);
            $format = date('d/m/Y H:i',$time);
            ?>
            <div>
                <p><strong>Fecha y hora de salida  :</strong> <?php echo $format?> </p>
            </div>
            <div>
                <p><strong>Punto de salida :</strong> <?php echo e($races['start']); ?></p>
            </div>
            <div>
                <p><strong>Precio :</strong> Desde <?php echo e($races['price']); ?>€</p>
            </div>

    <?php $id=$races['id']; 


    //revisar

    //ver si la fecha de la carrera es más grande que hoy
    // $fecha_actual = date("d-m-Y");
    // $newDate = date("d-m-Y", strtotime($races['date'])); 
    $fecha_actual = strtotime(date("d-m-Y H:i:00",time()));
    $newDate = strtotime($races['date']); 

    //calcular el intervalo
    $hoy=now();
    $carrera=$races->date;
    $intervalo = $hoy->diff($carrera);

    if ($intervalo->m<=1 &&  $intervalo->d<=30 && $newDate>$fecha_actual){ ?>

    <button type="button" class="btn btn-primary inscribir"><a href="<?php echo e(url('/altaCorredor/'.$id)); ?>">Darse de alta</a></button>

    <?php } 

    //finalizadas
    else if($newDate<$fecha_actual){
        echo '<button type="button" class="btn btn-primary finalizada">FINALIZADA</button>';
        ?><h3> <a class="btn btn-primary" href="<?php echo e(url('/fotosPublicas/'.$id)); ?>" role="button">Ver fotografias</a> </h3><?php
    }

    //Aún no se puede apuntar
    else{
        echo '<button type="button" class="btn btn-primary notoday">El periodo de inscripción aún no ha empezado</button>';
    }
    ?>
        </div>
    </div>

</div>

<div class="col-lg-12 col-sm-12" id="logosinfo" style="background-color:#000 !important">
                <?php $__currentLoopData = $sponsors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sponsor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!-- <div class="col-lg-4 col-sm-12 logos"> -->
                        <?php $image=preg_replace('([^A-Za-z0-9 ])', '', $sponsor->logo)?>
                        <a style="display:inline !important"><img class="logo" src="../../resources/img/<?php echo strtolower($image) ?>.png" alt=""></a>
                    <!-- </div> -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bikerollSalma\resources\views/infoRace.blade.php ENDPATH**/ ?>