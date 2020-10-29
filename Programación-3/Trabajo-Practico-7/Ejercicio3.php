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
echo $cadena."<br>";
$array = explode("-", $cadena);
foreach ($array as $value) {
    echo $value. "<br>";
}
fclose($lectura);
?>
