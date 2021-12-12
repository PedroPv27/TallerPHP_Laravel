@extends('layouts.app')

@section('tittle')
Crear - Mesas
@endsection

@section('content')
@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="card">
    <div class="card-header">
        <strong>Formulario para crear Mesas</strong>
    </div>
    <div class="card-body">
        <!-- enctype="multipart/form-data">  = es un comando para poder mandar las clases-->
        <form action="/mesa/guardar" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group" action="">
                        <label for="">Nombre Mesa:</label>
                        <input type="text" class="form-control" name="nombreMesa">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group" action="">
                        <label for="">Numero de Asientos:</label>
                        <input type="number" class="form-control" name="numAsientos">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group" action="">
                        <label for="">Imagen Mesa:</label>
                        <input type="file" class="form-control" name="imgMesa">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success float-right">Guardar</button>
        </form>
    </div>
</div>
@endsection