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
                        <th scope="col"></th>
                        <th scope="col">Posicion</th>
                        <th scope="col">Puntos</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        </tr>
                    </thead>
                    <tbody class="clasifications">
                        <?php $cont=0; ?>
                        @foreach($runners as $f)
                        <?php
                        if($cont<10){ ?>
                            <tr>
                                @if ($cont==0)
                                <td><img src="../resources/img/copa-de-oro.png" class="copas"></td>
                                @elseif ($cont==1)
                                <td><img src="../resources/img/copa-de-plata.png" class="copas"></td>
                                @elseif($cont==2)
                                <td><img src="../resources/img/copa-de-bronce.png" class="copas"></td>
                                @else
                                <td><img src="../resources/img/medalla.png" class="medalla"></td>
                                @endif

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