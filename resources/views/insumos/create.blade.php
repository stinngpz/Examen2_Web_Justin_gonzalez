@extends('layouts.admin')

@section('titulo', 'Registrar Insumo')

@section('contenido')
<h1 class="h3 mb-3 text-gray-800">Registrar Nuevo Insumo</h1>

<div class="card shadow-sm col-lg-10">
    <div class="card-body">
        <form action="{{ route('insumos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-4 form-group">
                    <label class="font-weight-bold">Codigo </label>
                    <input type="text" name="codigo" class="form-control @error('codigo') is-invalid @enderror" value="{{ old('codigo') }}" placeholder="Ej: FER-001">
                    @error('codigo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-8 form-group">
                    <label class="font-weight-bold">Nombre del Insumo</label>
                    <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" placeholder="Ej: Fertilizante NPK 15-15-15">
                    @error('nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label class="font-weight-bold">Categoria</label>
                    <select name="categoria" class="form-control @error('categoria') is-invalid @enderror">
                        <option value="">-- Seleccione --</option>
                        @foreach (['Fertilizantes', 'Semillas Certificadas', 'Agroquímicos', 'Herramientas', 'Sistemas de Riego'] as $categoria)
                            <option value="{{ $categoria }}" {{ old('categoria') == $categoria ? 'selected' : '' }}>{{ $categoria }}</option>
                        @endforeach
                    </select>
                    @error('categoria') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label class="font-weight-bold">Fabricante</label>
                    <input type="text" name="fabricante" class="form-control @error('fabricante') is-invalid @enderror" value="{{ old('fabricante') }}" placeholder="Ej: Bayer, Yara, Syngenta">
                    @error('fabricante') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 form-group">
                    <label class="font-weight-bold">Precio (Lempiras)</label>
                    <input type="number" step="0.01" name="precio" class="form-control @error('precio') is-invalid @enderror" value="{{ old('precio') }}" placeholder="0.00">
                    @error('precio') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 form-group">
                    <label class="font-weight-bold">Costo (Lempiras)</label>
                    <input type="number" step="0.01" name="costo" class="form-control @error('costo') is-invalid @enderror" value="{{ old('costo') }}" placeholder="0.00">
                    @error('costo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 form-group">
                    <label class="font-weight-bold">Inventario</label>
                    <input type="number" name="inventario" class="form-control @error('inventario') is-invalid @enderror" value="{{ old('inventario') }}" placeholder="0">
                    @error('inventario') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 form-group">
                    <label class="font-weight-bold">Número de Lote</label>
                    <input type="text" name="numero_lote" class="form-control @error('numero_lote') is-invalid @enderror" value="{{ old('numero_lote') }}" placeholder="Ej: L-2026-01">
                    @error('numero_lote') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 form-group">
                    <label class="font-weight-bold">Fecha de Registro</label>
                    <input type="date" name="fecha_registro" class="form-control @error('fecha_registro') is-invalid @enderror" value="{{ old('fecha_registro', date('Y-m-d')) }}">
                    @error('fecha_registro') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 form-group">
                    <label class="font-weight-bold">Fecha de Vencimiento</label>
                    <input type="date" name="fecha_vencimiento" class="form-control @error('fecha_vencimiento') is-invalid @enderror" value="{{ old('fecha_vencimiento') }}">
                    @error('fecha_vencimiento') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="font-weight-bold">Foto del Empaque (jpg, png, webp, máx. 5MB)</label>
                <input type="file" name="imagen" accept=".jpg,.jpeg,.png,.webp" class="form-control-file @error('imagen') is-invalid @enderror">
                @error('imagen') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('insumos.index') }}" class="btn btn-secondary mr-2">Cancelar</a>
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar Insumo</button>
            </div>
        </form>
    </div>
</div>
@endsection