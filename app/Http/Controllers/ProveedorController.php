<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = Proveedor::latest()->paginate(10);
        return view('proveedores.index', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proveedores.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'rtn'            => 'required|digits:14|unique:proveedores,rtn',
            'empresa'        => 'required|max:255',
            'contacto'       => 'required|max:255',
            'telefono'       => ['required', 'regex:/^[2389][0-9]{7}$/'],
            'categoria'      => 'required|in:Químicos,Semilleros,Maquinaria',
            'limite_credito' => 'required|numeric|min:0',
            'dias_credito'   => 'required|in:15,30,45,60',
            'estado'         => 'required|in:Activo,Inactivo',
            'fecha_registro' => 'required|date',
        ]);

        Proveedor::create($datos);

        return redirect()->route('proveedores.index')
                         ->with('success', '¡Proveedor registrado exitosamente!');
    }
    /**
     * Display the specified resource.
     */
    public function show(Proveedor $proveedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
     public function edit(Proveedor $proveedor)
    {
        return view('proveedores.edit', compact('proveedor'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proveedor $proveedor)
    {
        $datos = $request->validate([
            'rtn'            => ['required', 'digits:14', Rule::unique('proveedores', 'rtn')->ignore($proveedor->id)],
            'empresa'        => 'required|max:255',
            'contacto'       => 'required|max:255',
            'telefono'       => ['required', 'regex:/^[2389][0-9]{7}$/'],
            'categoria'      => 'required|in:Químicos,Semilleros,Maquinaria',
            'limite_credito' => 'required|numeric|min:0',
            'dias_credito'   => 'required|in:15,30,45,60',
            'estado'         => 'required|in:Activo,Inactivo',
            'fecha_registro' => 'required|date',
        ]);

        $proveedor->update($datos);

        return redirect()->route('proveedores.index')
                         ->with('success', '¡Proveedor actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();

        return redirect()->route('proveedores.index')
                         ->with('success', '¡Proveedor eliminado!');
    }
}
