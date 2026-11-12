@extends('layouts.admin')

@section('titulo', 'Proveedores')

@section('contenido')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 text-gray-800">Fabricantes y Proveedores</h1>
    <a href="{{ route('proveedores.create') }}" class="btn btn-success">
        <i class="fas fa-plus"></i> Nuevo Proveedor
    </a>
</div>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
    </div>
@endif

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>RTN</th>
                        <th>Empresa</th>
                        <th>Contacto</th>
                        <th>Teléfono</th>
                        <th>Categoría</th>
                        <th>Límite de Crédito</th>
                        <th>Plazo</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($proveedores as $proveedor)
                        <tr>
                            <td>{{ $proveedor->rtn }}</td>
                            <td>{{ $proveedor->empresa }}</td>
                            <td>{{ $proveedor->contacto }}</td>
                            <td>{{ $proveedor->telefono }}</td>
                            <td>{{ $proveedor->categoria }}</td>
                            <td>L. {{ number_format($proveedor->limite_credito, 2) }}</td>
                            <td><span class="badge badge-info">{{ $proveedor->dias_credito }} días</span></td>
                            <td>
                                @if ($proveedor->estado == 'Activo')
                                    <span class="badge badge-success">Activo</span>
                                @else
                                    <span class="badge badge-secondary">Inactivo</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('proveedores.edit', $proveedor) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('proveedores.destroy', $proveedor) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('¿Está seguro de eliminar este proveedor?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted">No hay proveedores registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $proveedores->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection