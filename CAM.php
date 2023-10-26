<?php
include "conexion.php";
require_once "vendor/autoload.php";
# Indicar que usaremos el IOFactory
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
$i=1;
$rutaArchivo="data/paises/CAM.xlsx";
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'PAIS');
$sheet->setCellValue('B1', 'ORD');
$sheet->setCellValue('C1', 'MES');
$sheet->setCellValue('D1', 'RY');
$sheet->setCellValue('E1', 'YTD');
$sheet->setCellValue('F1', 'QTR');
$sheet->setCellValue('G1', 'QTR');
$sheet->setCellValue('H1', 'COD_REPORTE');
$sheet->setCellValue('I1', 'N_REPORTE');
$sheet->setCellValue('J1', 'COD_SEGMENTO');
$sheet->setCellValue('K1', 'N_SEGMENTO');
$sheet->setCellValue('L1', 'COD_COMPETIDOR');
$sheet->setCellValue('M1', 'N_COMPETIDOR');
$sheet->setCellValue('N1', 'COD_NDF');
$sheet->setCellValue('O1', 'PRODUCTO');
$sheet->setCellValue('P1', 'DESCRIPCION');
$sheet->setCellValue('Q1', 'LCH_FLAG');
$sheet->setCellValue('R1', 'PACKLCH');
$sheet->setCellValue('S1', 'UNITS');
$sheet->setCellValue('T1', 'VALUES_EUR');
$documento = IOFactory::load($rutaArchivo);
$indiceHoja = 1;
$hojaActual = $documento->getSheet($indiceHoja);
$row = $hojaActual->getHighestRow();
$columna_pais = 1;
$columna_2 = 2;
$columna_fecha = 3;
$columna_4 = 4;
$columna_5 = 5;
$columna_6 = 6;
$columna_7 = 7;
$columna_8 = 8;
$columna_nrep = 9;
$columna_codseg = 10;
$columna_nseg = 11;
$columna_codcom = 12;
$columna_ncom = 13;
$columna_ITEM = 14;
$columna_prod = 15;
$columna_des = 16;
$columna_17 = 17;
$columna_18 = 18;
$columna_uni = 19;
$columna_val = 20;
?>
<link rel="stylesheet" href="estilo.css">
<?php
$i=2;
$a=0;
for ($fila=2;$fila<=$row;$fila++)
{
  $celda_2 = $hojaActual->getCellByColumnAndRow($columna_2, $fila);
  $c2 = $celda_2->getValue();
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
  $c7 = $celda_7->getValue();
  /////////////////////////////////////
  $celda_8 = $hojaActual->getCellByColumnAndRow($columna_8, $fila);
  $c8 = $celda_8->getValue();
  /////////////////////////////////////
  $celda_17 = $hojaActual->getCellByColumnAndRow($columna_17, $fila);
  $c17 = $celda_17->getValue();
  /////////////////////////////////////
  $celda_18 = $hojaActual->getCellByColumnAndRow($columna_18, $fila);
  $c18 = $celda_18->getValue();
  /////////////////////////////////////
  $celda_nrep = $hojaActual->getCellByColumnAndRow($columna_nrep, $fila);
  $nrep = $celda_nrep->getValue();
  /////////////////////////////////////
  $celda_codseg = $hojaActual->getCellByColumnAndRow($columna_codseg, $fila);
  $codseg = $celda_codseg->getValue();
  /////////////////////////////////////
  $celda_nseg = $hojaActual->getCellByColumnAndRow($columna_nseg, $fila);
  $nseg = $celda_nseg->getValue();
  /////////////////////////////////////
  $celda_codcom = $hojaActual->getCellByColumnAndRow($columna_codcom, $fila);
  $codcom = $celda_codcom->getValue();
  /////////////////////////////////////
  $celda_ncom = $hojaActual->getCellByColumnAndRow($columna_ncom, $fila);
  $ncom = $celda_ncom->getValue();
  /////////////////////////////////////
  $celda_prod = $hojaActual->getCellByColumnAndRow($columna_prod, $fila);
  $prod = $celda_prod->getValue();
  /////////////////////////////////////
  $celda_des = $hojaActual->getCellByColumnAndRow($columna_des, $fila);
  $des = $celda_des->getValue();
  /////////////////////////////////////
  $celda_uni = $hojaActual->getCellByColumnAndRow($columna_uni, $fila);
  $uni = $celda_uni->getValue();
  /////////////////////////////////////
  $celda_val = $hojaActual->getCellByColumnAndRow($columna_val, $fila);
  $val = $celda_val->getValue();
  /////////////////////////////////////
  $celda_ITEM = $hojaActual->getCellByColumnAndRow($columna_ITEM, $fila);
  $ITEMc = $celda_ITEM->getFormattedValue();
  $ITEM = ltrim($ITEMc, "0");
  ///////////////////////////////////////////////////////////////////////
  $celda_pais = $hojaActual->getCellByColumnAndRow($columna_pais, $fila);
  $paisigla = $celda_pais->getValue();
  switch ($paisigla)
  {
    case 'COS':
    $pais="Costa Rica";
    break;
    case 'GUA':
    $pais="Guatemala";
    break;
    case 'PAN':
    $pais="Panama";
    break;
    case 'SAL':
    $pais="El salvador";
    break;
  }
  /////////////////////////////////////////////////////////////////////////
  $celda_fecha = $hojaActual->getCellByColumnAndRow($columna_fecha, $fila);
  $fechac = $celda_fecha->getValue();
  $año=substr($fechac,0,4);
  $mes=substr($fechac,-2);
  $fecha = $año . "-" . $mes . "-" . "01";
  /////////////////////////////////////////////////////////////////////////
  $queryex = mysqli_query($conexion, "SELECT ITEM,FECHA FROM cam WHERE ITEM = '$ITEM' AND FECHA = '$fecha' AND PAIS_MES = '$paisigla'");
  $dataex = mysqli_fetch_array($queryex);
  $res1 = mysqli_num_rows($queryex);
  if ($res1 == 0)
  {
      $sql_CAM = "INSERT INTO cam(ITEM, PAIS_MES, PAIS, FECHA, N_REPORTE, COD_SEGMENTO,N_SEGMENTO, COD_COMPETIDOR, N_COMPETIDOR, PRODUCTO, DESCRIPCION, UNIDADES, VALOR) VALUES('$ITEM','$paisigla','$pais','$fecha','$nrep','$codseg','$nseg','$codcom','$ncom','$prod','$des','$uni','$val')";
      $query = mysqli_query($conexion,$sql_CAM);
      $sql_mach = mysqli_query($conexion, "SELECT * FROM master_latam WHERE ITEM = '$ITEM'");
      $res = mysqli_num_rows($sql_mach);
      if ($res == 0)
      {
        echo "<div class='centro'>Se encontró un nuevo producto, su ITEM es:" . " " . $ITEM . "</div>";
        echo "<br>";
        $sheet->setCellValue('A'. $i, $paisigla);
        $sheet->setCellValue('B'. $i, $c2);
        $sheet->setCellValue('C'. $i, $fechac);
        $sheet->setCellValue('D'. $i, $c4);
        $sheet->setCellValue('E'. $i, $c5);
        $sheet->setCellValue('F'. $i, $c6);
        $sheet->setCellValue('G'. $i, $c7);
        $sheet->setCellValue('H'. $i, $c8);
        $sheet->setCellValue('I'. $i, $nrep);
        $sheet->setCellValue('J'. $i, $codseg);
        $sheet->setCellValue('K'. $i, $nseg);
        $sheet->setCellValue('L'. $i, $codcom);
        $sheet->setCellValue('M'. $i, $ncom);
        $sheet->setCellValue('N'. $i, $ITEM);
        $sheet->setCellValue('O'. $i, $prod);
        $sheet->setCellValue('P'. $i, $des);
        $sheet->setCellValue('Q'. $i, $c17);
        $sheet->setCellValue('R'. $i, $c18);
        $sheet->setCellValue('S'. $i, $uni);
        $sheet->setCellValue('T'. $i, $val);
        $i++;
      }
  $a++;
  }
}
echo "<br>";
echo "<div class='centro'>Carga completada</div>";
echo "<br>";
echo "<br>";
echo "<div class='centro'>se cargaron: " . number_format($a,2) . " " . "registros</div>";
echo "<br>";
// Establecer las cabeceras para descargar el archivo
$filePath = "data/xls/nuevo-CAM.xlsx";
$writer = new Xlsx($spreadsheet);
$writer->save($filePath);
?>
<br>
<div class="centro">
<button class="regresar" onclick="window.location.href = 'index.php';">Regresar</button>
</div>
