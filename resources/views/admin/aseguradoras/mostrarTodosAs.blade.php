@extends('layouts.layout')
{{-- Para mostrar la alerta con el mensaje --}}
@if (session('mensaje'))
    <script>
        alert('{{ session('mensaje') }}');
    </script>
@endif
{{-- -------------------------------------- --}}
@section('content')
    <div class="container air">
        <h1 style="margin-top:30px">Aseguradoras</h1>
        <hr>
        <div class="container mt-3">
            <div class="row">
                <div class="col-lg-12">
                    <a href="{{url('anyadirAseguradora')}}" class="btn btn-primary float-right mr-3" style="margin-top: 30px;">+ Nueva aseguradora</a>
                </div>
            </div>
        </div>
        
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($insurance as $row)
                @php
                    $id = $row['id'];
                @endphp
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100">
                    <div class="card-header">
                        <h5 class="card-title">{{$row['name']}}</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><strong>CIF:</strong>{{$row['CIF']}}</p>
                        <p class="card-text"><strong>Nombre:</strong> {{$row['name']}}</p>
                        <p class="card-text"><strong>Dirección:</strong> {{$row['address']}}</p>
                        <p class="card-text"><strong>Precio base:</strong> {{$row['price']}}€</p>
                        <p class="card-text"><strong>Estado:</strong>

                            @if ($row['estado'] == 0)
                                <a href="activarAseguradora/{{$id}}"><img src="../resources/img/off.png" alt="" style="width:60px;height:60px"></a>
                            @else
                                <a href="activarAseguradora/{{$id}}"><img src="../resources/img/on.png" alt="" style="width:60px;height:60px"></a>
                            @endif
                        </p>
                        {{-- <i class="bi bi-toggle-on"></i> --}}
                    </div>
                    <div class="card-footer">
                        <a href="editarAseguradora/{{$id}}" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Editar</a>
                    </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
      
@endsection