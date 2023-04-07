@extends('layouts.layout')
@section('content')
<h1>Información carrera</h1>

<div class="row">
    {{-- info carrera --}}
    <div class="col-lg-8">
        <p>Mapa</p>
        <div class="racemap"><?php echo $races['image']?></div>
    </div>

    <div class="col-lg-4">
        <div>
            <h3>{{$races['title']}}</h3>
        </div>
        <div>
            <p>Descripción : {{$races['description']}}</p>
        </div>  
        <div>
            <p>Desnivel : {{$races['unevenness']}} km</p>
        </div>
        <div>
            <p>Numero participantes : {{$races['number_participants']}}</p>
        </div>
        <div>
            <p>Kilometros : {{$races['km']}} km</p>
        </div>
        <div>
            <p>Fecha y hora de salida  : {{$races['date']}}</p>
        </div>
        <div>
            <p>Punto de salida : {{$races['start']}}</p>
        </div>
        <div>
            <p>Precio : Desde {{$races['price']}}€</p>
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

if ($intervalo->m<1 && $intervalo->d<30 && $newDate>$fecha_actual){ ?>

<h3><a href="{{ url('/altaCorredor/'.$id) }}">Darse de alta</a></h3>

<?php } 

else{
    echo '<button type="button" class="btn btn-primary">FINALIZADA</button>';
    echo '<h3> <a class="btn btn-primary" href="#" role="button">Ver fotografias</a> </h3>';
}
?>
    </div>
</div>


<div>
    <a href="{{url('/')}}">Pagina principal</a>
</div>
@endsection
