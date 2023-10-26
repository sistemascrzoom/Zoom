<?php
include "conexion.php";
require_once "vendor/autoload.php";
# Indicar que usaremos el IOFactory
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
$i=1;
$rutaArchivo="data/paises/Brasil.xlsx";
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'Laboratorio_BR');
$sheet->setCellValue('B1', 'Laboratorio');
$sheet->setCellValue('C1', 'Descripcion');
$sheet->setCellValue('D1', 'ITEM');
$sheet->setCellValue('E1', 'Mercado');
$sheet->setCellValue('F1', 'Sub_mercado');
$sheet->setCellValue('G1', 'Atributo_categoria');
/////////////////////////////////////////////
$documento = IOFactory::load($rutaArchivo);
$indiceHoja = 1;
$hojaActual = $documento->getSheet($indiceHoja);
$row = $hojaActual->getHighestRow();
$columna_2 = 2;
$columna_3 = 3;
$columna_4 = 4;
$columna_5 = 5;
$columna_6 = 6;
$columna_7 = 7;
$columna_8 = 8;
$valuni = (($row-1)/2)+2;
$filval = $valuni;
?>
<link rel="stylesheet" href="estilo.css">
<?php
$i=2;
$a=0;
/*function Quitar_Espacios($cadena)
{
    return preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $cadena);
}*/
for ($fila=2;$fila<=$valuni;$fila++)
{
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
  $cc5 = $celda_5->getFormattedValue();
  $c5 = ltrim($cc5, "0");
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
  $query = mysqli_query($conexion, "SELECT ITEM FROM master_latam WHERE ITEM = '$c5'");
  $data = mysqli_fetch_array($query);
  $res = mysqli_num_rows($query);
  if ($res == 0)
  {
    echo "<div class='centro'>Se encontró un nuevo producto, su ITEM es:" . " " . $c5 . "</div>";
    echo "<br>";
    $sheet->setCellValue('A'. $i, $c2);
    $sheet->setCellValue('B'. $i, $c3);
    $sheet->setCellValue('C'. $i, $c4);
    $sheet->setCellValue('D'. $i, $c5);
    $sheet->setCellValue('E'. $i, $c6);
    $sheet->setCellValue('F'. $i, $c7);
    $sheet->setCellValue('G'. $i, $c8);
    $i++;
  }
  else
  {
    for ($columna_f=9;$columna_f<=32;$columna_f++)
    {
        /////////////////////////////////////
        $ITEM = $data['ITEM'];
        $celda_fecha = $hojaActual->getCellByColumnAndRow($columna_f, 1);
        $fechac = $celda_fecha->getValue();
        $año=substr($fechac,0,4);
        $mes=substr($fechac,-2);
        $fecha = $año . "-" . $mes . "-" . "01";
        ////////////////////////////////////////
        $celda_uni = $hojaActual->getCellByColumnAndRow($columna_f, $fila);
        $uni = $celda_uni->getValue();
        ////////////////////////////////////////
        $celda_val = $hojaActual->getCellByColumnAndRow($columna_f, $filval);
        $val = $celda_val->getValue();
        /////////////////////////////////////////////////////////////////////////
          $queryex = mysqli_query($conexion, "SELECT ITEM FROM brasil WHERE ITEM = '$ITEM' AND Fecha = '$fecha'");
          $dataex = mysqli_fetch_array($queryex);
          $res1 = mysqli_num_rows($queryex);
          if ($res1 == 0)
          {
              $sql_brasil = "INSERT INTO brasil(
              Laboratorio_BR,
              Laboratorio,
              Descripcion,
              ITEM,
              Mercado,
              Sub_mercado,
              Atributo_categoria,
              Fecha,
              Valor,
              Unidades)
              VALUES(
              '$c2',
              '$c3',
              '$c4',
              '$c5',
              '$c6',
              '$c7',
              '$c8',
              '$fecha',
              '$val',
              '$uni')";
              $query = mysqli_query($conexion,$sql_brasil);
            $a++;
          }
      }
      $filval++;
  }
}
echo "<br>";
echo "<div class='centro'>Carga completada</div>";
echo "<br>";
echo "<br>";
echo "<div class='centro'>se cargaron: " . number_format($a,2) . " " . "registros</div>";
echo "<br>";
// Establecer las cabeceras para descargar el archivo
$filePath = "data/xls/nuevo-brasil.xlsx";
$writer = new Xlsx($spreadsheet);
$writer->save($filePath);
?>
<br>
<div class="centro">
<button class="regresar" onclick="window.location.href = 'index.php';">Regresar</button>
</div>
