@extends('layouts.layout')

@section('content')
    @if(session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
  <h1 class="hhh">Iniciar sesión como administrador</h1>
  <form action="formAdmin" method="POST" accept-charset="UTF-8">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Usuario</label>
      <input type="text" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nombre de usuario">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Contraseña</label>
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="passwd">
    </div>
    <button type="submit" class="btn btn-primary" name="send">Iniciar sesión</button>
  </form>

@endsection