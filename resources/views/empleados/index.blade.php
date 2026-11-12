@extends('layouts.admin')

@section('titulo', 'Empleados')

@section('contenido')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 text-gray-800">Nómina y Personal Técnico</h1>
    <a href="{{ route('empleados.create') }}" class="btn btn-success">
        <i class="fas fa-plus"></i> Nuevo Empleado
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
                        <th>Identidad</th>
                        <th>Nombre Completo</th>
                        <th>Correo</th>
                        <th>Cargo</th>
                        <th>Salario</th>
                        <th>Fecha de Ingreso</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($empleados as $empleado)
                        <tr>
                            <td>{{ $empleado->identidad }}</td>
                            <td>{{ $empleado->nombre }} {{ $empleado->apellido }}</td>
                            <td>{{ $empleado->correo }}</td>
                            <td>
                                @switch($empleado->cargo)
                                    @case('Ingeniero Agrónomo')
                                        <span class="badge badge-success">{{ $empleado->cargo }}</span>
                                        @break
                                    @case('Asesor Técnico de Campo')
                                        <span class="badge badge-info">{{ $empleado->cargo }}</span>
                                        @break
                                    @case('Jefe de Bodega Central')
                                        <span class="badge badge-primary">{{ $empleado->cargo }}</span>
                                        @break
                                    @case('Operador de Maquinaria')
                                        <span class="badge badge-warning">{{ $empleado->cargo }}</span>
                                        @break
                                    @default
                                        <span class="badge badge-dark">{{ $empleado->cargo }}</span>
                                @endswitch
                            </td>
                            <td>L. {{ number_format($empleado->salario, 2) }}</td>
                            <td>{{ date('d/m/Y', strtotime($empleado->fecha_ingreso)) }}</td>
                            <td>
                                @if ($empleado->estado == 'Activo')
                                    <span class="badge badge-success">Activo</span>
                                @else
                                    <span class="badge badge-secondary">Inactivo</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('empleados.edit', $empleado) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('empleados.destroy', $empleado) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('¿Está seguro de eliminar este empleado?')">
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
                            <td colspan="8" class="text-center text-muted">No hay empleados registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $empleados->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection