@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Editar nota</span>
                    <a href="/notas" class="btn btn-primary btn-sm">Volver a lista de notas...</a>
                </div>
                <div class="card-body"> 
                @if(session('actualizado'))
                <div class="alert alert-success">{{ session('actualizado') }}</div>
                @endif    
                <form action="/notas/{{$notas -> id}}" method="POST">
                    @method('PUT')
                    @csrf
                    <h1>Detalle de nota {{$notas -> id}}</h1>  
                    <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2" value="{{ $notas -> nombre}}">
                    <input type="text" name="descripcion" placeholder="Descripcion" class="form-control mb-2" value="{{ $notas -> descripcion}}">
                    <button class="btn btn-primary btn-block" type="submit">Actualizar</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection