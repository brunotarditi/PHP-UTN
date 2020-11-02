<!-- Leer y Escribir Archivos.
Investigue como escribir el siguiente texto en php
Ejemplo-de-escritura-de-un-archivo-de-php
Posteriormente investigue como leer el archivo escrito anteriormente con php, proceda a leerlo, muestre la cadena por pantalla, luego separe la cadena aplicando una separación mediante el guion medio – y muestre cada una de las palabras por separado. -->


<!--ESCRITURA-->
<?php

$escritura = fopen("filePHP.txt", "w");
$texto = "Ejemplo-de-escritura-de-un-archivo-de-php";
fwrite($escritura, $texto);
fclose($escritura);

?>
<!--LECTURA-->
<?php
$lectura = fopen("filePHP.txt", "r");
$cadena = fread($lectura, filesize("filePHP.txt"));
echo '<p align="center" style="font-family: Arial; font-size: 16pt">'.$cadena.'</p>';
$array = explode("-", $cadena);
foreach ($array as $value) {
    echo '<p align="center" style="font-family: Arial; font-size: 16pt">'.$value."</p>";
}
fclose($lectura);
?>
