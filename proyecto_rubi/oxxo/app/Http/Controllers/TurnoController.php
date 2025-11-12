<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turno;

class TurnoController extends Controller
{
    public function index()
    {
        $turnos = Turno::all();
        return view('turnos.index', compact('turnos'));
    }

    public function create()
    {
        return view('turnos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'duracion_horas' => 'required|numeric',
        ]);

        Turno::create($request->only(['nombre', 'hora_inicio', 'hora_fin', 'duracion_horas']));

        return redirect()->route('turnos.index')->with('success', 'Turno creado correctamente.');
    }

    public function show(Turno $turno)
    {
        return view('turnos.show', compact('turno'));
    }

    public function edit(Turno $turno)
    {
        return view('turnos.edit', compact('turno'));
    }

    public function update(Request $request, $id_turno)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'duracion_horas' => 'required|numeric',
        ]);

        // Buscar el turno por su ID personalizado
        $turno = Turno::findOrFail($id_turno);

        // Actualizar los campos
        $turno->update($request->only(['nombre', 'hora_inicio', 'hora_fin', 'duracion_horas']));

        return redirect()->route('turnos.index')->with('success', 'Turno actualizado correctamente.');
    }

    public function destroy(Turno $turno)
    {
        $turno->delete();
        return redirect()->route('turnos.index')->with('success', 'Turno eliminado correctamente.');
    }
}
