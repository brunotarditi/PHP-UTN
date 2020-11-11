<?php include ("conexion.php"); ?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Generar Excel con php</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    </head>
    <body>
        <div class="row mt-5 justify-content-center">
            <div class="col-3 px-4 py-4" style="background-color: #A8CADA">
                <form action="generarExcel.php">
                    <div class="form-group">
                        <label>País:</label>
                        <input type="text" class="form-control" name="pais" id="pais"/>
                    </div>
                    <div class="form-group">
                        <label>Regiones:</label>
                        <select class="form-control" name="region" id="region">
                            <option value=""></option>  
                            <?php
                            $sql = "SELECT DISTINCT region FROM country";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <option><?php echo $row['region']; ?></option>
                                <?php }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success" name="excel" formaction="generarExcel.php">Generar Excel</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
