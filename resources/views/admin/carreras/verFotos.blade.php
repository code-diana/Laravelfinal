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
        
    @foreach($fotos as $foto)
    <div>
        <?php $image=preg_replace('([^A-Za-z0-9 ])', '', $foto['image'])?>
        <img src="../../resources/img/<?php echo strtolower($image) ?>.jpg" alt="">
    </div>
       
    @endforeach
</div>
<a href="{{url('/editarCarrera')}}">Volver atras</a>
@endsection