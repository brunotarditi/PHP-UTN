<!-- Seleccione un objeto de la vida real (auto, factura, cliente, alumno, etc) y codifique un formulario 
de carga que lo represente el cual debe incluir al menos 2 cajas de texto, un combo (select), opciones de 
radio button, check-box y un text área. Cree la tabla (una sola tabla) de base de datos MySQL u otro motor, 
que se corresponda a los datos del formulario y mediante PHP codifique la lógica necesaria para mostrar los 
datos de la tabla en una grilla HTML y agregar las opciones que permitan ejecutar un insert, update o delete 
de SQL del objeto elegido.-->

<?php include ("conexion.php"); ?>

<?php include ("header.php"); ?>

<nav class="navbar navbar-dark bg-info">
    <div class="container">
    <a class="navbar-brand" href="formulario.php">Formulario de Autos con PHP</a>
    </div>
</nav>

<div class="container p-4 ">
    <div class="row align-items-center justify-content-center ">
        <div class="col-md-5">


            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                session_unset();
            }
            ?>


            <div class="card card-body bg-light">
                <form action="guardar.php" method="POST">
                    <div class="form-group">
                        <label>Marca</label>
                        <input type="text" name="marca" id="marca" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>Modelo</label>
                        <input type="text" name="modelo" id="modelo" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <br>
                        <label>Color</label>
                        <select name="color" id="color" class="form-control">
                            <option value="">Seleccione el color</option>
                            <option value="Blanco">Blanco</option>
                            <option value="Negro">Negro</option>
                            <option value="Rojo">Rojo</option>
                            <option value="Azul">Azul</option>
                            <option value="Naranja">Naranja</option>
                            <option value="Gris">Gris</option>
                        </select>
                    </div>
                    <label >Tipo de motor:</label><br>

                    <div class="form-check">    
                        <input type="radio" name="motor" value="Nafta" id="motor1" class="form-check-input"/>
                        <label class="form-check-label" for="motor1">Nafta</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="motor" value="Gasoil" id="motor2"  class="form-check-input"/>
                        <label class="form-check-label" for="motor2">Gasoil</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="motor" value="Eléctrico" id="motor3"  class="form-check-input"/>
                        <label class="form-check-label" for="motor3">Eléctrico</label>
                    </div>
                    <br><label>Accesorios:</label><br>
                    
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="accesorios[]" value="Airbag" id="cbx1"/>
                        <label class="form-check-label" for="cbx1">Airbag</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="accesorios[]" value="Frenos-Abs" id="cbx2"/>
                        <label class="form-check-label" for="cbx2">Frenos abs</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="accesorios[]" value="Dirección-Asistida" id="cbx3"/>
                        <label class="form-check-label" for="cbx3">Dirección asistida</label>
                    </div>

                    <div class="form-group">
                        <br>
                        <label>Observaciones</label>
                        <textarea name="observaciones" cols="40" rows="4" class="form-control"></textarea>
                    </div>
                    <input type="submit" name="guardar" value="Guardar" class="btn btn-success btn-block"/>
                </form>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
    <div class="col-md-12">
        <table class="table table-bordered bg-light">
            <thead>
                <tr>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Color</th>
                    <th>Motor</th>
                    <th>Accesorios</th>
                    <th>Observaciones</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM automoviles";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>

                        <tr>
                            <td><?php echo $row['marca']; ?></td>
                            <td><?php echo $row['modelo']; ?></td>
                            <td><?php echo $row['color']; ?></td>
                            <td><?php echo $row['motor']; ?></td>
                            <td><?php echo $row['accesorios']; ?></td>
                            <td><?php echo $row['observaciones']; ?></td>
                            
                            <td>
                                <a href="editar.php?id=<?php echo $row['id']?>" class="btn btn-secondary"> 
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="eliminar.php?id=<?php echo $row['id']?>" class="btn btn-danger"> 
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>

                        </tr>

                    <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</div>



<?php include ("footer.php"); ?>   







