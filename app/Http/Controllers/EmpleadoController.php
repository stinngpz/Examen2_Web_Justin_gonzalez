<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = Empleado::latest()->paginate(10);
        return view('empleados.index',compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos=$request->validate([
            'identidad' => 'required|digits:13|unique:empleados,identidad',
            'nombre' =>'required|max:255',
            'apellido' =>'required|max:255',
            'correo' =>'required|email|unique:empleados,correo',
            'cargo' => 'required|in:Ingeniero Agrónomo,Asesor Técnico de Campo,Jefe de Bodega Central,Operador de Maquinaria,Cajero',
            'salario' => 'required|numeric|gt:0',
            'fecha_ingreso' =>'required|date',
            'estado' => 'required|in:Activo,Inactivo'
        ], [
            'required' => 'Este campo es obligatorio.',
            'max' => 'Este campo supera el tamaño permitido.',
            'identidad.digits' => 'La identidad debe tener exactamente 13 dígitos, sin guiones.',
            'identidad.unique' => 'Esa identidad ya está registrada.',
            'correo.email' => 'Ingrese un correo válido.',
            'correo.unique' => 'Ese correo ya está registrado.',
            'cargo.in' => 'Seleccione un cargo válido.',
            'salario.numeric' => 'El salario debe ser un número.',
            'salario.gt' => 'El salario debe ser mayor a 0.',
            'fecha_ingreso.date' => 'Ingrese una fecha válida.',
            'estado.in' => 'Seleccione un estado válido.',
        ]);

        Empleado::create($datos);

        return redirect()->route('empleados.index')->with('success','Empleado registrado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleado $empleado)
    {
        return view('empleados.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleado $empleado)
    {
        $datos =$request->validate([
            'identidad' => ['required','digits:13', Rule::unique('empleados','identidad')->ignore($empleado->id)],
            'nombre' => 'required|max:255',
            'apellido' => 'required|max:255',
            'correo' => ['required','email', Rule::unique('empleados','correo')->ignore($empleado->id)],
            'cargo' => 'required|in:Ingeniero Agrónomo,Asesor Técnico de Campo,Jefe de Bodega Central,Operador de Maquinaria,Cajero',
            'salario' => 'required|numeric|gt:0',
            'fecha_ingreso' => 'required|date',
            'estado' => 'required|in:Activo,Inactivo'
        ], [
            'required' => 'Este campo es obligatorio.',
            'max' => 'Este campo supera el tamaño permitido.',
            'identidad.digits' => 'La identidad debe tener exactamente 13 dígitos, sin guiones.',
            'identidad.unique' => 'Esa identidad ya está registrada.',
            'correo.email' => 'Ingrese un correo válido.',
            'correo.unique' => 'Ese correo ya está registrado.',
            'cargo.in' => 'Seleccione un cargo válido.',
            'salario.numeric' => 'El salario debe ser un número.',
            'salario.gt' => 'El salario debe ser mayor a 0.',
            'fecha_ingreso.date' => 'Ingrese una fecha válida.',
            'estado.in' => 'Seleccione un estado válido.',
        ]);

        $empleado->update($datos);
        return redirect()->route('empleados.index')->with('success','Empleado actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        return redirect()->route('empleados.index')->with('success','Empleado eliminado correctamente');
    }
}
