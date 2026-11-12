@extends('layouts.admin')

@section('titulo', 'Editar Proveedor')

@section('contenido')
<h1 class="h3 mb-3 text-gray-800">Editar Proveedor: {{ $proveedor->empresa }}</h1>

<div class="card shadow-sm col-lg-10">
    <div class="card-body">
        <form action="{{ route('proveedores.update', $proveedor) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-4 form-group">
                    <label class="font-weight-bold">RTN (14 dígitos)</label>
                    <input type="text" name="rtn" maxlength="14" class="form-control @error('rtn') is-invalid @enderror" value="{{ old('rtn', $proveedor->rtn) }}">
                    @error('rtn') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-8 form-group">
                    <label class="font-weight-bold">Empresa (Razón Social)</label>
                    <input type="text" name="empresa" class="form-control @error('empresa') is-invalid @enderror" value="{{ old('empresa', $proveedor->empresa) }}">
                    @error('empresa') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 form-group">
                    <label class="font-weight-bold">Contacto (Asesor Comercial)</label>
                    <input type="text" name="contacto" class="form-control @error('contacto') is-invalid @enderror" value="{{ old('contacto', $proveedor->contacto) }}">
                    @error('contacto') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 form-group">
                    <label class="font-weight-bold">Teléfono (8 dígitos)</label>
                    <input type="text" name="telefono" maxlength="8" class="form-control @error('telefono') is-invalid @enderror" value="{{ old('telefono', $proveedor->telefono) }}">
                    @error('telefono') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 form-group">
                    <label class="font-weight-bold">Categoría</label>
                    <select name="categoria" class="form-control @error('categoria') is-invalid @enderror">
                        @foreach (['Químicos', 'Semilleros', 'Maquinaria'] as $categoria)
                            <option value="{{ $categoria }}" {{ old('categoria', $proveedor->categoria) == $categoria ? 'selected' : '' }}>{{ $categoria }}</option>
                        @endforeach
                    </select>
                    @error('categoria') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 form-group">
                    <label class="font-weight-bold">Límite de Crédito (Lempiras)</label>
                    <input type="number" step="0.01" name="limite_credito" class="form-control @error('limite_credito') is-invalid @enderror" value="{{ old('limite_credito', $proveedor->limite_credito) }}">
                    @error('limite_credito') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 form-group">
                    <label class="font-weight-bold">Días de Crédito</label>
                    <select name="dias_credito" class="form-control @error('dias_credito') is-invalid @enderror">
                        @foreach ([15, 30, 45, 60] as $dias)
                            <option value="{{ $dias }}" {{ old('dias_credito', $proveedor->dias_credito) == $dias ? 'selected' : '' }}>{{ $dias }} días</option>
                        @endforeach
                    </select>
                    @error('dias_credito') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label class="font-weight-bold">Estado</label>
                    <select name="estado" class="form-control @error('estado') is-invalid @enderror">
                        @foreach (['Activo', 'Inactivo'] as $estado)
                            <option value="{{ $estado }}" {{ old('estado', $proveedor->estado) == $estado ? 'selected' : '' }}>{{ $estado }}</option>
                        @endforeach
                    </select>
                    @error('estado') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label class="font-weight-bold">Fecha de Registro</label>
                    <input type="date" name="fecha_registro" class="form-control @error('fecha_registro') is-invalid @enderror" value="{{ old('fecha_registro', $proveedor->fecha_registro) }}">
                    @error('fecha_registro') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('proveedores.index') }}" class="btn btn-secondary mr-2">Cancelar</a>
                <button type="submit" class="btn btn-warning"><i class="fas fa-save"></i> Actualizar Proveedor</button>
            </div>
        </form>
    </div>
</div>
@endsection