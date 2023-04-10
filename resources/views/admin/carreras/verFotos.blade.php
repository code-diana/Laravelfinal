@extends('layouts.layout')
@section('content')
<!-- <style>
   div{display:inline;}
   img{
    width:10%;
    height:10%;
   }
   a{display:block;}
</style> -->
<div class="container air">
        <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                            <h1 style="display:inline">{{$carreras['title']}}</h1>
                            <a href="{{url('/editarCarrera')}}" class="btn btn-primary float-right" style="margin-top: 10px;">Volver atrás</a>
                    </div>
                </div>
        </div>
        <hr>
        
    <div class="col-lg-12">
    @foreach($fotos as $foto)
        <!-- <div class="col-lg-4"> -->
        <?php $image=preg_replace('([^A-Za-z0-9 ])', '', $foto['image'])?>
        <img src="../../resources/img/<?php echo strtolower($image) ?>.jpg" alt="" style="width:200px;height:100px">
        <!-- </div> -->
       
    @endforeach
    </div>
</div>
@endsection