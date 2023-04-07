@extends('layouts.layout')
{{-- Para escribir el contenido de la pagina, hay que hacer una section con mismo nombre del yield en el archivo layout.balde.php  --}}
@section('content')
<!-- <h1>QR's de la carrera {{$races['id']}}: {{$races['title']}}</h1> -->

@foreach ($runners as $runner)
    {!! QrCode::size(300)->generate($runner->name." ".$runner->last_name." ".$runner->dorsal) !!};
@endforeach

@endsection