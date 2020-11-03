<?php

include ("conexion.php");

if (isset($_POST['guardar'])) {

    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $color = $_POST['color'];
    $motor = $_POST['motor'];
    $accesorios = $_POST['accesorios'];
    $acc = implode(" | ", $accesorios);
    $observaciones = $_POST['observaciones'];

    
    $sql = "INSERT INTO automoviles (marca, modelo, color, motor, accesorios, observaciones) "
            . "VALUES ('$marca', '$modelo', '$color', '$motor', '$acc' , '$observaciones')";

    if ($conn->query($sql) === false) {
        die ("Falló la query: " . $conn->error);
    }

    $_SESSION['message'] = 'Datos insertados correctamente.';
    $_SESSION['message_type'] = 'success';

    header("Location: formulario.php");      
}

?>
