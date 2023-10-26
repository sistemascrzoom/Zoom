<?php
include "conexion.php";
require_once "vendor/autoload.php";
# Indicar que usaremos el IOFactory
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
$i=1;
$rutaArchivo="data/paises/Chile/ChileU.csv";
$rutaArchivo2="data/paises/Chile/ChileV.csv";
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'TIPO');
$sheet->setCellValue('B1', 'CANAL');
$sheet->setCellValue('C1', 'CATEGORIA');
$sheet->setCellValue('D1', 'SUBCATEGORIA');
$sheet->setCellValue('E1', 'Incluir');
$sheet->setCellValue('F1', 'otc4_code');
$sheet->setCellValue('G1', 'Category');
$sheet->setCellValue('H1', 'SubCategory');
$sheet->setCellValue('I1', 'Segment');
$sheet->setCellValue('J1', 'PRESENTACION');
$sheet->setCellValue('K1', 'PRODUCTO');
$sheet->setCellValue('L1', 'BRAND');
$sheet->setCellValue('M1', 'LABORATORIO');
$sheet->setCellValue('N1', 'ETICO/POPULAR');
$sheet->setCellValue('O1', 'FCC');
/////////////////////////////////////////////
$documento = IOFactory::load($rutaArchivo);
$indiceHoja = 0;
$hojaActual = $documento->getSheet($indiceHoja);
////////////////////////////////////////////
$documento2 = IOFactory::load($rutaArchivo2);
$indiceHoja2 = 0;
$hojaActual2 = $documento2->getSheet($indiceHoja2);
$row = $hojaActual->getHighestRow();
$columna_1 = 1;
$columna_canal = 2;
$columna_cat = 3;
$columna_scat = 4;
$columna_5 = 5;
$columna_6 = 6;
$columna_7 = 7;
$columna_8 = 8;
$columna_9 = 9;
$columna_pre = 10;
$columna_pro = 11;
$columna_brand = 12;
$columna_lab = 13;
$columna_14 = 14;
$columna_ITEM = 15;
$columna_f1 = 16;
$columna_f2 = 17;
$columna_f3 = 18;
$columna_f4 = 19;
$columna_f5 = 20;
$columna_f6 = 21;
$columna_f7 = 22;
$columna_f8 = 23;
$columna_f9 = 24;
$columna_f10 = 25;
$columna_f11 = 26;
$columna_f12 = 27;
$columna_f13 = 28;
$columna_f14 = 29;
$columna_f15 = 30;
$columna_f16 = 31;
$columna_f17 = 32;
$columna_f18 = 33;
$columna_f19 = 34;
$columna_f20 = 35;
$columna_f21 = 36;
$columna_f22 = 37;
$columna_f23 = 38;
$columna_f24 = 39;
?>
<link rel="stylesheet" href="estilo.css">
<?php
$i=2;
$a=0;
for ($fila=2;$fila<=$row;$fila++)
{
  $celda_1 = $hojaActual->getCellByColumnAndRow($columna_1, $fila);
  $c1 = $celda_1->getValue();
  /////////////////////////////////////
  $celda_canal = $hojaActual->getCellByColumnAndRow($columna_canal, $fila);
  $canal = $celda_canal->getValue();
  /////////////////////////////////////
  $celda_cat = $hojaActual->getCellByColumnAndRow($columna_cat, $fila);
  $cat = $celda_cat->getValue();
  /////////////////////////////////////
  $celda_scat = $hojaActual->getCellByColumnAndRow($columna_scat, $fila);
  $scat = $celda_scat->getValue();
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
  $celda_pre = $hojaActual->getCellByColumnAndRow($columna_pre, $fila);
  $pre = $celda_pre->getValue();
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
  $celda_14 = $hojaActual->getCellByColumnAndRow($columna_14, $fila);
  $c14 = $celda_14->getValue();
  /////////////////////////////////////
  $celda_ITEM = $hojaActual->getCellByColumnAndRow($columna_ITEM, $fila);
  $ITEMc = $celda_ITEM->getFormattedValue();
  $ITEM = ltrim($ITEMc, "0");
  for ($columna_f=16;$columna_f<=39;$columna_f++)
  {
      /////////////////////////////////////
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
      if ($ITEM != "")
      {
        $queryex = mysqli_query($conexion, "SELECT ITEM,FECHA FROM chile WHERE ITEM = '$ITEM' AND FECHA = '$fecha' AND CANAL = '$canal'");
        $dataex = mysqli_fetch_array($queryex);
        $res1 = mysqli_num_rows($queryex);
        if ($res1 == 0)
        {
            $sql_chile = "INSERT INTO chile(
            CANAL,
            CATEGORIA,
            SUBCATEGORIA,
            PRESENTACION,
            PRODUCTO,
            BRAND,
            LABORATORIO,
            ITEM,
            FECHA,
            UNIDADES,
            VALOR)
            VALUES(
            '$canal',
            '$cat',
            '$scat',
            '$pre',
            '$pro',
            '$brand',
            '$lab',
            '$ITEM',
            '$fecha',
            '$uni',
            '$val')";
            $query = mysqli_query($conexion,$sql_chile);
            $sql_mach = mysqli_query($conexion, "SELECT * FROM master_latam WHERE ITEM = '$ITEM'");
            $res = mysqli_num_rows($sql_mach);
            if ($res == 0)
            {
              echo "<div class='centro'>Se encontró un nuevo producto, su ITEM es:" . " " . $ITEM . "</div>";
              echo "<br>";
              $sheet->setCellValue('A'. $i, $c1);
              $sheet->setCellValue('B'. $i, $canal);
              $sheet->setCellValue('C'. $i, $cat);
              $sheet->setCellValue('D'. $i, $scat);
              $sheet->setCellValue('E'. $i, $c5);
              $sheet->setCellValue('F'. $i, $c6);
              $sheet->setCellValue('G'. $i, $c7);
              $sheet->setCellValue('H'. $i, $c8);
              $sheet->setCellValue('I'. $i, $c9);
              $sheet->setCellValue('J'. $i, $pre);
              $sheet->setCellValue('K'. $i, $pro);
              $sheet->setCellValue('L'. $i, $brand);
              $sheet->setCellValue('M'. $i, $lab);
              $sheet->setCellValue('N'. $i, $c14);
              $sheet->setCellValue('O'. $i, $ITEM);
              $i++;
            }
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
$filePath = "data/xls/nuevo-chile.xlsx";
$writer = new Xlsx($spreadsheet);
$writer->save($filePath);
?>
<br>
<div class="centro">
<button class="regresar" onclick="window.location.href = 'index.php';">Regresar</button>
</div>
