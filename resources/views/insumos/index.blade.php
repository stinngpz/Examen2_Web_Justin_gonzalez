@extends('layouts.admin')

@section('titulo', 'Insumos')

@section('contenido')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 text-gray-800">Catálogo de Insumos</h1>
    <a href="{{ route('insumos.create') }}" class="btn btn-success">
        <i class="fas fa-plus"></i> Nuevo Insumo
    </a>
</div>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
    </div>
@endif

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <form action="{{ route('insumos.index') }}" method="GET" class="form-inline">
            @csrf
            <input type="text" name="buscar" value="{{ $buscar }}" class="form-control mr-2" placeholder="Buscar por nombre o SKU">
            <button type="submit" class="btn btn-primary mr-2"><i class="fas fa-search"></i> Buscar</button>
            @if ($buscar)
                <a href="{{ route('insumos.index') }}" class="btn btn-secondary">Limpiar</a>
            @endif
        </form>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Foto</th>
                        <th>SKU</th>
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th>Precio</th>
                        <th>Existencias</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($insumos as $insumo)
                        <tr>
                            <td>
                                @if ($insumo->imagen)
                                    <img src="{{ asset($insumo->imagen) }}" alt="{{ $insumo->nombre }}" width="60" height="60" style="object-fit: cover;" class="rounded">
                                @else
                                    <span class="text-muted small">Sin foto</span>
                                @endif
                            </td>
                            <td>{{ $insumo->codigo }}</td>
                            <td>{{ $insumo->nombre }}</td>
                            <td>{{ $insumo->categoria }}</td>
                            <td>L. {{ number_format($insumo->precio, 2) }}</td>
                            <td>
                                {{ $insumo->inventario }}
                                @if ($insumo->inventario > 20)
                                    <span class="badge badge-success">Óptimo</span>
                                @elseif ($insumo->inventario >= 10)
                                    <span class="badge badge-warning">Moderado</span>
                                @else
                                    <span class="badge badge-danger">¡Desabastecimiento!</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('insumos.edit', $insumo) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('insumos.destroy', $insumo) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('¿Está seguro de eliminar este insumo?')">
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
                            <td colspan="7" class="text-center text-muted">No hay insumos registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $insumos->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection