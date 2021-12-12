@extends('layouts.app')

@section('tittle')
Clientes
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <strong>Tabla de Clientes</strong>
    </div>
    <div class="card-body">
        <div>
            <a style="position: relative; left: 90%;" href="/cliente/crear" class="btn btn-success">Crear Cliente</a>
        </div>
        <table id="tbl_clientes" class="table table-bordered" style="width: 100;">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Documento</th>
                    <th>Nombres</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Fecha Creacion</th>
                    <!-- <th>Estado</th> -->
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
    $('#tbl_clientes').DataTable({
        language: spanish,
        processing: true,
        serverSide: true,
        ajax: '/cliente/listar',
        columns: [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'documento',
                name: 'documento'
            },
            {
                data: 'nombres',
                name: 'nombres'
            },
            {
                data: 'direccion',
                name: 'direccion'
            },
            {
                data: 'telefono',
                name: 'telefono'
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