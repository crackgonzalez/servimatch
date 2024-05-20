<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido - Tu Aplicación</title>
    <!-- Agregar estilos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #ddeff9;">
    <div class="container mt-5">
        <h1 class="mb-4 text-primary">Bienvenido a Tu Aplicación</h1>
        <h2 class="text-info">Servicios Disponibles</h2>
        <div class="list-group">
            @foreach ($servicios as $servicio)
                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" style="background-color: #f5f7fa;">
                    <span>{{ $servicio->título }}</span>
                    <span class="badge bg-teal text-white">${{ $servicio->precio }}</span>
                </a>
            @endforeach
        </div>
    </div>
    <!-- Agregar scripts de Bootstrap y jQuery (opcional) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
