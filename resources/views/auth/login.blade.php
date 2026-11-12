<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar Sesión - AGROVALLE Honduras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-success bg-gradient">
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-12 col-sm-10 col-md-7 col-lg-5">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-header bg-dark text-white text-center py-4 rounded-top-4">
                        <h3 class="fw-bold mb-1">
                            <i class="bi bi-flower1 text-success me-2"></i>AGROVALLE Honduras
                        </h3>
                        <small class="text-white-50">Sistema de Gestión Interna</small>
                    </div>
                    <div class="card-body p-4">
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

                            <button type="submit" class="btn btn-success w-100 py-2 fw-semibold">
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
