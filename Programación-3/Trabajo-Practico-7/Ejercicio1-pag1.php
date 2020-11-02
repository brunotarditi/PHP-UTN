<!-- 1- PHP Cree un FORMULARIO HTML que permita cargar 2 campos VALOR1 (numérico) y VALOR2 (numérico), envié los datos a una segunda página, mediante PHP recupere los datos. Valide que Valor1 y Valor2 sean iguales
 Genere la matriz identidad inversa simétrica de orden VALOR1 X VALOR2. Muestre la matriz por pantalla mediante HTML.-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio1-Página-1</title>
        <link rel="stylesheet" href="css/estilos.css">
    </head>
    <body>
        <h4 style="text-align: center; font-size: 18pt" class="tipografia">Para generar la matriz, debe ingresar dos valores iguales. </h4>
        <div class="contain">
            <form action="Ejercicio1-pag2.php" method="post" class="form2">
                <label class="tipografia">VALOR 1:</label>
                <input class="box" type="number" name="valor1" id="valor1" placeholder="ingrese el valor 1"/>   
                <br><br>
                <label class="tipografia">VALOR 2:</label>
                <input class="box" type="number" name="valor2" id="valor2" placeholder="ingrese el valor 2"/>
                <br><br>
                <input type="hidden" value="true" name="envio" id="envio"/>
                <input class="submit2" type="submit" value="Enviar">
            </form>
        </div>
    </body>
</html>