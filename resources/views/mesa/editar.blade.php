@extends('layouts.app')

@section('tittle')
Editar - Clientes
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <strong>Editar el Cliente</strong>
    </div>
    <div class="card-body">
        <!-- enctype="multipart/form-data">  = es un comando para poder mandar las clases-->
        <form action="/mesa/actualizar" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$mesa->id}}">
            <div class="row">
                <div class="col-6">
                    <div class="form-group" action="">
                        <label for="">Nombre Mesa:</label>
                        <input type="text" class="form-control" name="nombreMesa" value="{{$mesa->nombre_mesa}}">
                        @error('nombreMesa')
                        <small>*{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group" action="">
                        <label for="">Numero de Asientos:</label>
                        <input type="number" class="form-control" name="numAsientos" value="{{$mesa->numero_asientos}}">
                        @error('numAsientos')
                        <small>*{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group" action="">
                        <div class="card" style="width: 18rem; text-align:center;">
                            <div class="card-body">
                                <h5 class="card-title">Imagen de la Mesa:</h5>
                            </div>
                            @if ($mesa->imagen_mesa == null)
                            <p>Sin imagen <i class="fas fa-image"></i></p>
                            @endif
                            @if ($mesa->imagen_mesa !== null)
                            <img class="card-img-top d-block m-auto" src="/uploads/{{$mesa->imagen_mesa}}" alt="Card image cap" style="width: 150px;">
                            @endif
                            <div class="card-body">
                                <p class="card-text">Mesa del Registro.</p>
                            </div>
                        </div>
                        <label for="">Seleccione la nueva imagen de la Mesa:</label>
                        <input type="file" class="form-control" name="imgMesa">
                        <!-- @error('imgMesa')
                        <small>{{ $message }}</small>
                        @enderror -->
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-warning float-right">Actualizar</button>
        </form>
    </div>
</div>
@endsection