<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio1-Página-2</title>
        <style>
            .tabla{
                margin: auto;
                width: 50%;
                border: 1px;
                border-color: black;               
            }

        </style>
    </head>
    <body>

        <table  class="tabla" border="1">
            <?php
            if ($_POST['valor1'] != NULL && $_POST['valor2'] != NULL) { //Corroboro que posiblemente no se envien datos
                $valor1 = $_POST['valor1']; //Recupero el valor 1
                $valor2 = $_POST['valor2']; //Recupero el valor 2
                $matriz = array(array($valor1), array($valor2)); //Genero un arreglo de dos dimensiones con los valores
                if ($_POST['valor1'] != $_POST['valor2']) { //Valido que los valores sean iguales
                    echo 'Los valores no son iguales'; //Si son distintos emito un mensaje
                } else { //Si no, con un for busco la diagonal inversa
                    echo '<h3 align=center>La matriz identidad inversa simétrica es: </h3><br>';
                    for ($i = 0; $i < $valor1; $i++) {
                        echo '<tr>';
                        for ($j = 0; $j < $valor2; $j++) {
                            if ($i + $j == $valor1 - 1) {
                                echo '<td style="background-color: #046AAE; color: white">' . $matriz[$i][$j] = 1 . '</td>';
                            } else {
                                echo '<td>' . $matriz[$i][$j] = 0 . '</td>';
                            }
                        }

                        echo '<tr>';
                    }
                }
            } else {
                echo 'No se enviaron valores.'; //Emito mensaje que no se envió ningún dato
            }

            ?>
        </table>
    </body>
</html>