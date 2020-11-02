<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio1-Página-2</title>
        <style>
            table {
                width: 50%;
                font-size: 12pt;
                margin: auto;
            }
            table, td {
                border: 1px solid #000D1C;
                border-collapse: collapse;
                text-align: center;
                table-layout: fixed;
            }

            .seleccionado {
                background-color: #1276EF;
                font-weight: bold;
                color: white;
            }
        </style>

    </head>
    <body>
        <div class="contain">
            <table>
                <?php
                if ($_POST['valor1'] != NULL && $_POST['valor2'] != NULL) { //Corroboro que posiblemente no se envien datos
                    $valor1 = $_POST['valor1']; //Recupero el valor 1
                    $valor2 = $_POST['valor2']; //Recupero el valor 2
                    $matriz = array(); //Declaro un array para generar luego la matriz
                    if ($_POST['valor1'] != $_POST['valor2']) { //Valido que los valores sean iguales
                        echo '<p align="center" style="font-family: Arial; font-size: 16pt">Los valores no son iguales</p>'; //Si son distintos emito un mensaje
                    } else { //Si no, con un for busco la diagonal inversa
                        echo '<h3 align=center style="font-family: Arial">La matriz identidad inversa simétrica es: </h3><br>';
                        for ($i = 0; $i < $valor1; $i++) {
                            echo '<tr>';
                            for ($j = 0; $j < $valor2; $j++) {
                                if ($i + $j == $valor1 - 1) {
                                    echo '<td class="seleccionado style="font-family: Arial">' . $matriz[$i][$j] = 1 . '</td>';
                                } else {
                                    echo '<td style="font-family: Arial">' . $matriz[$i][$j] = 0 . '</td>';
                                }
                            }

                            echo '<tr>';
                        }
                    }
                } else {
                    echo '<p align="center" style="font-family: Arial;font-size: 16pt">No se enviaron valores.</p>'; //Emito mensaje que no se envió ningún dato
                }
                ?>
            </table>
        </div>
    </body>
</html>