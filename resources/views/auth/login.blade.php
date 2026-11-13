<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar Sesión - AGROVALLE Honduras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body style="background: linear-gradient(rgba(10, 60, 30, 0.55), rgba(10, 60, 30, 0.55)), url('{{ asset('sb-admin/img/fondo-login.jpg') }}') center center / cover no-repeat fixed;">
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-12 col-sm-10 col-md-7 col-lg-4">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-header bg-white text-center py-4 rounded-top-4 border-0">
                        <img src="{{ asset('sb-admin/img/logo.png') }}" alt="AGROVALLE" style="width: 90px;">
                        <h3 class="fw-bold text-success mt-2 mb-0">AGROVALLE</h3>
                    </div>
                    <div class="card-body p-4">
                        <p class="text-center text-muted mb-4">Ingrese con su correo institucional</p>
                        <form action="{{ route('login.post') }}" method="POST">
                            @csrf

                            <div class="form-floating mb-3">
                                <input type="email" name="email" id="email" value="{{ old('email') }}"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="usuario@agrovalle.hn" autofocus>
                                <label for="email"><i class="bi bi-envelope me-1"></i>Correo institucional</label>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" name="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Contraseña">
                                <label for="password"><i class="bi bi-lock me-1"></i>Contraseña</label>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label" for="remember">Recordar mi sesión</label>
                            </div>

                            <button type="submit" class="btn btn-success btn-lg w-100 fw-semibold">
                                <i class="bi bi-box-arrow-in-right me-1"></i>Ingresar
                            </button>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3 bg-light small text-muted rounded-bottom-4">
                        &copy; {{ date('Y') }} Distribuidora Agropecuaria del Valle S. de R.L.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
