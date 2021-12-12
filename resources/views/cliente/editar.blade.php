@extends('layouts.app')

@section('tittle')
Editar - Clientes
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
        <strong>Editar el Cliente</strong>
    </div>
    <div class="card-body">
        <form action="/cliente/actualizar" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$cliente->id}}">
            <div class="row">
                <div class="col-4">
                    <div class="form-group" action="">
                        <label for="">Documento Cliente</label>
                        <input type="text" class="form-control" name="documento_cliente" value="{{$cliente->documento}}">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group" action="">
                        <label for="">Nombres del Cliente</label>
                        <input type="text" class="form-control" name="nombres_cliente" value="{{$cliente->nombres}}">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group" action="">
                        <label for="">Dirección del Cliente</label>
                        <input type="text" class="form-control" name="direccion_cliente" value="{{$cliente->direccion}}">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group" action="">
                        <label for="">Teléfono del Cliente</label>
                        <input type="text" class="form-control" name="telefono_cliente" value="{{$cliente->telefono}}">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-warning float-right">Actualizar</button>
        </form>
    </div>
</div>
@endsection