<?php
include("conexion.php");
session_start();

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    echo '<script>
        alert("Acceso no autorizado");
        window.location = "../index.php";
    </script>';
    exit();
}

// Obtener y limpiar los datos del formulario
$nombre_completo = trim($_POST['nombre']);
$correo = trim($_POST['correo']);
$usuario = trim($_POST['usuario']);
$contrasena = $_POST['contrasena'];

// Validaciones básicas
if (empty($nombre_completo) || empty($correo) || empty($usuario) || empty($contrasena)) {
    echo '<script>
        alert("Todos los campos son obligatorios");
        window.location = "../index.php";
    </script>';
    exit();
}

if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    echo '<script>
        alert("El correo electrónico no es válido");
        window.location = "../index.php";
    </script>';
    exit();
}

if (strlen($contrasena) < 8) {
    echo '<script>
        alert("La contraseña debe tener al menos 8 caracteres");
        window.location = "../index.php";
    </script>';
    exit();
}

// Encriptar la contraseña
$contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT);

// Consulta preparada para evitar inyección SQL
$query = "INSERT INTO usuarios (nombre_completo, correo, usuario, contrasena) VALUES (?, ?, ?, ?)";
$stmt = mysqli_prepare($conexion, $query);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "ssss", $nombre_completo, $correo, $usuario, $contrasena_hash);
    $ejecutar = mysqli_stmt_execute($stmt);
    
    if ($ejecutar) {
        // Guardar datos en sesión
        $_SESSION['usuario'] = $usuario;
        $_SESSION['nombre'] = $nombre_completo;
        
        // Mostrar mensaje de bienvenida personalizado
        echo '
        <script>
            alert("¡Bienvenido a CapStore, '.$nombre_completo.'!\\nTu registro se completó exitosamente.");
            window.location = "../../index.php";
        </script>';
    } else {
        echo '<script>
            alert("Error al registrar el usuario: ' . mysqli_error($conexion) . '");
            window.location = "../index.php";
        </script>';
    }
    
    mysqli_stmt_close($stmt);
} else {
    echo '<script>
        alert("Error en la preparación de la consulta");
        window.location = "../index.php";
    </script>';
}

mysqli_close($conexion);
?>