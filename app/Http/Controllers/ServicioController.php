<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;
use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;

class ServicioController extends Controller
{
    public function index()
    {
        $servicios = Servicio::all();
        return view('client.home', compact('servicios'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('provider.create_service', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|integer',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $servicio = new Servicio();
        $servicio->usuario_id = Auth::id();
        $servicio->categoria_id = $request->categoria_id;
        $servicio->titulo = $request->titulo;
        $servicio->descripcion = $request->descripcion;
        $servicio->precio = $request->precio;
        $servicio->save();

        return redirect()->route('servicios.index');
    }

    public function show($id)
    {
        $servicio = Servicio::findOrFail($id);
        return view('client.service_details', compact('servicio'));
    }

    public function edit($id)
    {
        $servicio = Servicio::findOrFail($id);
        $categorias = Categoria::all();
        return view('provider.edit_service', compact('servicio', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|integer',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $servicio = Servicio::findOrFail($id);
        $servicio->categoria_id = $request->categoria_id;
        $servicio->titulo = $request->titulo;
        $servicio->descripcion = $request->descripcion;
        $servicio->precio = $request->precio;
        $servicio->save();

        return redirect()->route('servicios.index');
    }

    public function destroy($id)
    {
        $servicio = Servicio::findOrFail($id);
        $servicio->delete();

        return redirect()->route('servicios.index');
    }
}
