<?php
include "conexion.php";
require_once "vendor/autoload.php";
# Indicar que usaremos el IOFactory
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
$i=1;
$rutaArchivo="data/paises/Peru/peruU.csv";
$rutaArchivo2="data/paises/Peru/peruV.csv";
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'CATEGORIA');
$sheet->setCellValue('B1', 'SEGMENTO');
$sheet->setCellValue('C1', 'MARCA');
$sheet->setCellValue('D1', 'SKU');
/////////////////////////////////////////////
$documento = IOFactory::load($rutaArchivo);
$indiceHoja = 0;
$hojaActual = $documento->getSheet($indiceHoja);
$row = $hojaActual->getHighestRow();
////////////////////////////////////////////
$documento2 = IOFactory::load($rutaArchivo2);
$indiceHoja2 = 0;
$hojaActual2 = $documento2->getSheet($indiceHoja2);
$row2 = $hojaActual2->getHighestRow();
$columna_cat = 1;
$columna_seg = 2;
$columna_mar = 3;
$columna_sku = 4;
?>
<link rel="stylesheet" href="estilo.css">
<?php
$i=2;
$a=0;
function Quitar_Espacios($cadena)
{
    return preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $cadena);
}
////////////PERU UNIDADES//////////////
for ($fila=2;$fila<=$row;$fila++)
{
  $celda_cat = $hojaActual->getCellByColumnAndRow($columna_cat, $fila);
  $cat = $celda_cat->getValue();
  /////////////////////////////////////
  $celda_seg = $hojaActual->getCellByColumnAndRow($columna_seg, $fila);
  $seg = $celda_seg->getValue();
  /////////////////////////////////////
  $celda_mar = $hojaActual->getCellByColumnAndRow($columna_mar, $fila);
  $mar = $celda_mar->getValue();
  /////////////////////////////////////
  $celda_sku = $hojaActual->getCellByColumnAndRow($columna_sku, $fila);
  $sku = $celda_sku->getValue();
  $skuu=Quitar_Espacios($sku);
  $skuok = str_replace(array("#", "'"), '', $skuu);
  ///////////////////////////////////////
  ///////////////////////////////////////
  $celda_cat2 = $hojaActual2->getCellByColumnAndRow($columna_cat, $fila);
  $cat2 = $celda_cat2->getValue();
  /////////////////////////////////////
  $celda_seg2 = $hojaActual2->getCellByColumnAndRow($columna_seg, $fila);
  $seg2 = $celda_seg2->getValue();
  /////////////////////////////////////
  $celda_mar2 = $hojaActual2->getCellByColumnAndRow($columna_mar, $fila);
  $mar2 = $celda_mar2->getValue();
  /////////////////////////////////////
  $celda_sku2 = $hojaActual2->getCellByColumnAndRow($columna_sku, $fila);
  $sku2 = $celda_sku2->getValue();
  $skuu2=Quitar_Espacios($sku2);
  $skuok2 = str_replace(array("#", "'","º","°"), '', $skuu2);
  for ($columna_f=41;$columna_f<=66;$columna_f++)
  {
      /////////////////////////////////////
      //$ITEM = $data['ITEM'];
      $celda_fecha = $hojaActual->getCellByColumnAndRow($columna_f, 1);
      $fechac = $celda_fecha->getValue();
      $año=substr($fechac,6,4);
      $mes=substr($fechac,3,2);
      $fecha = $año . "-" . $mes . "-" . "01";
      ////////////////////////////////////////
      $celda_uni = $hojaActual->getCellByColumnAndRow($columna_f, $fila);
      $uni = $celda_uni->getValue();
      /////////////////////////////////////////////////////////////////////////
        $queryuni = mysqli_query($conexion, "SELECT * FROM peruu WHERE SKU = '$skuok' AND FECHA = '$fecha'");
        $res1 = mysqli_num_rows($queryuni);
        if ($res1 == 0)
        {
            $sql_peruu = "INSERT INTO peruu(
            CATEGORIA,
            SUBCAT,
            MARCA,
            SKU,
            FECHA,
            UNIDADES)
            VALUES(
            '$cat',
            '$seg',
            '$mar',
            '$skuok',
            '$fecha',
            '$uni')";
            $query = mysqli_query($conexion,$sql_peruu);
        }
        $celda_fecha2 = $hojaActual2->getCellByColumnAndRow($columna_f, 1);
        $fechac2 = $celda_fecha2->getValue();
        $año2=substr($fechac2,6,4);
        $mes2=substr($fechac2,3,2);
        $fecha2 = $año2 . "-" . $mes2 . "-" . "01";
        ////////////////////////////////////////
        $celda_val = $hojaActual2->getCellByColumnAndRow($columna_f, $fila);
        $val = $celda_val->getValue();
        /////////////////////////////////////////////////////////////////////////
          $queryval = mysqli_query($conexion, "SELECT * FROM peruv WHERE SKU = '$skuok2' AND FECHA = '$fecha'");
          $resval = mysqli_num_rows($queryval);
          if ($resval == 0)
          {
              $sql_peruv = "INSERT INTO peruv(
              CATEGORIA,
              SUBCAT,
              MARCA,
              SKU,
              FECHA,
              VALOR)
              VALUES(
              '$cat',
              '$seg',
              '$mar',
              '$skuok2',
              '$fecha',
              '$val')";
              $query = mysqli_query($conexion,$sql_peruv);
          }
    }
}
/////////////////////////////////////
  $peruv = mysqli_query($conexion, "SELECT * FROM peruv");
  $b=0;
  while($dperuv = mysqli_fetch_array($peruv))
  {
    if ($b==25)
    {
      $b=1;
    }
    $catv=$dperuv['CATEGORIA'];
    $segv=$dperuv['SUBCAT'];
    $marv=$dperuv['MARCA'];
    $skuv=$dperuv['SKU'];
    $fechav=$dperuv['FECHA'];
    $val=$dperuv['VALOR'];
    $peruu = mysqli_query($conexion, "SELECT UNIDADES FROM peruu WHERE SKU='$skuv' AND FECHA='$fechav'");
    $dperuu = mysqli_fetch_array($peruu);
    $uni=$dperuu['UNIDADES'];
    $master = mysqli_query($conexion,"SELECT ITEM FROM master_latam WHERE Descripcion = '$skuv'");
    $dmaster = mysqli_fetch_array($master);
    $resm = mysqli_num_rows($master);
      if ($resm == 0)
      {
        if ($b == 1)
        {
          echo "<div class='centro'>Se encontró un nuevo producto, su Descripcion es:" . " " . $skuv . "</div>";
          echo "<br>";
          $sheet->setCellValue('A'. $i, $catv);
          $sheet->setCellValue('B'. $i, $segv);
          $sheet->setCellValue('C'. $i, $marv);
          $sheet->setCellValue('D'. $i, $skuv);
          $i++;
        }
        $b++;
      }
      else
      {
          /////////////////////////////////////
          $ITEM = $dmaster['ITEM'];
          $peru = mysqli_query($conexion, "SELECT ITEM FROM peru WHERE ITEM = '$ITEM' AND FECHA = '$fechav'");
            $dperu = mysqli_fetch_array($peru);
            $res1 = mysqli_num_rows($peru);
            if ($res1 == 0)
            {
                $sql_peru = "INSERT INTO peru(
                ITEM,
                CATEGORIA,
                SUBCAT,
                MARCA,
                SKU,
                FECHA,
                UNIDADES,
                VALOR)
                VALUES(
                '$ITEM',
                '$catv',
                '$segv',
                '$marv',
                '$skuv',
                '$fechav',
                '$uni',
                '$val')";
                $query = mysqli_query($conexion,$sql_peru);
              $a++;
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
$filePath = "data/xls/nuevo-peru.xlsx";
$writer = new Xlsx($spreadsheet);
$writer->save($filePath);
?>
<br>
<div class="centro">
<button class="regresar" onclick="window.location.href = 'index.php';">Regresar</button>
</div>
