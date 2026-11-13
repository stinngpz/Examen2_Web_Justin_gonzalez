<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Insumo;
use App\Models\Proveedor;
use App\Models\Empleado;

class DashboardController extends Controller
{
    public function index()
    {
        $totalInsumos = Insumo::count();
        $proveedoresActivos = Proveedor::where('estado', 'Activo')->count();
        $totalEmpleados = Empleado::count();
        $valorInventario = Insumo::sum(\DB::raw('inventario * precio')); 
        return view('dashboard', compact('totalInsumos', 'proveedoresActivos', 'totalEmpleados', 'valorInventario'));
    }
}
