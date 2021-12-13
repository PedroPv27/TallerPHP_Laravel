@extends('layouts.app')

@section('tittle')
Crear - Clientes
@endsection

@section('content')
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
                        <input type="text" class="form-control" name="documento_cliente" value="{{old('documento_cliente')}}">
                        @error('documento_cliente')
                        <small>*{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group" action="">
                        <label for="">Nombres del Cliente</label>
                        <input type="text" class="form-control" name="nombres_cliente" value="{{old('nombres_cliente')}}">
                        @error('nombres_cliente')
                        <small>*{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group" action="">
                        <label for="">Dirección del Cliente</label>
                        <input type="text" class="form-control" name="direccion_cliente" value="{{old('direccion_cliente')}}">
                        @error('direccion_cliente')
                        <small>*{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group" action="">
                        <label for="">Teléfono del Cliente</label>
                        <input type="text" class="form-control" name="telefono_cliente" value="{{old('telefono_cliente')}}">
                        @error('telefono_cliente')
                        <small>*{{$message}}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success float-right">Guardar</button>
        </form>
    </div>
</div>
@endsection