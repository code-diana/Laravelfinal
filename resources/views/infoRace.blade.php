@extends('layouts.layout')
@section('content')
<h1>Información carrera</h1>

{{-- info carrera --}}
<div>
    <p>Mapa</p>
    <a href="#"><?php echo $races['image']?></a>
</div>

<div>
    <h3>{{$races['title']}}</h3>
</div>
<div>
    <p>Descripción : {{$races['description']}}</p>
</div>  
<div>
    <p>Desnivel : {{$races['unevenness']}}</p>
</div>
<div>
    <p>Numero participantes : {{$races['number_participants']}}</p>
</div>
<div>
    <p>Kilometros : {{$races['km']}}</p>
</div>
<div>
    <p>Fecha y hora de salida  : {{$races['date']}}</p>
</div>
<div>
    <p>Punto de salida : {{$races['start']}}</p>
</div>
<div>
    <p>Precio : {{$races['price']}}</p>
</div>


<?php $id=$races['id']; 


//revisar

//ver si la fecha de la carrera es más grande que hoy
$fecha_actual = date("d-m-Y");
$newDate = date("d-m-Y", strtotime($races['date'])); 

//calcular el intervalo
$hoy=now();
$carrera=$races->date;
$intervalo = $hoy->diff($carrera);


if ($intervalo->m<=1 && $intervalo->d<=30 && $newDate>$fecha_actual){ ?>

<h3><a href="{{ url('/altaCorredor/'.$id) }}">Darse de alta</a></h3>

<?php } ?>

<div>
    <a href="{{url('/')}}">Pagina principal</a>
</div>
@endsection
