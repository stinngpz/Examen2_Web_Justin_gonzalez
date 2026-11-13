@extends('layouts.admin')

@section('titulo', 'Dashboard')

@section('contenido')
<style>
    .tarjeta-kpi {
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .tarjeta-kpi:hover {
        transform: translateY(-6px);
        box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.2) !important;
    }
</style>

<div class="card border-0 shadow mb-4 text-white" style="background: linear-gradient(rgba(10, 60, 30, 0.65), rgba(10, 60, 30, 0.65)), url('{{ asset('sb-admin/img/fondo-login.jpg') }}') center center / cover;">
    <div class="card-body py-5">
        <h1 class="h3 font-weight-bold mb-1">Bienvenido a AGROVALLE</h1>
        <p class="mb-0">Dashboard gerencial — resumen del sistema</p>
    </div>
</div>

<div class="row">

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-4 tarjeta-kpi">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="small font-weight-bold text-success text-uppercase mb-1">Insumos en Catálogo</div>
                        <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $totalInsumos }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-seedling fa-3x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-4 tarjeta-kpi">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="small font-weight-bold text-primary text-uppercase mb-1">Proveedores Activos</div>
                        <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $proveedoresActivos }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-truck fa-3x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-4 tarjeta-kpi">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="small font-weight-bold text-info text-uppercase mb-1">Empleados en Nómina</div>
                        <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $totalEmpleados }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-3x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-4 tarjeta-kpi">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="small font-weight-bold text-warning text-uppercase mb-1">Valor del Inventario</div>
                        <div class="h3 mb-0 font-weight-bold text-gray-800">L. {{ number_format($valorInventario, 2) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-coins fa-3x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection