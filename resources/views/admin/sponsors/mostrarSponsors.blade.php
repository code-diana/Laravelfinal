@extends('layouts.layout')
{{-- Para mostrar la alerta con el mensaje --}}
@if (session('mensaje'))
    <script>
        alert('{{ session('mensaje') }}');
    </script>
@endif
{{-- -------------------------------------- --}}
@section('content')
    <a href="{{url('/paginaPrincipal')}}">Pagina principal</a>

    <div class="container">
        <h1 style="margin-top: 30px;">Sponsors</h1>
        <hr>
        <div class="container mt-3">
            <div class="row">
                <div class="col-lg-12">
                    <a href="{{url('anyadirSponsor')}}" class="btn btn-primary float-right mr-3" style="margin-top: 30px;">+ Nuevo Sponsor</a>
                </div>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($sponsor as $row)
                @php
                    $id = $row['id'];
                    $logo=preg_replace('([^A-Za-z0-9 ])', '', $row['logo']);
                @endphp
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100">
                    <div class="card-header">
                        <img class="card-img-top" src="	http://localhost/bikerollSalma/resources/img/<?php echo strtolower($logo) ?>.png" alt="Card image cap">
                        <h2 class="card-title">{{ $row['name'] }}</h2>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $row['description'] }}</p>
                        <p class="card-text"><strong>Plana principal:</strong>
                            @if($row['main_plain'] == 0)
                                No
                            @else
                                Sí
                            @endif
                        </p>
                        <p class="card-text"><strong>Estado:</strong>
                            @if ($row['sponsorState'] == 0)
                                <a href="activarSponsor/{{$id}}"><img style="width:40px;height:40px" src="	http://localhost/bikerollSalma/resources/img/off.png" alt=""></a>
                            @else
                                <a href="activarSponsor/{{$id}}"><img style="width:40px;height:40px" src="	http://localhost/bikerollSalma/resources/img/on.png" alt=""></a>
                            @endif
                        </p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="editarSponsor/{{$id}}" class="btn btn-primary mx-2"><i class="bi bi-pencil-square"></i> Editar datos</a>
                            <a href="editarLogo/{{$id}}" class="btn btn-primary"><i class="bi bi-image"></i> Editar logo</a>
                            <a href="selectRaces/{{$id}}" class="btn btn-primary" style="margin-top:5px;"><i class="bi bi-check-square"></i> Seleccionar carreras</a>
                            <a href="carreras-sponsor/{{$id}}" class="btn btn-primary" style="margin-top:5px;"><i class="bi bi-calendar-event"></i> Ver carreras patrocinadas</a>
                            <a href="download-pdf/{{$id}}" class="btn btn-primary" style="width:100%;background-color:#243B66 !important;margin-top:20px;"><i class="bi bi-file-earmark-pdf"></i> Descargar factura</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
      </div>
      
@endsection