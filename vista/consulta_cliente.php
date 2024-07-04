<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Contacto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Consultar Cliente</h2>
        <?php if (isset($cliente) && $cliente): ?>
            <?php if (!$cliente['activo']): ?>
                <div class="alert alert-warning" role="alert">
                    ¡Este cliente se encuentra inactivo!
                </div>
            <?php endif; ?>
        <form>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($cliente['nombre']); ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo htmlspecialchars($cliente['apellidos']); ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo htmlspecialchars($cliente['telefono']); ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($cliente['email']); ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="id_fiscal" class="form-label">ID Fiscal</label>
                <input type="text" class="form-control" id="id_fiscal" name="id_fiscal" value="<?php echo htmlspecialchars($cliente['id_fiscal']); ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="domicilio" class="form-label">Domicilio</label>
                <input type="text" class="form-control" id="domicilio" name="domicilio" value="<?php echo htmlspecialchars($cliente['domicilio']); ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="poblacion" class="form-label">Población</label>
                <input type="text" class="form-control" id="poblacion" name="poblacion" value="<?php echo htmlspecialchars($cliente['poblacion']); ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="codigo_postal" class="form-label">CP</label>
                <input type="text" class="codigo_postal" id="codigo_postal" name="codigo_postal" value="<?php echo htmlspecialchars($cliente['poblacion']); ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="provincia" class="form-label">Provincia</label>
                <input type="text" class="form-control" id="provincia" name="provincia" value="<?php echo htmlspecialchars($cliente['provincia']); ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="direccion_envio" class="form-label">Dirección de Envío</label>
                <input type="text" class="form-control" id="direccion_envio" name="direccion_envio" value="<?php echo htmlspecialchars($cliente['direccion_envio']); ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="poblacion_envio" class="form-label">Población de Envío</label>
                <input type="text" class="form-control" id="poblacion_envio" name="poblacion_envio" value="<?php echo htmlspecialchars($cliente['poblacion_envio']); ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="codigo_postal_envio" class="form-label">CP de Envío</label>
                <input type="text" class="form-control" id="codigo_postal_envio" name="codigo_postal_envio" value="<?php echo htmlspecialchars($cliente['codigo_postal_envio']); ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="sitio_web" class="form-label">Sitio Web</label>
                <input type="text" class="form-control" id="sitio_web" name="sitio_web" value="<?php echo htmlspecialchars($cliente['sitio_web']); ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="activo" class="form-label">Activo</label>
                <input type="text" class="form-control" id="activo" name="activo" value="<?php echo htmlspecialchars($cliente['activo']); ?>" readonly>
            </div>
            </form>
        <?php else: ?>
        <div class="alert alert-danger" role="alert">
            Cliente no encontrado.
        </div>
        <?php endif; ?>
        <div class="text-center mt-4">
            <a href="../index.php" class="btn btn-secondary">Volver al menú principal</a>
        </div>
    </div>
</body>
</html>