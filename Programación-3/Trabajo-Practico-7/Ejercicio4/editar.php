<?php

include ("conexion.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM automoviles WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $marca = $row['marca'];
        $modelo = $row['modelo'];
        $color = $row['color'];
        $motor = $row['motor'];
        $accesorios = $row['accesorios'];
        $observaciones = $row['observaciones'];
        
    }
     
}

if (isset($_POST['actualizar'])) {
    $id = $_GET['id'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $color = $_POST['color'];
    $motor = $_POST['motor'];
    $accesorios = $_POST['accesorios'];
    $acc = implode(" | ", $accesorios);
    $observaciones = $_POST['observaciones'];

    $sql = "UPDATE automoviles SET marca = '$marca', modelo = '$modelo', color = '$color', motor = '$motor',  accesorios = '$acc' , observaciones = '$observaciones' WHERE id = $id";
    mysqli_query($conn, $sql);

    $_SESSION['message'] = 'Datos actualizados correctamente.';
    $_SESSION['message_type'] = 'warning';
    header("Location: formulario.php");

}

?>

<?php include("header.php")?>

<nav class="navbar navbar-light bg-warning justify-content-between">
    <div class="navbar-brand">Actulizar formulario de Autos con PHP</div>
    <form class="form-inline">
        <a href="formulario.php" class="navbar-brand btn btn-dark text-white">Regresar</a>    
    </form>
</nav>

<div class="container p-4 ">
    <div class="row align-items-center justify-content-center ">
        <div class="col-md-5">
            <div class="card card-body bg-light">
                <form action="editar.php?id=<?php echo $_GET['id'];?>" method="POST">
                            <div class="form-group">
                                <label>Marca</label>
                                <input type="text" name="marca" id="marca" value=<?php echo $marca; ?> class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label>Modelo</label>
                                <input type="text" name="modelo" id="modelo" value=<?php echo $modelo; ?> class="form-control"/>
                            </div>
                            <div class="form-group">
                                <br>
                                <label>Color</label>
                                <select name="color" id="color" class="form-control">
                                    <option value="">Seleccione el color</option>
                                    <option value="Blanco"<?php if ($color == "Blanco") echo "selected"; 
                                    ?>>Blanco</option>
                                    <option value="Negro"<?php if ($color == "Negro") echo "selected"; 
                                    ?>>Negro</option>
                                    <option value="Rojo"<?php if ($color == "Rojo") echo "selected"; 
                                    ?>>Rojo</option>
                                    <option value="Azul"<?php if ($color == "Azul") echo "selected"; 
                                    ?>>Azul</option>
                                    <option value="Naranja"<?php if ($color == "Naranja") echo "selected"; 
                                    ?>>Naranja</option>
                                    <option value="Gris"<?php if ($color == "Gris") echo "selected"; 
                                    ?>>Gris</option>
                                </select>
                            </div>
                            <label >Tipo de motor:</label><br>

                            <div class="form-check">    
                                <input type="radio" name="motor" value="Nafta" id="motor1" class="form-check-input" <?php if ($motor == "Nafta") echo "checked"; 
                                    ?>/>
                                <label class="form-check-label" for="motor1">Nafta</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="motor" value="Gasoil" id="motor2"  class="form-check-input" <?php if ($motor == "Gasoil") echo "checked"; 
                                    ?>/>
                                <label class="form-check-label" for="motor2">Gasoil</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="motor" value="Eléctrico" id="motor3"  class="form-check-input" <?php if ($motor == "Eléctrico") echo "checked"; 
                                    ?>/>
                                <label class="form-check-label" for="motor3">Eléctrico</label>
                            </div>
                            <br><label>Accesorios:</label><br>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="accesorios[]" value="Airbag" id="cbx1" <?php $acc = explode(" | ", $accesorios); if (in_array('Airbag', $acc)) echo "checked"; 
                                    ?>/>
                                <label class="form-check-label" for="cbx1">Airbag</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="accesorios[]" value="Frenos-Abs" id="cbx2"<?php $acc = explode(" | ", $accesorios); if (in_array('Frenos-Abs', $acc)) echo "checked"; 
                                    ?>/>
                                <label class="form-check-label" for="cbx2">Frenos abs</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="accesorios[]" value="Dirección-Asistida" id="cbx3" <?php $acc = explode(" | ", $accesorios); if (in_array('Dirección-Asistida', $acc)) echo "checked"; 
                                    ?>/>
                                <label class="form-check-label" for="cbx3">Dirección asistida</label>
                            </div>

                            <div class="form-group">
                                <br>
                                <label>Observaciones</label>
                                <textarea name="observaciones" cols="40" rows="4" class="form-control"><?php echo $observaciones; ?></textarea>
                            </div>
                            <input type="submit" name="actualizar" value="Actualizar" class="btn btn-success btn-block"/>
                    </form>
                </div>
        </div>
    </div>
</div>

<?php include("footer.php")?>