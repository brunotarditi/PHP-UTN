<?php

include ("conexion.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM automoviles WHERE id = $id";

   if ($conn->query($sql) === false) {
        echo "Falló la query";
    }
    $_SESSION['message'] = 'Datos eliminados correctamente.';
    $_SESSION['message_type'] = 'danger';
    header("Location: formulario.php");
}
?>