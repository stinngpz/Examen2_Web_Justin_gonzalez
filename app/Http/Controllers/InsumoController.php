<?php

namespace App\Http\Controllers;

use App\Models\Insumo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class InsumoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $buscar = $request->input('buscar');

        $insumos = Insumo::when($buscar, function ($query, $buscar) {
            return $query->where('nombre', 'like', "%$buscar%")
                ->orWhere('codigo', 'like', "%$buscar%");
        })->latest()
        ->paginate(10)
        ->withQueryString();
        return view('insumos.index', compact('insumos', 'buscar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('insumos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos =$request->validate([
            'codigo'=> 'required|max:50|unique:insumos,codigo',
            'nombre'=> 'required|max:255',
            'categoria'=> 'required|in:Fertilizantes,Semillas Certificadas,Agroquímicos,Herramientas,Sistemas de Riego',
            'precio'=> 'required|numeric|gt:0',
            'costo'=> 'required|numeric|min:0',
            'inventario' => 'required|integer|min:0',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'fabricante' => 'required|max:255',
            'fecha_vencimiento' => 'nullable|date',
            'fecha_registro' => 'required|date',
            'numero_lote' => 'required|max:100',
        ]);

        if ($request->hasFile('imagen')) {
            $archivo = $request->file('imagen');
            $nombre = time() . '_' . uniqid() . '.' . $archivo->getClientOriginalExtension();
            $archivo->move(public_path('uploads/insumos'), $nombre);
            $datos['imagen'] = 'uploads/insumos/' . $nombre;
        }
        Insumo::create($datos);

        return redirect()->route('insumos.index')->with('success', '¡Insumo registrado exitosamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Insumo $insumo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Insumo $insumo)
    {
        return view('insumos.edit', compact('insumo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Insumo $insumo)
    {
        $datos = $request->validate([
            'codigo'=> ['required', 'max:50', Rule::unique('insumos')->ignore($insumo->id)],
            'nombre'=> 'required|max:255',
            'categoria'=> 'required|in:Fertilizantes,Semillas Certificadas,Agroquímicos,Herramientas,Sistemas de Riego',
            'precio'=> 'required|numeric|gt:0',
            'costo'=> 'required|numeric|min:0',
            'inventario' => 'required|integer|min:0',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'fabricante' => 'required|max:255',
            'fecha_vencimiento' => 'nullable|date',
            'fecha_registro' => 'required|date',
            'numero_lote' => 'required|max:100',
        ]);

        if ($request->hasFile('imagen')) {
            $archivo = $request->file('imagen');
            $nombre = time() . '_' . uniqid() . '.' . $archivo->getClientOriginalExtension();
            $archivo->move(public_path('uploads/insumos'), $nombre);
            $datos['imagen'] = 'uploads/insumos/' . $nombre;
        }

        $insumo->update($datos);

        return redirect()->route('insumos.index')->with('success', '¡Insumo actualizado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Insumo $insumo)
    {
        if ($insumo->imagen && file_exists(public_path($insumo->imagen))) {
            unlink(public_path($insumo->imagen));
        }
        $insumo->delete();
        return redirect()->route('insumos.index')->with('success', '¡Insumo eliminado!');
    }
}
