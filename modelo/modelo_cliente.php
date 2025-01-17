

<?php

require_once  'conexion_cliente.php';

//limpiar los datos recibidos por formulario
function limpiar_datos($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// obtener todos los contactos
function obtener_clientes($campos=['Id_cliente', 'nombre','apellidos', 'telefono', 'email', 'id_fiscal','domicilio','poblacion', 'codigo_postal', 'provincia', 'direccion_envio', 'poblacion_envio', 'codigo_postal_envio', 'sitio_web']){
    $pdo = conectarBD();
    $campos_str = implode(', ', $campos);
    $stmt = $pdo ->query("SELECT $campos_str FROM clientes WHERE activo = TRUE");
    return $stmt ->fetchAll(PDO::FETCH_ASSOC);
}

// Obtener un usuario por su ID
function obtener_cliente_por_id($id_fiscal) {
    $pdo = conectarBD();
    $stmt = $pdo->prepare("SELECT Id_cliente, nombre, apellidos, telefono, email, id_fiscal,domicilio,poblacion, codigo_postal, provincia, direccion_envio, poblacion_envio, codigo_postal_envio, sitio_web, activo FROM clientes WHERE id_fiscal = :id_fiscal");
    $stmt->execute([':id_fiscal' => $id_fiscal]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

//Actualizar el cliente
function actualizar_cliente($nombre, $apellidos, $telefono, $email, $id_fiscal, $domicilio, $poblacion, $codigo_postal, $provincia, $direccion_envio, $poblacion_envio, $codigo_postal_envio, $sitio_web, $activo) {
    $nombre = limpiar_datos($nombre);
    $apellidos = limpiar_datos($apellidos);
    $telefono = limpiar_datos($telefono);
    $email = limpiar_datos($email);
    $id_fiscal = limpiar_datos($id_fiscal);
    $domicilio = limpiar_datos($domicilio);
    $poblacion = limpiar_datos($poblacion);
    $codigo_postal = limpiar_datos($codigo_postal);
    $provincia = limpiar_datos($provincia);
    $direccion_envio = limpiar_datos($direccion_envio);
    $poblacion_envio = limpiar_datos($poblacion_envio);
    $codigo_postal_envio = limpiar_datos($codigo_postal_envio);
    $sitio_web = limpiar_datos($sitio_web);
    $activo = limpiar_datos($activo);
        
    $pdo = conectarBD();
    $stmt = $pdo->prepare("UPDATE clientes SET nombre = :nombre, apellidos = :apellidos, telefono = :telefono, email = :email, domicilio = :domicilio, poblacion = :poblacion, codigo_postal = :codigo_postal, provincia = :provincia, direccion_envio = :direccion_envio, poblacion_envio = :poblacion_envio, codigo_postal_envio = :codigo_postal_envio, sitio_web = :sitio_web, activo = :activo  WHERE id_fiscal = :id_fiscal");
    
    $stmt->execute([
        ':nombre' => $nombre, 
        ':apellidos' => $apellidos, 
        ':telefono' => $telefono, 
        ':email' => $email, 
        ':id_fiscal' => $id_fiscal, 
        ':domicilio' => $domicilio, 
        ':poblacion' => $poblacion, 
        ':codigo_postal' => $codigo_postal,
        ':provincia' => $provincia, 
        ':direccion_envio' => $direccion_envio,
        ':poblacion_envio' => $poblacion_envio,
        ':codigo_postal_envio' => $codigo_postal_envio,
        ':sitio_web' => $sitio_web,
        ':activo' => $activo
    ]);
}

//Eliminar clientes
function eliminar_cliente($id_fiscal) {
    $pdo = conectarBD();
    $stmt = $pdo->prepare("UPDATE clientes SET activo = FALSE WHERE id_fiscal = :id_fiscal");
    $stmt->execute([':id_fiscal' => $id_fiscal]);
}

//Consulta de clientes inactivos (eliminados)
function obtener_clientes_inactivos() {
    $pdo = conectarBD();
    $stmt = $pdo->query("SELECT Id_cliente, nombre, apellidos, telefono, email, id_fiscal, domicilio, poblacion, codigo_postal, provincia, direccion_envio, poblacion_envio, codigo_postal_envio, sitio_web, activo FROM clientes WHERE activo = FALSE");
    $clientes= $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $clientes;
}

// Verificar si un cliente existe por su ID fiscal
function cliente_existe($id_fiscal) {
    $pdo = conectarBD();
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM clientes WHERE id_fiscal = :id_fiscal");
    $stmt->execute([':id_fiscal' => $id_fiscal]);
    return $stmt->fetchColumn() > 0;
}


// Guardar un nuevo cliente (insertar)
function guardar_cliente($datos) {

    // Limpiar lod datos antes de la inserción
    foreach ($datos as $key => $value) {
        $datos[$key] = limpiar_datos($value);
    }

    $pdo = conectarBD();
    // Verificar si el cliente ya existe
    if (cliente_existe($datos['id_fiscal'])) {
        return false; // Cliente ya existe
    }
    $stmt = $pdo->prepare("INSERT INTO clientes (nombre, apellidos, telefono, email, id_fiscal, domicilio, poblacion, codigo_postal, provincia, direccion_envio, poblacion_envio, codigo_postal_envio, sitio_web, activo) VALUES (:nombre, :apellidos, :telefono, :email, :id_fiscal, :domicilio, :poblacion, :codigo_postal, :provincia, :direccion_envio, :poblacion_envio, :codigo_postal_envio, :sitio_web, :activo)");
    
    return $stmt->execute($datos);
}
?>
