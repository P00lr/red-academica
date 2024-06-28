<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExamenRequest;
use App\Models\Examen;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Http\Request;

class ExamenController extends Controller
{
    public function index()
    {
        $examens = Examen::all();
        return view('examens.index', compact('examens'));
    }

    public function create()
    {
        return view('examens.create');
    }

    public function store(StoreExamenRequest $request)
    {

        $filePath = $request->file('file')->store('uploads', 'public');

        Examen::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'file_path' => $filePath,
        ]);

        return redirect()->route('examens.index')->with('success', 'Examen creado correctamente.');
    }

    public function show($id)
    {
        $examen = Examen::findOrFail($id);
        return view('examens.show', compact('examen'));
    }

    public function edit($id)
    {
        $examen = Examen::findOrFail($id);
        return view('examens.edit', compact('examen'));
    }

    public function update(Request $request, $id)
    {
        $examen = Examen::findOrFail($id);
        $data = $request->only(['titulo', 'descripcion']);

        if ($request->hasFile('file')) {
            Storage::disk('public')->delete($examen->file_path);
            $data['file_path'] = $request->file('file')->store('uploads', 'public');
        }

        $examen->update($data);

        return redirect()->route('examens.index')->with('success', 'Examen actualizado correctamente.');
    }

    public function destroy($id)
    {
        $examen = Examen::findOrFail($id);
        Storage::disk('public')->delete($examen->file_path);
        $examen->delete();

        return redirect()->route('examens.index')->with('success', 'Examen eliminado correctamente.');
    }
}
