@extends('layouts.layout')
{{-- Para escribir el contenido de la pagina, hay que hacer una section con mismo nombre del yield en el archivo layout.balde.php  --}}
@section('content')
    <div class="divCarreras">
        <h1>Página principal</h1>

 
        <div class="row">
            @foreach($races as $race)
                <?php
                    $id = $race['id'];
                ?>
                <div class="col">
                    <?php $prom=preg_replace('([^A-Za-z0-9 ])', '', $race['promotion'])?>
                    <img style="width:200px" src="../resources/img/<?php echo strtolower($prom) ?>.jpg" alt="">
                    <h2>{{$race['title']}}</h2>
                    <p>{{$race['description']}}</p>
                    <p>{{$race['date']}}</p>
                    <a href="infoRace/{{$id}}"><div class="info"><p>Más información</p></div></a>
                </div>
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
    

@endsection