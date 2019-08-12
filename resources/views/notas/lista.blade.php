@extends('layouts.app')

@section('content')
<div class="row">
     <div class="col-md-9">
     
     </div>
      <div class="col-md-3">
         <div style="position:fixed;left:0.1%;"> 
         <div class="">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <ul class= "nav nv-pills flex-column">
                    <li class= "nav-item">Registrar Cliente</li>
                    <li class= "nav-item">Editar Cliente</li>
                    <li class= "nav-item">Modificar cliente</li>
                    </ul>
                 </div>
          </div>          
         
        </div>  
     </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Lista de Notas para {{auth()->user()->name}}</span>
                    @if(auth()->user()->name == "Usuario1")
                     <a href="/notas/create" class="btn btn-primary btn-sm">Nueva Nota</a>
                    @endif
                </div>

                <div class="card-body">      
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(session('actualizado'))
                            <div class="alert alert-success">{{ session('actualizado') }}</div>
                        @endif
                            @foreach ($notas as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->nombre }}</td>
                                <td>{{ $item->descripcion }}</td>
                                <td><a href="/notas/{{$item ->id}}/edit" class="btn btn-warning btn-sm">Editar</a>
                               
                                    <form action="/notas/{{$item -> id}}" class="d-inline" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$notas->links()}}
                {{-- fin card body --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 