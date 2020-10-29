<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio1-Página-1</title>
        <link rel="stylesheet" href="css/estilos.css">
    </head>
    <body>
        <h4 style="text-align: center; font-size: 18pt" class="tipografia">Para generar la matriz, debe ingresar dos valores iguales. </h4>
        <div class="contenedor">
            <form action="Ejercicio1-pag2.php" method="post" class="formulario">
                <label class="tipografia">VALOR 1:</label>
                <input class="cajita" type="number" name="valor1" id="valor1" placeholder="ingrese el valor 1"/>   
                <br><br>
                <label class="tipografia">VALOR 2:</label>
                <input class="cajita" type="number" name="valor2" id="valor2" placeholder="ingrese el valor 2"/>
                <br><br>
                <input type="hidden" value="true" name="envio" id="envio"/>
                <input class="submit" type="submit" value="Enviar">
            </form>
        </div>
    </body>
</html>