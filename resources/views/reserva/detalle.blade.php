@extends('layouts.app')

@section('tittle')
Reserva
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <strong>Detalle de Reserva</strong>
    </div>
    <div class="card-body">
        <table class="table table-bordered text-center" id="detalle">
            <thead>
                <tr>
                    <th>Número Reserva</th>
                    <th>Nombre del Cliente</th>
                    <th>Documento del Cliente</th>
                    <th>Telefono Cliente</th>
                    <th>Número Mesa</th>
                    <th>Número Asientos</th>
                    <th>Aprobación Reserva</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $reserva->id }}</td>
                    <td>{{ $reserva->nombres }}</td>
                    <td>{{ $reserva->documento }}</td>
                    <td>{{ $reserva->telefono }}</td>
                    <td>{{ $reserva->nombre_mesa }}</td>
                    <td>{{ $reserva->numero_asientos }}</td>
                    <td>
                        @if($reserva->estado_aprobacion == 1)
                        <button class="btn btn-danger">En espera</button>
                        @else
                        <button class="btn btn-success">Aprobado</button>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection