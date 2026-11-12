@extends('layouts.admin')

@section('titulo', 'Editar Insumo')

@section('contenido')
<h1 class="h3 mb-3 text-gray-800">Editar Insumo: {{ $insumo->nombre }}</h1>

<div class="card shadow-sm col-lg-10">
    <div class="card-body">
        <form action="{{ route('insumos.update', $insumo) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-4 form-group">
                    <label class="font-weight-bold">Codigo</label>
                    <input type="text" name="codigo" class="form-control @error('codigo') is-invalid @enderror" value="{{ old('codigo', $insumo->codigo) }}">
                    @error('codigo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-8 form-group">
                    <label class="font-weight-bold">Nombre del insumo</label>
                    <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $insumo->nombre) }}">
                    @error('nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label class="font-weight-bold">Categoría</label>
                    <select name="categoria" class="form-control @error('categoria') is-invalid @enderror">
                        <option value="">-- Seleccione --</option>
                        @foreach (['Fertilizantes', 'Semillas Certificadas', 'Agroquímicos', 'Herramientas', 'Sistemas de Riego'] as $categoria)
                            <option value="{{ $categoria }}" {{ old('categoria', $insumo->categoria) == $categoria ? 'selected' : '' }}>{{ $categoria }}</option>
                        @endforeach
                    </select>
                    @error('categoria') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label class="font-weight-bold">Fabricante</label>
                    <input type="text" name="fabricante" class="form-control @error('fabricante') is-invalid @enderror" value="{{ old('fabricante', $insumo->fabricante) }}">
                    @error('fabricante') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 form-group">
                    <label class="font-weight-bold">Precio (Lempiras)</label>
                    <input type="number" step="0.01" name="precio" class="form-control @error('precio') is-invalid @enderror" value="{{ old('precio', $insumo->precio) }}">
                    @error('precio') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 form-group">
                    <label class="font-weight-bold">Costo (Lempiras)</label>
                    <input type="number" step="0.01" name="costo" class="form-control @error('costo') is-invalid @enderror" value="{{ old('costo', $insumo->costo) }}">
                    @error('costo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 form-group">
                    <label class="font-weight-bold">Inventario</label>
                    <input type="number" name="inventario" class="form-control @error('inventario') is-invalid @enderror" value="{{ old('inventario', $insumo->inventario) }}">
                    @error('inventario') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 form-group">
                    <label class="font-weight-bold">Número de Lote</label>
                    <input type="text" name="numero_lote" class="form-control @error('numero_lote') is-invalid @enderror" value="{{ old('numero_lote', $insumo->numero_lote) }}">
                    @error('numero_lote') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 form-group">
                    <label class="font-weight-bold">Fecha de Registro</label>
                    <input type="date" name="fecha_registro" class="form-control @error('fecha_registro') is-invalid @enderror" value="{{ old('fecha_registro', $insumo->fecha_registro) }}">
                    @error('fecha_registro') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 form-group">
                    <label class="font-weight-bold">Fecha de Vencimiento</label>
                    <input type="date" name="fecha_vencimiento" class="form-control @error('fecha_vencimiento') is-invalid @enderror" value="{{ old('fecha_vencimiento', $insumo->fecha_vencimiento) }}">
                    @error('fecha_vencimiento') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="font-weight-bold">Foto del Empaque (jpg, png, webp, máx. 5MB)</label>
                @if ($insumo->imagen)
                    <div class="mb-2">
                        <img src="{{ asset($insumo->imagen) }}" alt="{{ $insumo->nombre }}" width="100" class="rounded border">
                        <small class="text-muted d-block">Foto actual. Suba otra solo si desea reemplazarla.</small>
                    </div>
                @endif
                <input type="file" name="imagen" accept=".jpg,.jpeg,.png,.webp" class="form-control-file @error('imagen') is-invalid @enderror">
                @error('imagen') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('insumos.index') }}" class="btn btn-secondary mr-2">Cancelar</a>
                <button type="submit" class="btn btn-warning"><i class="fas fa-save"></i> Actualizar Insumo</button>
            </div>
        </form>
    </div>
</div>
@endsection