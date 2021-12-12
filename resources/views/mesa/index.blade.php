@extends('layouts.app')

@section('tittle')
Mesa
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <strong>Tabla de Mesas</strong>
    </div>
    <div class="card-body">
        <div>
            <a style="position: relative; left: 90%;" href="/mesa/crear" class="btn btn-success">Crear Mesa</a>
        </div>
        <table id="tbl_mesas" class="table table-bordered" style="width: 100%;">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre Mesa</th>
                    <th>Numero de Asientos</th>
                    <th>Imagen de la Mesa</th>
                    <th>Fecha Creacion</th>
                    <th>Editar</th>
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
    $('#tbl_mesas').DataTable({
        language: spanish,
        processing: true,
        serverSide: true,
        ajax: '/mesa/listar',
        columns: [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'nombre_mesa',
                name: 'nombre_mesa'
            },
            {
                data: 'numero_asientos',
                name: 'numero_asientos'
            },
            {
                data: 'imagen_mesa',
                name: 'imagen_mesa',
                orderable: false,
                searchable: false
            },
            {
                data: 'created_at',
                name: 'created_at'
            },
            {
                data: 'editar',
                name: 'editar',
                orderable: false,
                searchable: false
            },
            {
                data: 'cambiarE',
                name: 'cambiarE',
                orderable: false,
                searchable: false
            }
        ]
    });
</script>
@endsection