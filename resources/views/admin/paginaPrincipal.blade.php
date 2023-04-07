@extends('layouts.layout')
@section('content')
    <main>
        <h1>BIKE ROLL</h1>
        {{-- <div class="ff" style="border:1px solid;width:20%;margin:auto;">
            <div id="div1" style="border:1px solid;width:100%;text-align:center">
                <h3>Gestionar carreras</a></h3>
                <p><a href="{{url('anyadirCarrera')}}">Añadir carrera</a></p>
                <p><a href="{{url('editarCarrera')}}">Info carreras</a></p>
            </div>
            
            <div style="border:1px solid;width:100%;text-align:center">
                <h3>Gestionar aseguradoras</h3>
                <p><a href="{{url('mostrarTodosAs')}}">Mostrar todos</a></p>
                <p><a href="{{url('anyadirAseguradora')}}">Añadir aseguradora</a></p>
            </div>
            
            <div style="border:1px solid;width:100%;text-align:center">
                <h3>Gestionar sponsors</h3>
                <p><a href="{{url('mostrarSponsors')}}">Mostrar todos</a></p>
                <p><a href="{{url('anyadirSponsor')}}">Añadir sponsor</a></p>
            </div>
    
            <div style="border:1px solid;width:100%;text-align:center">
                <h3>Corredores apuntados</h3>
                <p><a href="{{url('verCorredores')}}">Ver corredores apuntados</a></p>
            </div> --}}
    
        </div>
        <h3><a href="{{url('logout')}}">Cerrar sesión</a></h3>
    </main>
    <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          <div class="col">
            <div class="card shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Gestionar carreras</text></svg>
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a class="btn btn-sm btn-outline-secondary" href="{{url('editarCarrera')}}">Ver todas</a>
                    <a class="btn btn-sm btn-outline-secondary" href="{{url('anyadirCarrera')}}">Añadir</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col">
            <div class="card shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Gestionar aseguradoras</text></svg>
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a class="btn btn-sm btn-outline-secondary" href="{{url('mostrarTodosAs')}}">Ver todas</a>
                    <a class="btn btn-sm btn-outline-secondary" href="{{url('anyadirAseguradora')}}">Añadir</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Gestionar sponsors</text></svg>
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a class="btn btn-sm btn-outline-secondary" href="{{url('mostrarSponsors')}}">Ver todos</a>
                    <a class="btn btn-sm btn-outline-secondary" href="{{url('anyadirSponsor')}}">Añadir</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
<!-- 
          <div class="col">
          </div>

          <div class="col">
            <div class="card shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Gestionar inscripciones</text></svg>
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a class="btn btn-sm btn-outline-secondary" href="{{url('verCorredores')}}">Ver corredores apuntados</a>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
        </div>
      </div>
@endsection
