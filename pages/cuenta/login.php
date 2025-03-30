<?php
session_start();
include("conexion.php");

// Verificar si ya está logueado
if(isset($_SESSION['usuario'])) {
    header("Location: ../../index.php");
    exit();
}

// Solo permitir método POST
if($_SERVER["REQUEST_METHOD"] != "POST") {
    $_SESSION['error'] = "Método no permitido";
    header("Location: login.html");
    exit();
}

// Obtener y limpiar datos
$usuario = trim($_POST['usuario']);
$contrasena = $_POST['contrasena'];

// Validaciones básicas
if(empty($usuario) || empty($contrasena)) {
    $_SESSION['error'] = "Usuario y contraseña son obligatorios";
    header("Location: login.html");
    exit();
}

// Consulta preparada
$sql = "SELECT id, nombre_completo, contrasena FROM usuarios WHERE usuario = ?";
$stmt = mysqli_prepare($conexion, $sql);

if($stmt) {
    mysqli_stmt_bind_param($stmt, "s", $usuario);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    
    if($fila = mysqli_fetch_assoc($resultado)) {
        if(password_verify($contrasena, $fila['contrasena'])) {
            // Configurar sesión
            $_SESSION['id'] = $fila['id'];
            $_SESSION['usuario'] = $usuario;
            $_SESSION['nombre'] = $fila['nombre_completo'];
            
            // Redirigir con mensaje de éxito
            $_SESSION['welcome'] = "Bienvenido, ".$fila['nombre_completo'];
            header("Location: ../../index.php");
        } else {
            $_SESSION['error'] = "Contraseña incorrecta";
            header("Location: login.html");
        }
    } else {
        $_SESSION['error'] = "Usuario no encontrado";
        header("Location: login.html");
    }
    
    mysqli_stmt_close($stmt);
} else {
    $_SESSION['error'] = "Error en el sistema";
    header("Location: login.html");
}

mysqli_close($conexion);
exit();
?>