<?php
include "conexion.php";
require_once "vendor/autoload.php";
# Indicar que usaremos el IOFactory
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
$i=1;
$rutaArchivo="data/paises/Mexico.xlsx";
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'MercadoID');
$sheet->setCellValue('B1', 'MERCADO');
$sheet->setCellValue('C1', 'SEGMENTO1');
$sheet->setCellValue('D1', 'SEGMENTO2');
$sheet->setCellValue('E1', 'SEGMENTO3');
$sheet->setCellValue('F1', 'PRESENTACION');
$sheet->setCellValue('G1', 'ITEM');
$sheet->setCellValue('H1', 'CT');
$sheet->setCellValue('I1', 'NOM_CT');
$sheet->setCellValue('J1', 'LAB');
$sheet->setCellValue('K1', 'PROPIOS BDF');
$sheet->setCellValue('L1', 'FECHA');
$sheet->setCellValue('M1', 'VALOR');
$sheet->setCellValue('N1', 'UNIDADES');
$documento = IOFactory::load($rutaArchivo);
$indiceHoja = 0;
$hojaActual = $documento->getSheet($indiceHoja);
$row = $hojaActual->getHighestRow();
$columna_1 = 1;
$columna_2 = 2;
$columna_3 = 3;
$columna_4 = 4;
$columna_5 = 5;
$columna_6 = 6;
$columna_7 = 7;
$columna_8 = 8;
$columna_9 = 9;
$columna_10 = 10;
$columna_11 = 11;
$columna_12 = 12;
$columna_13 = 13;
$columna_14 = 14;
$columna_15 = 15;
?>
<link rel="stylesheet" href="estilo.css">
<?php
$i=2;
$a=0;
for ($fila=3;$fila<=$row;$fila++)
{
  $celda_1 = $hojaActual->getCellByColumnAndRow($columna_1, $fila);
  $c1 = $celda_1->getValue();
  /////////////////////////////////////
  $celda_2 = $hojaActual->getCellByColumnAndRow($columna_2, $fila);
  $c2 = $celda_2->getValue();
  /////////////////////////////////////
  $celda_3 = $hojaActual->getCellByColumnAndRow($columna_3, $fila);
  $c3 = $celda_3->getValue();
  /////////////////////////////////////
  $celda_4 = $hojaActual->getCellByColumnAndRow($columna_4, $fila);
  $c4 = $celda_4->getValue();
  /////////////////////////////////////
  $celda_5 = $hojaActual->getCellByColumnAndRow($columna_5, $fila);
  $c5 = $celda_5->getValue();
  /////////////////////////////////////
  $celda_6 = $hojaActual->getCellByColumnAndRow($columna_6, $fila);
  $c6 = $celda_6->getValue();
  /////////////////////////////////////
  $celda_7 = $hojaActual->getCellByColumnAndRow($columna_7, $fila);
  $ITEMc = $celda_7->getFormattedValue();
  $c7 = ltrim($ITEMc, "0");
  /////////////////////////////////////
  $celda_8 = $hojaActual->getCellByColumnAndRow($columna_8, $fila);
  $c8 = $celda_8->getValue();
  /////////////////////////////////////
  $celda_9 = $hojaActual->getCellByColumnAndRow($columna_9, $fila);
  $c9 = $celda_9->getValue();
  /////////////////////////////////////
  $celda_10 = $hojaActual->getCellByColumnAndRow($columna_10, $fila);
  $c10 = $celda_10->getValue();
  /////////////////////////////////////
  $celda_11 = $hojaActual->getCellByColumnAndRow($columna_11, $fila);
  $c11 = $celda_11->getValue();
  /////////////////////////////////////
  $celda_12 = $hojaActual->getCellByColumnAndRow($columna_12, $fila);
  $c12 = $celda_12->getValue();
  /////////////////////////////////////
  $v=37;
  for ($u=13;$u<=37;$u++)
  {
    $celda_13 = $hojaActual->getCellByColumnAndRow($u, 1);
    $c13 = $celda_13->getValue();
    $celda_14 = $hojaActual->getCellByColumnAndRow($u, $fila);
    $c14 = $celda_14->getValue();
    $celda_15 = $hojaActual->getCellByColumnAndRow($v, $fila);
    $c15 = $celda_15->getValue();
    /////////////////////////////////////////////////////////////////////////
    $queryex = mysqli_query($conexion, "SELECT ITEM,FECHA FROM mexico WHERE ITEM = '$c7' AND FECHA = '$c13'");
    $dataex = mysqli_fetch_array($queryex);
    $res1 = mysqli_num_rows($queryex);
    if ($res1 == 0)
    {
        $sql_mexico = "INSERT INTO mexico(
        MercadoID,
        MERCADO,
        SEGMENTO1,
        SEGMENTO2,
        SEGMENTO3,
        PRESENTACION,
        ITEM,
        CT,
        NOM_CT,
        LAB,
        LABORATORIO,
        PROPIOS_BDF,
        FECHA,
        VALOR,
        UNIDADES)
        VALUES(
        '$c1',
        '$c2',
        '$c3',
        '$c4',
        '$c5',
        '$c6',
        '$c7',
        '$c8',
        '$c9',
        '$c10',
        '$c11',
        '$c12',
        '$c13',
        '$c14',
        '$c15')";
        $query = mysqli_query($conexion,$sql_mexico);
        $sql_mach = mysqli_query($conexion, "SELECT * FROM master_latam WHERE ITEM = '$c7'");
        $res = mysqli_num_rows($sql_mach);
        if ($res == 0)
        {
          echo "<div class='centro'>Se encontró un nuevo producto, su ITEM es:" . " " . $c7 . "</div>";
          echo "<br>";
          $sheet->setCellValue('A'. $i, $c1);
          $sheet->setCellValue('B'. $i, $c2);
          $sheet->setCellValue('C'. $i, $c3);
          $sheet->setCellValue('D'. $i, $c4);
          $sheet->setCellValue('E'. $i, $c5);
          $sheet->setCellValue('F'. $i, $c6);
          $sheet->setCellValue('G'. $i, $c7);
          $sheet->setCellValue('H'. $i, $c8);
          $sheet->setCellValue('I'. $i, $c9);
          $sheet->setCellValue('J'. $i, $c10);
          $sheet->setCellValue('K'. $i, $c11);
          $sheet->setCellValue('L'. $i, $c12);
          $sheet->setCellValue('M'. $i, $c13);
          $sheet->setCellValue('N'. $i, $c14);
          $sheet->setCellValue('O'. $i, $c15);
          $i++;
        }
      $a++;
    }
    $v++;
  }
}
echo "<br>";
echo "<div class='centro'>Carga completada</div>";
echo "<br>";
echo "<br>";
echo "<div class='centro'>se cargaron: " . number_format($a,2) . " " . "registros</div>";
echo "<br>";
// Establecer las cabeceras para descargar el archivo
$filePath = "data/xls/nuevo-mexico.xlsx";
$writer = new Xlsx($spreadsheet);
$writer->save($filePath);
?>
<br>
<div class="centro">
<button class="regresar" onclick="window.location.href = 'index.php';">Regresar</button>
</div>
