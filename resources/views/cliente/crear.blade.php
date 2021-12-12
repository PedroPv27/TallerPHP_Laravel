@extends('layouts.app')

@section('tittle')
Crear - Clientes
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
        <strong>Formulario para crear Clientes</strong>
    </div>
    <div class="card-body">
        <form action="/cliente/guardar" method="POST">
            @csrf
            <div class="row">
                <div class="col-4">
                    <div class="form-group" action="">
                        <label for="">Documento Cliente</label>
                        <input type="text" class="form-control" name="documento_cliente">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group" action="">
                        <label for="">Nombres del Cliente</label>
                        <input type="text" class="form-control" name="nombres_cliente">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group" action="">
                        <label for="">Dirección del Cliente</label>
                        <input type="text" class="form-control" name="direccion_cliente">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group" action="">
                        <label for="">Teléfono del Cliente</label>
                        <input type="text" class="form-control" name="telefono_cliente">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success float-right">Guardar</button>
        </form>
    </div>
</div>
@endsection