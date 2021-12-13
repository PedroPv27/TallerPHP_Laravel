<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Cliente;
use App\Models\Mesa;
use GrahamCampbell\ResultType\Result;
use Yajra\DataTables\DataTables;

class ReservaController extends Controller
{
    public function index()
    {
        return view("Reserva.index");
    }

    //LISTAR
    public function listar(Request $request)
    {
        $reservas = Reserva::select("reservas.*", "clientes.nombres as nombre", "mesas.nombre_mesa")
            ->join("clientes", "reservas.cliente_id", "=", "clientes.id")
            ->join("mesas", "reservas.mesa_id", "=", "mesas.id")
            ->get();

        return Datatables::of($reservas)
            ->addColumn('editar', function ($reserva) {
                return '<a class="btn btn-primary" href="/reserva/editar/' . $reserva->id . '">Editar</a>';
            })
            ->addColumn('cambiarE', function ($reserva) {
                if ($reserva->estado == 1) {
                    return '<a class="btn btn-danger" href="/reserva/cambiar/estado/' . $reserva->id . '/0">Desactivar</a>';
                } else {
                    return '<a class="btn btn-success" href="/reserva/cambiar/estado/' . $reserva->id . '/1">Activar</a>';
                }
            })
            ->addColumn('cambiar_estadoAprobacion', function ($reserva) {
                if ($reserva->estado_aprobacion == 1) {
                    return '<a class="btn btn-danger" href="/reserva/cambiar/estadoAprobacion/' . $reserva->id . '/0">En espera</a>';
                } else {
                    return '<a class="btn btn-success" href="/reserva/cambiar/estadoAprobacion/' . $reserva->id . '/1">Aprobada</a>';
                }
            })
            ->addColumn('detalle_reserva', function ($reserva) {
                return '<a class="btn btn-warning" href="/reserva/detalle/' . $reserva->id . '"><i class="far fa-eye"></i></a>';
            })
            ->rawColumns(['editar', 'cambiar_estadoAprobacion', 'cambiarE', 'detalle_reserva'])
            ->make(true);
    }

    // 1 - Crear Reserva
    public function create()
    {
        $clientes = Cliente::where("estado", "=", 1)
            ->get();
        $mesas = Mesa::where("estado", "=", 1)
            ->get();
        return view('reserva.crear', compact('clientes', 'mesas'));
    }

    public function save(Request $request)
    {
        //Validacion
        $request->validate([
            'cliente_id' => "required",
            'mesa_id' => "required",
            'fechaFin_reserva' => "required",
        ]);

        $input = request()->except('_token');
        //$input = request()->all();

        try {
            Reserva::create([
                "cliente_id" => $input["cliente_id"],
                "mesa_id" => $input["mesa_id"],
                "fechaFin" => $input["fechaFin_reserva"],
                "estado_aprobacion" => 0,
                "estado" => 0,
            ]);

            return redirect("/reserva");
        } catch (\Exception $e) {
            //Error con libreria Flash
            //Flash::error($e->getMessage());

            return redirect("/reserva/crear");
        }
    }

    //2 - Editar Reserva
    public function edit($id)
    {
        $clientes = Cliente::all();
        $mesas = Mesa::all();
        $reserva = Reserva::select("reservas.*", "clientes.nombres as nombre", "mesas.nombre_mesa as mesa")
            ->join("clientes", "reservas.cliente_id", "=", "clientes.id")
            ->join("mesas", "reservas.mesa_id", "=", "mesas.id")
            ->where("reservas.id", "=", $id)
            ->get();

        if ($reserva == null) {
            // Flash::error("Cliente no encontrado");
            return redirect("/reserva");
        }
        return view("reserva.editar", compact("reserva", 'clientes', 'mesas'));
    }
    public function update(Request $request)
    {

        $input = request()->except('_token');

        // print_r($input);

        try {
            $reserva = Reserva::find($input["id"]);

            if ($reserva == null) {
                // Flash::error("Cliente no encontrado");
                return redirect("/reserva");
            }

            $reserva->update([
                "cliente_id" => $input["cliente_id"],
                "mesa_id" => $input["mesa_id"],
                "fechaFin" => $input["fechaFin_reserva"],
            ]);

            return redirect("/reserva");
        } catch (\Exception $e) {


            return redirect("/reserva");
        }
    }

    //cambiar estado de la reserva
    public function updateState($id, $estado)
    {

        $reserva = Reserva::find($id);

        if ($reserva == null) {
            return redirect("/reserva");
        }

        try {
            $reserva->update(["estado" => $estado]);

            return redirect("/reserva");
        } catch (\Exception $e) {

            return redirect("/reserva");
        }
    }

    //cambiar estado de aprobacion reserva
    public function updateState_estadoAprobacion($id, $estadoAprobacion)
    {

        $reserva = Reserva::find($id);

        if ($reserva == null) {
            return redirect("/reserva");
        }

        try {
            $reserva->update(["estado_aprobacion" => $estadoAprobacion]);

            return redirect("/reserva");
        } catch (\Exception $e) {

            return redirect("/reserva");
        }
    }

    public function show($id)
    {
        $reserva = Reserva::select("reservas.*", "clientes.nombres", "clientes.documento", "clientes.telefono", "mesas.nombre_mesa", "mesas.numero_asientos")
            ->join("clientes", "reservas.cliente_id", "=", "clientes.id")
            ->join("mesas", "reservas.mesa_id", "=", "mesas.id")
            ->where("reservas.id", "=", $id)
            ->get();

        foreach ($reserva as $value) {
            $reserva = $value;
        }

        return view('reserva.detalle', compact('reserva'));
    }
}
