<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Servicio;
use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'cliente') {
            $reservas = Reserva::where('cliente_id', Auth::id())->get();
        } else {
            $reservas = Reserva::whereHas('servicio', function ($query) {
                $query->where('usuario_id', Auth::id());
            })->get();
        }

        return view('reservas.index', compact('reservas'));
    }

    public function create($servicio_id)
    {
        $servicio = Servicio::findOrFail($servicio_id);
        return view('client.reserve_service', compact('servicio'));
    }

    public function store(Request $request, $servicio_id)
    {
        $request->validate([
            'fecha_reserva' => 'required|date',
        ]);

        $reserva = new Reserva();
        $reserva->cliente_id = Auth::id();
        $reserva->servicio_id = $servicio_id;
        $reserva->fecha_reserva = $request->fecha_reserva;
        $reserva->estado = 'pendiente';
        $reserva->save();

        return redirect()->route('reservas.index');
    }

    public function updateEstado($id, $estado)
    {
        $reserva = Reserva::findOrFail($id);
        $reserva->estado = $estado;
        $reserva->save();

        return redirect()->route('reservas.index');
    }

    public function destroy($id)
    {
        $reserva = Reserva::findOrFail($id);
        $reserva->delete();

        return redirect()->route('reservas.index');
    }
}
