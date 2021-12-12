@extends('layouts.app')

@section('tittle')
Reserva
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <strong>Tabla de Reservas</strong>
    </div>
    <div class="card-body">
        <div>
            <a style="position: relative; left: 90%;" href="/reserva/crear" class="btn btn-success">Crear Reserva</a>
        </div>
        <table id="tbl_reservas" class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Cliente</th>
                    <th>Mesa</th>
                    <th>Fecha Creacion</th>
                    <th>Fecha Fin</th>
                    <th>Estado Aprobacion</th>
                    <th>Editar</th>
                    <th>Detalle</th>
                    <th>Cambiar Estado</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $('#tbl_reservas').DataTable({
        language: spanish,
        processing: true,
        serverSide: true,
        ajax: '/reserva/listar',
        columns: [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'nombre',
                name: 'nombre'
            },
            {
                data: 'nombre_mesa',
                name: 'nombre_mesa'
            },
            {
                data: 'created_at',
                name: 'created_at'
            },
            {
                data: 'fechaFin',
                name: 'fechaFin'
            },
            {
                data: 'cambiar_estadoAprobacion',
                name: 'cambiar_estadoAprobacion',
                orderable: false,
                searchable: false
            },
            {
                data: 'editar',
                name: 'editar',
                orderable: false,
                searchable: false
            },
            {
                data: 'detalle_reserva',
                name: 'detalle_reserva',
                orderable: false,
                searchable: false
            },
            {
                data: 'cambiarE',
                name: 'editarE',
                orderable: false,
                searchable: false
            }
        ]
    });
</script>
@endsection