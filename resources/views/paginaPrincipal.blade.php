@extends('layouts.layout')
{{-- Para escribir el contenido de la pagina, hay que hacer una section con mismo nombre del yield en el archivo layout.balde.php  --}}
@section('content')
<div id="portada">
    <img class="portada" src="../resources/img/portada1.png">
    <h1 class="titulo">BIKEROLL</h1>
    <!-- <button type="button" class="btn btn-primary portadabutton">Carreras</button>
    <button type="button" class="btn btn-primary portadabutton">Sponsors</button> -->
</div>
<div >
<div class="container">
    <div class="divCarreras">
        <h1>Página principal</h1>

 
        <div class="row">
            <?php $limit=0; ?>
            @foreach($races as $race)
                <?php
                if ($limit!=4){
                    $id = $race['id'];

                    //control de fechas ESTO SÍ QUE FUNCIONA
                    $fecha_actual = strtotime(date("d-m-Y H:i:00",time()));
                    $newDate = strtotime($race['date']); 

                if ($newDate>$fecha_actual){
                ?>
                <div class="col-lg-3">
                    <?php $prom=preg_replace('([^A-Za-z0-9 ])', '', $race['promotion'])?>
                    <img class="carrerasproximas" src="../resources/img/<?php echo strtolower($prom) ?>.jpg" alt="">
                    <h2>{{$race['title']}}</h2>
                    <p>{{$race['description']}}</p>
                    <p>{{$race['date']}}</p>
                    <a href="infoRace/{{$id}}"><div class="info but"><p>Más información</p></div></a>
                </div>
                <?php 
                $limit++;
                }
                }
                ?>
            @endforeach
        </div>
    </div>

    <div class="divSponsors">
        <h1>Sponsors</h1>
        </div class="sponsors">
            @foreach($sponsors as $sponsor)
                <?php
                    $id = $sponsor['id'];
                ?>
                <div>
                    <?php $image=preg_replace('([^A-Za-z0-9 ])', '', $sponsor['logo'])?>
                    <a href="#"><img class="logo" src="../resources/img/<?php echo strtolower($image) ?>.png" alt=""></a>
                </div>
            @endforeach
        <div>
    </div>
    
    <!-- Finalizadas -->
    <div class="row">
            <h1>Carreras Recientes</h1>
            <?php $cont=0; ?>
            @foreach($fin as $f)
                <?php
                if($cont!=2){
                    $id = $f['id'];

                    $fecha_actual = strtotime(date("d-m-Y H:i:00",time()));
                    $newDate = strtotime($f['date']); 

                    $hoy=now();
                    $carrera=$f->date;
                    $intervalo = $hoy->diff($carrera);

                    //Cogemos las carreras del ultimo mes con limite de 2, lo cogemos por descendente por lo tanto siempre saldrá la mas cercana primero
                    if ($newDate<$fecha_actual && $intervalo->m<=3){
                ?>
                <div class="col-lg-6">
                    <?php $prom=preg_replace('([^A-Za-z0-9 ])', '', $f['promotion'])?>
                    <img class="carrerasproximas"  src="../resources/img/<?php echo strtolower($prom) ?>.jpg" alt="">
                    <h2>{{$f['title']}}</h2>
                    <p>{{$f['description']}}</p>
                    <p>{{$f['date']}}</p>
                    <a href="infoRace/{{$id}}"><div class="info but"><p>Más información</p></div></a>
                </div>
                    <?php 
                //Limit 2
                $cont++;
                } 
            }?>
            @endforeach
        </div>
    </div>
</div>
@endsection