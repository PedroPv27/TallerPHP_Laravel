<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mesa;
use Yajra\DataTables\DataTables;

class MesaController extends Controller
{
    public function index()
    {
        return view("Mesa.index");
    }

    //LISTAR
    public function listar(Request $request)
    {
        $mesas = Mesa::all();

        return Datatables::of($mesas)
            ->editColumn("imagen_mesa", function ($mesa) {
                if ($mesa->imagen_mesa == null) {
                    return 'Sin imagen <i class="fas fa-image"></i>';
                } else {
                    return "<img src='uploads/" . $mesa->imagen_mesa . "' width= '80px' > ";
                }
            })
            ->addColumn('editar', function ($mesa) {
                return '<a class="btn btn-primary" href="/mesa/editar/' . $mesa->id . '">Editar</a>';
            })
            ->addColumn('cambiarE', function ($mesa) {
                if ($mesa->estado == 1) {
                    return '<a class="btn btn-danger" href="/mesa/cambiar/estado/' . $mesa->id . '/0">Inactivo</a>';
                } else {
                    return '<a class="btn btn-success" href="/mesa/cambiar/estado/' . $mesa->id . '/1">Activo</a>';
                }
            })
            ->rawColumns(['editar', 'cambiarE', 'imagen_mesa'])
            ->make(true);
    }

    // 1 - Crear Mesas
    public function create()
    {
        return view("mesa.crear");
    }

    public function save(Request $request)
    {
        $input = request()->except('_token');
        //$input = request()->all();

        $campos = [
            'nombre_mesa' => 'required',
            'numero_asientos' => 'required',
        ];

        $mensaje = [
            'required' => 'El :attribute es requerido.',
            'fechaFin.required' => 'La :attribute es requerida.'
        ];

        $this->validate($request, $campos, $mensaje);

        try {

            //validar imagen
            $imagen = null;
            if ($request->imgMesa != null) {
                $imagen = $input["nombreMesa"] . '.' . time() . '.' . $request->imgMesa->extension();

                $request->imgMesa->move(public_path('uploads'), $imagen);
            }

            Mesa::create([
                "nombre_mesa" => $input["nombreMesa"],
                "numero_asientos" => $input["numAsientos"],
                "imagen_mesa" => $imagen,
                "estado" => 0,
            ]);

            return redirect("/mesa");
        } catch (\Exception $e) {
            //Error con libreria Flash
            //Flash::error($e->getMessage());

            return redirect("/mesa/crear");
        }
    }

    //2 - Editar Mesas
    public function edit($id)
    {
        $mesa = Mesa::find($id);

        if ($mesa == null) {
            // Flash::error("Cliente no encontrado");
            return redirect("/mesa");
        }

        return view("mesa.editar", compact("mesa"));
    }

    public function update(Request $request)
    {
        $input = request()->except('_token');
        //$input = request()->all();

        try {
            $mesa = Mesa::find($input["id"]);

            if ($mesa == null) {
                // Flash::error("Cliente no encontrado");
                return redirect("/mesa");
            }

            //validar imagen
            $imagen = null;
            if ($request->imgMesa != null) {
                $imagen = $input["nombreMesa"] . '.' . time() . '.' . $request->imgMesa->extension();

                $request->imgMesa->move(public_path('uploads'), $imagen);
            }

            $mesa->update([
                "nombre_mesa" => $input["nombreMesa"],
                "numero_asientos" => $input["numAsientos"],
                "imagen_mesa" => $imagen,
            ]);

            return redirect("/mesa");
        } catch (\Exception $e) {


            return redirect("/mesa");
        }
    }

    //cambiar estado del Cliente
    public function updateState($id, $estado)
    {

        $mesa = Mesa::find($id);

        if ($mesa == null) {
            return redirect("/mesa");
        }

        try {
            $mesa->update(["estado" => $estado]);

            return redirect("/mesa");
        } catch (\Exception $e) {

            return redirect("/mesa");
        }
    }
}
