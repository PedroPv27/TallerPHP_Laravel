@extends('layouts.app')

@section('tittle')
Editar - Rerservas
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <strong>Formulario para Editar Reservas</strong>
    </div>
    <div class="card-body">
        <form action="/reserva/actualizar" method="POST">
            @csrf
            @foreach($reserva as $r)
            <input type="hidden" name="id" value="{{$r->id}}">
            @endforeach
            <div class="row">
                <div class="col-4">
                    <div class="form-group" action="">
                        <label for="">Cliente de la Reserva</label>
                        <select class="form-control" name="cliente_id">
                            @foreach($reserva as $r)
                            <option value="{{$r->cliente_id}}">{{$r->nombre}}</option>
                            @endforeach
                            @foreach($clientes as $key => $value)
                            <option value="{{$value->id}}">{{$value->nombres}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group" action="">
                        <label for="">Mesa de la Reserva</label>
                        <select class="form-control" name="mesa_id">
                            @foreach($reserva as $r)
                            <option value="{{$r->mesa_id}}">{{$r->mesa}}</option>
                            @endforeach
                            @foreach($mesas as $key => $value)
                            <option value="{{$value->id}}">{{$value->nombre_mesa}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group" action="">
                        <label for="">Fecha Fin de la Reserva</label>
                        @foreach($reserva as $r)
                        <input type="date" class="form-control" name="fechaFin_reserva" value="{{$r->fechaFin}}">
                        @endforeach
                        <!-- @error('direccion_cliente')
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