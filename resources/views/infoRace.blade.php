@extends('layouts.layout')
@section('content')
<div class="container air">
        <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                            <h1 style="display:inline">{{$races['title']}}</h1>
                    </div>
                </div>
        </div>
                    <hr>

    <div class="row" id="containerinfo" >
        {{-- info carrera --}}
        <div class="col-lg-8">
            <p><strong>Ruta de la carrera</strong></p>
            <div class="racemap"><?php echo $races['image']?></div>
        </div>

        <div class="col-lg-4">
            <div style="color:#f0f4fa">I</div>

            <div>
                <p>{{$races['description']}}</p>
            </div>  
            <div>
                <p><strong>Desnivel :</strong> {{$races['unevenness']}} km</p>
            </div>
            <div>
                <p><strong>Numero participantes :</strong> {{$races['number_participants']}}</p>
            </div>
            <div>
                <p><strong>Distancia :</strong> {{$races['km']}} km</p>
            </div>
            <div>
                <p><strong>Fecha y hora de salida  :</strong> {{$races['date']}}</p>
            </div>
            <div>
                <p><strong>Punto de salida :</strong> {{$races['start']}}</p>
            </div>
            <div>
                <p><strong>Precio :</strong> Desde {{$races['price']}}€</p>
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

    <button type="button" class="btn btn-primary inscribir"><a href="{{ url('/altaCorredor/'.$id) }}">Darse de alta</a></button>

    <?php } 

    //finalizadas
    else if($newDate<$fecha_actual){
        echo '<button type="button" class="btn btn-primary finalizada">FINALIZADA</button>';
        echo '<h3> <a class="btn btn-primary" href="#" role="button">Ver fotografias</a> </h3>';
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
                @foreach($sponsors as $sponsor)
                    <!-- <div class="col-lg-4 col-sm-12 logos"> -->
                        <?php $image=preg_replace('([^A-Za-z0-9 ])', '', $sponsor->logo)?>
                        <a href="#" style="display:inline !important"><img class="logo" src="../../resources/img/<?php echo strtolower($image) ?>.png" alt=""></a>
                    <!-- </div> -->
                @endforeach
            
</div>
@endsection

