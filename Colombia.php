<?php
include "conexion.php";
require_once "vendor/autoload.php";
# Indicar que usaremos el IOFactory
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
$i=1;
$rutaArchivo="data/paises/Colombia/ColombiaU.csv";
$rutaArchivo2="data/paises/Colombia/ColombiaV.csv";
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'CATEGORIA');
$sheet->setCellValue('B1', 'SUBCATEGORIA');
$sheet->setCellValue('C1', 'PRESENTACION');
$sheet->setCellValue('D1', 'PRODUCTO');
$sheet->setCellValue('E1', 'BRAND');
$sheet->setCellValue('F1', 'LABORATORIO');
/////////////////////////////////////////////
$documento = IOFactory::load($rutaArchivo);
$indiceHoja = 0;
$hojaActual = $documento->getSheet($indiceHoja);
////////////////////////////////////////////
$documento2 = IOFactory::load($rutaArchivo2);
$indiceHoja2 = 0;
$hojaActual2 = $documento2->getSheet($indiceHoja2);
$row = $hojaActual->getHighestRow();
$columna_cat = 1;
$columna_scat = 2;
$columna_pre = 3;
$columna_pro = 4;
$columna_brand = 5;
$columna_lab = 6;
?>
<link rel="stylesheet" href="estilo.css">
<?php
$i=2;
$a=0;
function Quitar_Espacios($cadena)
{
    return preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $cadena);
}
for ($fila=2;$fila<=$row;$fila++)
{
  $celda_cat = $hojaActual->getCellByColumnAndRow($columna_cat, $fila);
  $cat = $celda_cat->getValue();
  /////////////////////////////////////
  $celda_scat = $hojaActual->getCellByColumnAndRow($columna_scat, $fila);
  $scat = $celda_scat->getValue();
  /////////////////////////////////////
  $celda_pre = $hojaActual->getCellByColumnAndRow($columna_pre, $fila);
  $pre = $celda_pre->getValue();
  $pree=Quitar_Espacios($pre);
  /////////////////////////////////////
  $celda_pro = $hojaActual->getCellByColumnAndRow($columna_pro, $fila);
  $pro = $celda_pro->getValue();
  /////////////////////////////////////
  $celda_brand = $hojaActual->getCellByColumnAndRow($columna_brand, $fila);
  $brand = $celda_brand->getValue();
  /////////////////////////////////////
  $celda_lab = $hojaActual->getCellByColumnAndRow($columna_lab, $fila);
  $lab = $celda_lab->getValue();
  /////////////////////////////////////
  $query = mysqli_query($conexion, "SELECT * FROM master_latam WHERE Descripcion = '$pree'");
  $data = mysqli_fetch_array($query);
  $res = mysqli_num_rows($query);
  if ($res == 0)
  {
    echo "<div class='centro'>Se encontró un nuevo producto, su Descripcion es:" . " " . $pree . "</div>";
    echo "<br>";
    $sheet->setCellValue('A'. $i, $cat);
    $sheet->setCellValue('B'. $i, $scat);
    $sheet->setCellValue('C'. $i, $pre);
    $sheet->setCellValue('D'. $i, $pro);
    $sheet->setCellValue('E'. $i, $brand);
    $sheet->setCellValue('F'. $i, $lab);
    $i++;
  }
  else
  {
    for ($columna_f=8;$columna_f<=31;$columna_f++)
    {
        /////////////////////////////////////
        $ITEM = $data['ITEM'];
        $celda_fecha = $hojaActual->getCellByColumnAndRow($columna_f, 1);
        $fechac = $celda_fecha->getValue();
        $año=substr($fechac,6,4);
        $mes=substr($fechac,-2);
        $fecha = $año . "-" . $mes . "-" . "01";
        ////////////////////////////////////////
        $celda_uni = $hojaActual->getCellByColumnAndRow($columna_f, $fila);
        $uni = $celda_uni->getValue();
        ////////////////////////////////////////
        $celda_val = $hojaActual2->getCellByColumnAndRow($columna_f, $fila);
        $val = $celda_val->getValue();
        /////////////////////////////////////////////////////////////////////////
          $queryex = mysqli_query($conexion, "SELECT ITEM FROM colombia WHERE ITEM = '$ITEM' AND FECHA = '$fecha'");
          $dataex = mysqli_fetch_array($queryex);
          $res1 = mysqli_num_rows($queryex);
          if ($res1 == 0)
          {
              $sql_colombia = "INSERT INTO colombia(
              ITEM,
              CATEGORIA,
              SUBCATEGORIA,
              PRESENTACION,
              PRODUCTO,
              BRAND,
              LABORATORIO,
              FECHA,
              VALOR,
              UNIDADES)
              VALUES(
              '$ITEM',
              '$cat',
              '$scat',
              '$pree',
              '$pro',
              '$brand',
              '$lab',
              '$fecha',
              '$val',
              '$uni')";
              $query = mysqli_query($conexion,$sql_colombia);
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
$filePath = "data/xls/nuevo-colombia.xlsx";
$writer = new Xlsx($spreadsheet);
$writer->save($filePath);
?>
<br>
<div class="centro">
<button class="regresar" onclick="window.location.href = 'index.php';">Regresar</button>
</div>
