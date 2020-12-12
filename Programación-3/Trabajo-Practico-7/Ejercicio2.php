<!-- Arrays PHP Cree un formulario con una caja de texto que permita la carga de una cadena cualquiera y un botón submit, envié el texto ingresado a la propia página, recupere el texto con php y en base a la cadena ingresada cree un Array y almacene en cada posición cada una de las letras que componen la cadena, finalmente recorra mediante un foreach la cadena y muestre cada uno de los elementos. Investigue las funciones necesarias para lograr con éxito la operación. -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio-2</title>
        <link rel="stylesheet" href="css/estilos.css">
    </head>

    <body>
        <div class="contain">
            <form action="Ejercicio2.php" method="post" class="form2">
                <label class="tipografia" style="font-size: 18pt">Ingrese una cadena de texto: </label>
                <br><br>
                <input class="box" type="text" name="cadena" id="cadena" style="align-content: center"/>
                <br><br>
                <input type="submit" value="Enviar" class="submit1"/>      

            </form>
        </div>
        <br>
    </body>
</html>

<?php

if(isset($_POST['cadena'])){
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
