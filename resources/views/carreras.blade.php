@extends('layouts.layout')
{{-- Para escribir el contenido de la pagina, hay que hacer una section con mismo nombre del yield en el archivo layout.balde.php  --}}
@section('content')

<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="http://localhost/bikerollSalma/resources/pics/race3.jpg" class="d-block w-100" alt="Imagen 1">
            </div>
            <div class="carousel-item">
                <img src="http://localhost/bikerollSalma/resources/pics/race2.jpg" class="d-block w-100" alt="Imagen 2">
            </div>
            <div class="carousel-item">
                <img src="http://localhost/bikerollSalma/resources/pics/race1.jpg" class="d-block w-100" alt="Imagen 3">
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>

<div style="background-color:#">

<div class="container">
        <form action="theraces" method="post">
            @csrf
            <div class="input-group col-lg-12" style="padding:20px 0 20px;">
                
                    <input type="text" name="buscador" class="form-control col-lg-12" placeholder="Búsqueda..." aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                        <input type="submit" value="Buscar" name="buscButton" class="btn btn-outline-secondary" type="button">
                        </div>
            </div>
        </form>

       
            <div class="divCarreras">
                <h1>Próximas Carreras</h1>

        
                <div class="row">
                    <?php $limit=0; ?>
                    @foreach($races as $race)
                        <?php
                        if ($limit!=12){
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
        </div>
</div>
<div style="background-color:#">
        <!-- Fotos -->
        <div class="container">
            <!-- Finalizadas -->
            <div class="row">
                    <h1>Últimas carreras finalizadas</h1>
                    <?php $cont=0; ?>
                    @foreach($fin as $f)
                        <?php
                        if($cont<4){
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