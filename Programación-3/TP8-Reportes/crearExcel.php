<?php

include ("conexion.php");
require __DIR__ . '/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
//Clase para escritura de archivos xlsx
use PhpOffice\PhpSpreadsheet\IOFactory;

if (isset($_POST['excel'])) {
    
    $pais = $_POST['pais'];
    $region = $_POST['region'];
    $sql = "SELECT ciudad.name cityName, ciudad.population, pais.name countryName, pais.region FROM city ciudad INNER JOIN country pais ON ciudad.CountryCode = pais.code WHERE pais.region = '" . $region . "' AND pais.name LIKE '%" . $pais . "%' ORDER BY pais.name";
    $result = $conn->query($sql)or die($conn->error);
    $fila = 2;

    //creamos un libro de trabajo
    $documento = new Spreadsheet();
    $documento
            ->getProperties()
            ->setCreator("Bruno Tarditi")
            ->setLastModifiedBy('Bruno Tarditi')
            ->setTitle('Documento creado con PhpSpreadSheet')
            ->setSubject('')
            ->setDescription('Este documento fue generado para la facultad')
            ->setKeywords('etiquetas o palabras clave separadas por espacios')
            ->setCategory('Categoria');
    $paises = "paises.xlsx";
    $hoja = $documento->getActiveSheet();
    $hoja->setCellValue('A1', 'cityName');
    $hoja->setCellValue('B1', 'cityPopulation');
    $hoja->setCellValue('C1', 'countryName');
    $hoja->setCellValue('D1', 'region');
    
    while ($row = $result->fetch_assoc()) {
        
        $hoja->setCellValue('A'.$fila, $row['cityName']);
        $hoja->setCellValue('B'.$fila, $row['population']);
        $hoja->setCellValue('C'.$fila, $row['countryName']);
        $hoja->setCellValue('D'.$fila, $row['region']);
        $fila++;
    }
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $paises . '"');
    header('Cache-Control: max-age=0');

    $writer = IOFactory::createWriter($documento, 'Xlsx');
    //Salvamos el archivo
    $writer->save('php://output');
}