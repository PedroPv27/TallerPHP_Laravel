<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
use App\Models\Cliente;
use Yajra\DataTables\DataTables;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class ClienteController extends Controller
{
    public function index()
    {
        return view("cliente.index");
    }

    // LISTAR
    public function listar(Request $request)
    {
        $clientes = Cliente::all();

        return Datatables::of($clientes)
            // ->editColumn('estado', function ($cliente) {
            //     return $cliente->estado == 1 ? "Activo" : "Inactivo";
            // })
            ->addColumn('editar', function ($cliente) {
                return '<a class="btn btn-primary" href="/cliente/editar/' . $cliente->id . '">Editar</a>';
            })
            ->addColumn('cambiarE', function ($cliente) {
                if ($cliente->estado == 1) {
                    return '<a class="btn btn-danger" href="/cliente/cambiar/estado/' . $cliente->id . '/0">Inactivo</a>';
                } else {
                    return '<a class="btn btn-success" href="/cliente/cambiar/estado/' . $cliente->id . '/1">Activo</a>';
                }
            })
            ->rawColumns(['editar', 'cambiarE'])
            ->make(true);
    }

    // 1 - Crear Clientes
    public function create()
    {
        return view("cliente.crear");
    }

    public function save(Request $request)
    {
        $input = request()->except('_token');
        //$input = request()->all();
        // print_r($input);

        $campos = [
            'documento' => 'required',
            'nombres' => 'required',
            'direccion' => 'required',
            'telefono' => 'required'
        ];

        $mensaje = [
            'required' => 'El :attribute es requerido.',
            'direccion.required' => 'La :attribute es requerida.'
        ];

        $this->validate($request, $campos, $mensaje);
        try {
            Cliente::create([
                "documento" => $input["documento_cliente"],
                "nombres" => $input["nombres_cliente"],
                "direccion" => $input["direccion_cliente"],
                "telefono" => $input["telefono_cliente"],
                "estado" => 0,
            ]);

            return redirect("/cliente");
        } catch (\Exception $e) {
            //Error con libreria Flash
            //Flash::error($e->getMessage());

            return redirect("/cliente/crear");
        }
    }

    //2 - Editar Clientes
    public function edit($id)
    {
        $cliente = Cliente::find($id);

        if ($cliente == null) {
            // Flash::error("Cliente no encontrado");
            return redirect("/cliente");
        }

        return view("cliente.editar", compact("cliente"));
    }

    public function update(Request $request)
    {
        $input = request()->except('_token');
        //$input = request()->all();

        $campos = [
            'documento' => 'required',
            'nombre' => 'required',
            'direccion' => 'required',
            'telefono' => 'required'
        ];

        $mensaje = [
            'required' => 'El :attribute es requerido',
            'direccion.required' => 'La :attribute es requerida'
        ];

        try {
            $cliente = Cliente::find($input["id"]);

            if ($cliente == null) {
                return redirect("/cliente");
            }

            $cliente->update([
                "documento" => $input["documento_cliente"],
                "nombres" => $input["nombres_cliente"],
                "direccion" => $input["direccion_cliente"],
                "telefono" => $input["telefono_cliente"],
            ]);


            return redirect("/cliente");
        } catch (\Exception $e) {


            return redirect("/cliente");
        }
    }

    //cambiar estado del Cliente
    public function updateState($id, $estado)
    {

        $cliente = Cliente::find($id);

        if ($cliente == null) {
            return redirect("/cliente");
        }

        try {
            $cliente->update(["estado" => $estado]);

            return redirect("/cliente");
        } catch (\Exception $e) {

            return redirect("/cliente");
        }
    }
}
