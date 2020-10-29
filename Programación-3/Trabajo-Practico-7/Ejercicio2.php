<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio-2</title>
        <link rel="stylesheet" href="css/estilos.css">
    </head>

    <body>
        <div class="contenedor">
            <form action="Ejercicio2.php" method="post" class="formulario">
                <label class="tipografia" style="font-size: 18pt">Ingrese una cadena de texto: </label>
                <br><br>
                <input class="cajita" type="text" name="cadena" id="cadena" style="align-: center"/>
                <br><br>
                <input type="hidden" name="requerido" id="requerido" value="true">
                <input type="submit" value="Enviar" class="boton"/>      

            </form>
        </div>
        <br>
    </body>
</html>

<?php
if (!empty($_POST['requerido']) && $_POST['requerido'] == true) {

    if (empty($_POST['cadena'])) {
        echo '<p align="center" class="tipografia" style="font-size: 12pt">Debe ingresar una cadena de texto.</p>';
    } else {
        $cadena = $_POST['cadena']; //Recupero el valor de la cadena
        $array = str_split($cadena); //genero un array de las letras que componen la cadena
        foreach ($array as $posicion => $value) { //Recorro y muestro cada una de las letras del array
            echo '<p align="center" class="tipografia" style="font-size: 12pt">Posición: ' . $posicion . " = Letra: " . $value . "</p>";
        }
    }
}
?>
