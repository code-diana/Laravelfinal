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
<a href="{{url('/editarCarrera')}}">Volver atras</a>
@endsection