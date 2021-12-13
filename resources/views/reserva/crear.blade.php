@extends('layouts.app')

@section('tittle')
Crear - Reservas
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <strong>Formulario para crear Reservas</strong>
    </div>
    <div class="card-body">
        <form action="/reserva/guardar" method="POST">
            @csrf
            <div class="row">
                <div class="col-4">
                    <div class="form-group" action="">
                        <label for="">Cliente de la Reserva</label>
                        <select class="form-control" name="cliente_id">
                            <option value="">Seleccione el Cliente</option>
                            @foreach($clientes as $key => $value)
                            <option value="{{$value->id}}">{{$value->nombres}}</option>
                            @endforeach
                        </select>
                        @error('cliente_id')
                        <small>*{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group" action="">
                        <label for="">Mesa de la Reserva</label>
                        <select class="form-control" name="mesa_id">
                            <option value="">Seleccione la Mesa</option>
                            @foreach($mesas as $key => $value)
                            <option value="{{$value->id}}">{{$value->nombre_mesa}}</option>
                            @endforeach
                        </select>
                        @error('mesa_id')
                        <small>*{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group" action="">
                        <label for="">Fecha Fin de la Reserva</label>
                        <input type="date" class="form-control" name="fechaFin_reserva">
                        @error('fechaFin_reserva')
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