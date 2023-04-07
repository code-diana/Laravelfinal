@extends('layouts.layout')
@section('content')
<?php
    $id_race = $id;
?>
<h1>Corredores apuntados en la carrera {{$id_race}}</h1>

{{-- ------------------- Buscador ------------------------------------------- --}}
<form action="{{$id_race}}" method="post">
    @csrf
    <input type="text" name="buscador" id="busc">
    <input type="submit" value="Buscar" name="buscButton">
</form>
{{-- ------------------------------------------------------------------------- --}}

@if(count($runners)==0)
    <p>No hay ningún corredor matriculado en esta carrera</p>
@else
    <table>
        <tr>
            <th>Nombre</th>
            <th>Edad</th>
            <th>Genero</th>
            <th>Dirección</th>
            <th>Pro</th>
            <th>Numero federación</th>
            <th>Dorsal</th>
            <th>Puntos</th>
            <th>Generar QR</th>
        </tr>
        @foreach($runners as $runner)
            @php
                //Calcular la edad de la persona depende de su fecha de nacimiento
                $edad = now()->diff($runner->birth_date)->y;
            @endphp

            <tr>
                <td>{{$runner->name . ' ' . $runner->last_name}}</td>
                <td>{{$edad}}</td>
                {{-- Sexo --}}
                @if($runner->sex == 1)
                    <td>Mujer</td>
                @else
                    <td>Hombre</td>
                @endif

                <td>{{$runner->adress}}</td>
                {{-- Si es pro muestra el numero de federacion --}}
                @if($runner->pro == 1)
                    <td>Sí</td>
                    <td>{{$runner->federation_number}}</td>
                @else
                    <td>No</td>
                    <td>----</td>
                @endif
                <td>{{$runner->dorsal}}</td>
                <td>{{$runner->points}}</td>
                <?php
                    $id_runner = $runner->id;
                    //Link de la pagina en real
                    $url = route('datosQr' , ['id_runner' => $id_runner , 'id_race' => $id_race]);
                    //$url = "http://www.dianasalma-pruebas.com.mialias.net/bikeroll/public/datosQr/$id";
                    echo $url;
                ?>
                <td>{!! QrCode::size(100)->generate($url) !!}</td>

            </tr>
        @endforeach
    </table>
@endif

<a href="{{url('/paginaPrincipal')}}">Pagina principal</a>

@endsection