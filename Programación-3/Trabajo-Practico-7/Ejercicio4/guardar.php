<?php

include ("conexion.php");

if (isset($_POST['guardar'])) {

    if (empty($_POST['marca']) || empty($_POST['modelo']) || empty($_POST['color']) || empty($_POST['motor'])) {
        $_SESSION['message'] = 'Los campos marca, modelo, color, y motor son requeridos.';
        $_SESSION['message_type'] = 'danger';
    
        header("Location: formulario.php");

    }
    else{


        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $color = $_POST['color'];
        $motor = $_POST['motor'];
        $accesorios = $_POST['accesorios'];
        $acc = implode(" | ", $accesorios);
        $observaciones = $_POST['observaciones'];

        if ($accesorios == "") {
            $acc = "Ninguno";
        }

        if ($observaciones == "") {
            $observaciones = "Ninguna";
        }

        
        $sql = "INSERT INTO automoviles (marca, modelo, color, motor, accesorios, observaciones) "
                . "VALUES ('$marca', '$modelo', '$color', '$motor', '$acc' , '$observaciones')";

        if ($conn->query($sql) === false) {
            die ("Falló la query: " . $conn->error);
        }

        $_SESSION['message'] = 'Datos insertados correctamente.';
        $_SESSION['message_type'] = 'success';

        header("Location: formulario.php");      
    }
}
?>
