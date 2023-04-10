@extends('layouts.layout')
{{-- Para escribir el contenido de la pagina, hay que hacer una section con mismo nombre del yield en el archivo layout.balde.php  --}}
@section('content')

<div class="air container">
            <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 style="display:inline">Clasificaciones Bikeroll</h1>
                        </div>
                    </div>
            </div>
            <hr>
                    <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Posicion</th>
                        <th scope="col">Puntos</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $cont=0; ?>
                        @foreach($runners as $f)
                        <?php
                        if($cont<10){ ?>
                            <tr>
                            <th scope="row"><?php echo $cont+1; ?></th>
                            <td>{{$f['points']}}</td>
                            <td>{{$f['name']}}</td>
                            <td>{{$f['last_name']}}</td>
                        <?php 
                        //Limit 10
                        $cont++;
                        } 
                        ?>
                        @endforeach
                    </tbody>
                    </table>
            

</div>


@endsection