@extends('layouts.admin')

@section('titulo', 'Registrar Empleado')

@section('contenido')
<h1 class="h3 mb-3 text-gray-800">Registrar Nuevo Empleado</h1>

<div class="card shadow-sm col-lg-10">
    <div class="card-body">
        <form action="{{ route('empleados.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-4 form-group">
                    <label class="font-weight-bold">Identidad (13 dígitos, sin guiones)</label>
                    <input type="text" name="identidad" maxlength="13" class="form-control @error('identidad') is-invalid @enderror" value="{{ old('identidad') }}" placeholder="0801199912345">
                    @error('identidad') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 form-group">
                    <label class="font-weight-bold">Nombre</label>
                    <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}">
                    @error('nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 form-group">
                    <label class="font-weight-bold">Apellido</label>
                    <input type="text" name="apellido" class="form-control @error('apellido') is-invalid @enderror" value="{{ old('apellido') }}">
                    @error('apellido') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label class="font-weight-bold">Correo</label>
                    <input type="email" name="correo" class="form-control @error('correo') is-invalid @enderror" value="{{ old('correo') }}" placeholder="nombre@agrovalle.hn">
                    @error('correo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label class="font-weight-bold">Cargo</label>
                    <select name="cargo" class="form-control @error('cargo') is-invalid @enderror">
                        <option value="">-- Seleccione --</option>
                        @foreach (['Ingeniero Agrónomo', 'Asesor Técnico de Campo', 'Jefe de Bodega Central', 'Operador de Maquinaria', 'Cajero'] as $cargo)
                            <option value="{{ $cargo }}" {{ old('cargo') == $cargo ? 'selected' : '' }}>{{ $cargo }}</option>
                        @endforeach
                    </select>
                    @error('cargo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 form-group">
                    <label class="font-weight-bold">Salario Mensual (Lempiras)</label>
                    <input type="number" step="0.01" name="salario" class="form-control @error('salario') is-invalid @enderror" value="{{ old('salario') }}" placeholder="0.00">
                    @error('salario') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 form-group">
                    <label class="font-weight-bold">Fecha de Ingreso</label>
                    <input type="date" name="fecha_ingreso" class="form-control @error('fecha_ingreso') is-invalid @enderror" value="{{ old('fecha_ingreso') }}">
                    @error('fecha_ingreso') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 form-group">
                    <label class="font-weight-bold">Estado</label>
                    <select name="estado" class="form-control @error('estado') is-invalid @enderror">
                        <option value="Activo" {{ old('estado', 'Activo') == 'Activo' ? 'selected' : '' }}>Activo</option>
                        <option value="Inactivo" {{ old('estado') == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                    </select>
                    @error('estado') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('empleados.index') }}" class="btn btn-secondary mr-2">Cancelar</a>
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar Empleado</button>
            </div>
        </form>
    </div>
</div>
@endsection