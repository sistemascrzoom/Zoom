<?php
include "conexion.php";
require_once "vendor/autoload.php";
# Indicar que usaremos el IOFactory
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
$i=1;
$rutaArchivo="data/paises/EcuadorP.csv";
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'ITEM');
$sheet->setCellValue('B1', 'FPS');
$sheet->setCellValue('C1', 'MARCA');
$sheet->setCellValue('D1', 'CATEGORIA');
$sheet->setCellValue('E1', 'SUBCATEGORIA');
$sheet->setCellValue('F1', 'SEGMENTO');
$sheet->setCellValue('G1', 'SUBSEGMENTO');
$sheet->setCellValue('H1', 'Grupo_Mexico');
$sheet->setCellValue('I1', 'Grupo_Mexico_2');
$sheet->setCellValue('J1', 'FABRICANTE_ANALISIS_GLORIA');
/////////////////////////////////////////////
$documento = IOFactory::load($rutaArchivo);
$indiceHoja = 0;
$hojaActual = $documento->getSheet($indiceHoja);
$row = $hojaActual->getHighestRow();
$columna_1 = 1;
$columna_3 = 3;
$columna_4 = 4;
$columna_5 = 5;
$columna_6 = 6;
$columna_7 = 7;
$columna_8 = 8;
$columna_9 = 9;
$columna_10 = 10;
$columna_11 = 11;
$columna_v = 154;
?>
<link rel="stylesheet" href="estilo.css">
<?php
$i=2;
$a=0;
/*function Quitar_Espacios($cadena)
{
    return preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $cadena);
}*/
for ($fila=3;$fila<=$row;$fila++)
{
  /////////////////////////////////////
  $celda_1 = $hojaActual->getCellByColumnAndRow($columna_1, $fila);
  $cc1 = $celda_1->getFormattedValue();
  $c1 = ltrim($cc1, "0");
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
  $c7 = $celda_7->getValue();
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
  $query = mysqli_query($conexion, "SELECT ITEM,Descripcion FROM master_latam WHERE ITEM = '$c1'");
  $data = mysqli_fetch_array($query);
  $res = mysqli_num_rows($query);
  if ($res == 0)
  {
    echo "<div class='centro'>Se encontró un nuevo producto, su ITEM es:" . " " . $c1 . "</div>";
    echo "<br>";
    $sheet->setCellValue('A'. $i, $c1);
    $sheet->setCellValue('B'. $i, $c3);
    $sheet->setCellValue('C'. $i, $c4);
    $sheet->setCellValue('D'. $i, $c5);
    $sheet->setCellValue('E'. $i, $c6);
    $sheet->setCellValue('F'. $i, $c7);
    $sheet->setCellValue('G'. $i, $c8);
    $sheet->setCellValue('H'. $i, $c9);
    $sheet->setCellValue('I'. $i, $c10);
    $sheet->setCellValue('J'. $i, $c11);
    $i++;
  }
  else
  {
    for ($columna_u=93;$columna_u<=116;$columna_u++)
    {
        /////////////////////////////////////
        $ITEM = $data['ITEM'];
        $Desc = $data['Descripcion'];
        $celda_fecha = $hojaActual->getCellByColumnAndRow($columna_u, 2);
        $fechac = $celda_fecha->getValue();
        $año=substr($fechac,6,4);
        $mes=substr($fechac,3,2);
        $fecha = $año . "-" . $mes . "-" . "01";
        ////////////////////////////////////////
        $celda_uni = $hojaActual->getCellByColumnAndRow($columna_u, $fila);
        $uni = $celda_uni->getValue();
        ////////////////////////////////////////
        $celda_val = $hojaActual->getCellByColumnAndRow($columna_v, $fila);
        $val = $celda_val->getValue();
        $columna_v++;
        /////////////////////////////////////////////////////////////////////////
          $queryex = mysqli_query($conexion, "SELECT ITEM FROM ecuador WHERE ITEM = '$ITEM' AND FECHA = '$fecha'");
          $dataex = mysqli_fetch_array($queryex);
          $res1 = mysqli_num_rows($queryex);
          if ($res1 == 0)
          {
              $sql_ecuador = "INSERT INTO ecuador(
              ITEM,
              DESC_PRESENTACION,
              FPS,
              MARCA,
              CATEGORIA,
              SUBCATEGORIA,
              SEGMENTO,
              SUBSEGMENTO,
              Grupo_Mexico,
              Grupo_Mexico_2,
              FABRICANTE_ANALISIS_GLORIA,
              FECHA,
              UNIDADES,
              VALOR)
              VALUES(
              '$c1',
              '$Desc',
              '$c3',
              '$c4',
              '$c5',
              '$c6',
              '$c7',
              '$c8',
              '$c9',
              '$c10',
              '$c11',
              '$fecha',
              '$uni',
              '$val')";
              $query = mysqli_query($conexion,$sql_ecuador);
            $a++;
          }
      }
  }
}
echo "<br>";
echo "<div class='centro'>Carga completada</div>";
echo "<br>";
echo "<br>";
echo "<div class='centro'>se cargaron: " . number_format($a,2) . " " . "registros</div>";
echo "<br>";
// Establecer las cabeceras para descargar el archivo
$filePath = "data/xls/nuevo-ecuador.xlsx";
$writer = new Xlsx($spreadsheet);
$writer->save($filePath);
?>
<br>
<div class="centro">
<button class="regresar" onclick="window.location.href = 'index.php';">Regresar</button>
</div>
