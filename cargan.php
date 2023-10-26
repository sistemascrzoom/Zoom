<?php
include "conexion.php";
require_once "vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\IOFactory;
$i=1;
$rutaArchivo="data/xls/layout.csv";
$documento = IOFactory::load($rutaArchivo);
$indiceHoja = 0;
$hojaActual = $documento->getSheet($indiceHoja);
$row = $hojaActual->getHighestRow();
$columna_ITEM = 2;
$columna_Mercado = 3;
$columna_Sub_mercado = 4;
$columna_Atributo_categoria = 5;
$columna_Laboratorio = 6;
$columna_Laboratorio_completo = 7;
$columna_Descripcion = 8;
$columna_Sun_file = 9;
$columna_Pais = 10;
$columna_Mineralno_mineral = 11;
$columna_Tracker = 12;
$columna_TrackerD = 13;
$a=0;
for ($fila=2;$fila<=$row;$fila++)
{
  $celda_2 = $hojaActual->getCellByColumnAndRow($columna_ITEM, $fila);
  $ITEM = $celda_2->getValue();
  /////////////////////////////////////
  $celda_3 = $hojaActual->getCellByColumnAndRow($columna_Mercado, $fila);
  $Mercado = $celda_3->getValue();
  /////////////////////////////////////
  $celda_4 = $hojaActual->getCellByColumnAndRow($columna_Sub_mercado, $fila);
  $Sub_mercado = $celda_4->getValue();
  /////////////////////////////////////
  $celda_5 = $hojaActual->getCellByColumnAndRow($columna_Atributo_categoria, $fila);
  $Atributo_categoria = $celda_5->getValue();
  /////////////////////////////////////
  $celda_6 = $hojaActual->getCellByColumnAndRow($columna_Laboratorio, $fila);
  $Laboratorio = $celda_6->getValue();
  /////////////////////////////////////
  $celda_7 = $hojaActual->getCellByColumnAndRow($columna_Laboratorio_completo, $fila);
  $Laboratorio_completo = $celda_7->getValue();
  /////////////////////////////////////
  $celda_8 = $hojaActual->getCellByColumnAndRow($columna_Descripcion, $fila);
  $Descripcion = $celda_8->getValue();
  /////////////////////////////////////
  $celda_9 = $hojaActual->getCellByColumnAndRow($columna_Sun_file, $fila);
  $Sun_file = $celda_9->getValue();
  /////////////////////////////////////
  $celda_10 = $hojaActual->getCellByColumnAndRow($columna_Pais, $fila);
  $Pais = $celda_10->getValue();
  /////////////////////////////////////
  $celda_11 = $hojaActual->getCellByColumnAndRow($columna_Mineralno_mineral, $fila);
  $Mineral = $celda_11->getValue();
  /////////////////////////////////////
  $celda_12 = $hojaActual->getCellByColumnAndRow($columna_Tracker, $fila);
  $Tracker = $celda_12->getValue();
  /////////////////////////////////////
  $celda_13 = $hojaActual->getCellByColumnAndRow($columna_TrackerD, $fila);
  $TrackerD = $celda_13->getValue();
  /////////////////////////////////////
  $sql_guardar = "INSERT INTO master_latam(
  ITEM,
  Mercado,
  Sub_mercado,
  Atributo_categoria,
  Laboratorio,
  Laboratorio_completo,
  Descripcion,
  Sun_file,
  Pais,
  Mineralno_mineral,
  Tracker,
  Tracker_descripcion) VALUES(
  '$ITEM',
  '$Mercado',
  '$Sub_mercado',
  '$Atributo_categoria',
  '$Laboratorio',
  '$Laboratorio_completo',
  '$Descripcion',
  '$Sun_file',
  '$Pais',
  '$Mineral',
  '$Tracker',
  '$TrackerD')";
  $query = mysqli_query($conexion,$sql_guardar);
  $a++;
}
echo "<br>";
echo "<div class='centro'>Carga completada</div>";
echo "<br>";
echo "<br>";
echo "<div class='centro'>se cargaron: " . $a . " " . "producto(s)</div>";
echo "<br>";
?>
<br>
<div class="centro">
<button class="regresar" onclick="window.location.href = 'index.php';">Regresar</button>
</div>
