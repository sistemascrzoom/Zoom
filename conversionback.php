<?php
//include "conexion.php";
require_once "vendor/autoload.php";
# Indicar que usaremos el IOFactory
use PhpOffice\PhpSpreadsheet\IOFactory;
$i=1;
$mes = "prueba";
$fecha = date('Y-m-d');
$año = date('Y');
$banco = "Banorte";
$obs="";
$rutaArchivo="mexico.xlsx";
?>
<?php
/*switch ($mes)
{
  case 'ENERO':
  $rutaArchivo = "estados/" . $año . "/" . $banco . "/enero.csv";
  $renombrar = "estados/" . $año . "/" . $banco . "/enero-" . $fecha  . ".csv";
    break;
  case 'FEBRERO':
  $rutaArchivo = "estados/" . $año . "/" . $banco . "/febrero.csv";
  $renombrar = "estados/" . $año . "/" . $banco . "/febrero-" . $fecha  . ".csv";
    break;
  case 'MARZO':
  $rutaArchivo = "estados/" . $año . "/" . $banco . "/marzo.csv";
  $renombrar = "estados/" . $año . "/" . $banco . "/marzo-" . $fecha  . ".csv";
    break;
  case 'ABRIL':
  $rutaArchivo = "estados/" . $año . "/" . $banco . "/abril.csv";
  $renombrar = "estados/" . $año . "/" . $banco . "/abril-" . $fecha  . ".csv";
  break;
  case 'MAYO':
  $rutaArchivo = "estados/" . $año . "/" . $banco . "/mayo.csv";
  $renombrar = "estados/" . $año . "/" . $banco . "/mayo-" . $fecha  . ".csv";
  break;
  case 'JUNIO':
  $rutaArchivo = "estados/" . $año . "/" . $banco . "/junio.csv";
  $renombrar = "estados/" . $año . "/" . $banco . "/junio-" . $fecha  . ".csv";
  break;
  case 'JULIO':
  $rutaArchivo = "estados/" . $año . "/" . $banco . "/julio.csv";
  $renombrar = "estados/" . $año . "/" . $banco . "/julio-" . $fecha  . ".csv";
  break;
  case 'AGOSTO':
  $rutaArchivo = "estados/" . $año . "/" . $banco . "/agosto.csv";
  $renombrar = "estados/" . $año . "/" . $banco . "/agosto-" . $fecha  . ".csv";
  break;
  case 'SEPTIEMBRE':
  $rutaArchivo = "estados/" . $año . "/" . $banco . "/septiembre.csv";
  $renombrar = "estados/" . $año . "/" . $banco . "/septiembre-" . $fecha  . ".csv";
  break;
  case 'OCTUBRE':
  $rutaArchivo = "estados/" . $año . "/" . $banco . "/octubre.csv";
  $renombrar = "estados/" . $año . "/" . $banco . "/octubre-" . $fecha  . ".csv";
  break;
  case 'NOVIEMBRE':
  $rutaArchivo = "estados/" . $año . "/" . $banco . "/noviembre.csv";
  $renombrar = "estados/" . $año . "/" . $banco . "/noviembre-" . $fecha  . ".csv";
  break;
  case 'DICIEMBRE':
  $rutaArchivo = "estados/" . $año . "/" . $banco . "/diciembre.csv";
  $renombrar = "estados/" . $año . "/" . $banco . "/diciembre-" . $fecha  . ".csv";
  break;
}*/
$documento = IOFactory::load($rutaArchivo);
//$totalDeHojas = $documento->getSheetCount();
//for ($indiceHoja = 0; $indiceHoja < $totalDeHojas; $indiceHoja++)
//{
$indiceHoja = 0;
$hojaActual = $documento->getSheet($indiceHoja);
  //$columnaf = 2;
  //$columnad = 5;
  //$columnadet = 12;
//  $gtotal = 0;
  //$row = $hojaActual->getHighestRow();
  $columna = 1;
  $row = 200;
  $fila=4;
  echo $row;
  echo "<br>";
  echo "<br>";
  ?>
<?php
    //for ($fila=3;$fila<=$row;$fila++)
    //{
      //$celdad = $hojaActual->getCellByColumnAndRow($columnad, $fila);
      //$descrip = $celdad->getValue();
      //$celdadet = $hojaActual->getCellByColumnAndRow($columnadet, $fila);
      //$descripdet = $celdadet->getValue();
      $celda = $hojaActual->getCellByColumnAndRow($columna, $fila);
      $valorRaw = $celda->getValue();
      echo $valorRaw;
      echo "<br>";
    //}
//  }
      //$quitarm = str_replace("$","",$valorRaw);
      //$valfor = str_replace(",","",$quitarm);
      //if ($valfor == "-") {
      //$valfor = 0;
      //}
      //$gtotal = $gtotal + $valfor;
      //$celdaf = $hojaActual->getCellByColumnAndRow($columnaf, $fila);
      //$fec = $celdaf->getFormattedValue();
      //$carac = strlen($fec);
      //if ($carac == 8) {
      //  $dia = substr($fec,0,1);
      //  $mes1 = substr($fec,2,1);
      //  $ano = substr($fec,4,4);
      //  $fecha = $ano . "-" . "0". $mes1 . "-" . "0". $dia;
      //}
      /*if ($carac == 9) {
        $dia = substr($fec,0,2);
        $mes1 = substr($fec,3,1);
        $ano = substr($fec,5,4);
        $fecha = $ano . "-" . "0". $mes1 . "-" . $dia;
      }
      if ($carac == 10) {
        $dia = substr($fec,0,2);
        $mes1 = substr($fec,3,2);
        $ano = substr($fec,6,4);
        $fecha = $ano . "-" . $mes1 . "-" . $dia;
      }
      if ($valfor != 0)
      {
      //$query2 = mysqli_query($conexion, "SELECT * FROM conciliaciondegr WHERE fecha = '$fecha' AND monto = '$valfor' AND descrip = '$descrip'");
      //$data2 = mysqli_fetch_array($query2);
      //$res1 = mysqli_num_rows($query2);
      ?>
      <tr>
      <?php
          if ($res1 != 0) {
            //$fing = $data2['fecha'];
            //$monto = $data2['monto'];
            //$cliente = $data2['cliente'];
            //$factura = $data2['foliop'];
            //$descrip = $data2['descrip'];
            //$descripdet = $data2['descripdet'];
            //$ffact=$data2['ffact'];
            //$obs = $data2['obs'];
            ?>
            <input type="hidden" name="creado" id="creado" value = "1" class="form-control">
            <td class='text-center'><input type="hidden" name="fecha<?php echo $i; ?>" id="fecha<?php echo $i; ?>"  value = "<?php echo $fing; ?>" class="form-control"><?php echo $fing; ?></td>
            <td class='text-left'><input type="hidden" name="descrip<?php echo $i; ?>" id="descrip<?php echo $i; ?>" value = "<?php echo $descrip; ?>" class="form-control"><?php echo $descrip; ?></td>
            <td class='text-center'><input type="hidden" name="monto<?php echo $i; ?>" id="monto<?php echo $i; ?>" value = "<?php echo "$" . number_format($monto,2); ?>" class="form-control"><?php echo $monto; ?></td>
            <?php
            if ($valfor == "5.00") {
            $prov = "COMISION ORDEN DE PAGO SPEI";
            ?>
            <td class='text-center'><input type="hidden" name="descripdet<?php echo $i; ?>" id="descripdet<?php echo $i; ?>" value = "<?php echo $descripdet; ?>"class="form-control"><?php echo $descripdet; ?></td>
            <td class='text-left'><input type="hidden" name="cliente<?php echo $i; ?>" id="cliente<?php echo $i; ?>" value = "<?php echo $prov; ?>" class="form-control"><?php echo $prov; ?></td>
            <td class='text-center'>N/A</td>
            <td class='text-center'>N/A</td>
            <td class='text-center'>N/A</td>
            <?php
            }
            else if ($valfor == "0.80") {
            $prov = "I.V.A. ORDEN DE PAGO SPEI";
            ?>
            <td class='text-center'><input type="hidden" name="descripdet<?php echo $i; ?>" id="descripdet<?php echo $i; ?>" value = "<?php echo $descripdet; ?>"class="form-control"><?php echo $descripdet; ?></td>
            <td class='text-left'><input type="hidden" name="cliente<?php echo $i; ?>" id="cliente<?php echo $i; ?>" value = "<?php echo $prov; ?>" class="form-control"><?php echo $prov; ?></td>
            <td class='text-center'>N/A</td>
            <td class='text-center'>N/A</td>
            <td class='text-center'>N/A</td>
            <?php
            }
            else
            {
            ?>
            <td class='text-left'><textarea name="descripdet<?php echo $i; ?>" id="descripdet<?php echo $i; ?>" class="form-control"><?php echo $descripdet; ?></textarea></td>
            <td class='text-left'><input type="text" list ="provee" name="cliente<?php echo $i; ?>" id="cliente<?php echo $i; ?>" value = "<?php echo $cliente; ?>" class="form-control"></td>
            <td class='text-center'><input type="text" name="folio<?php echo $i; ?>" id="folio<?php echo $i; ?>" value = "<?php echo $factura; ?>" class="form-control-fac"></td>
            <td class='text-center'><input type="date" name="ffact<?php echo $i; ?>" id="ffact<?php echo $i; ?>" value = "<?php echo $ffact; ?>" class="form-control text-center"> </td>
            <td class='text-center'><textarea name="obs<?php echo $i; ?>" id="obs<?php echo $i; ?>"class="form-control"><?php echo $obs; ?></textarea></td>
            <?php
            }
            ?>
            <datalist id="provee">
              <?php
              //$query_ID = mysqli_query($conexion, "SELECT * FROM proveedores ORDER BY clv_prov");
              //$resultado_ID = mysqli_num_rows($query_ID);
              //if ($resultado_ID > 0)
              //{
              //    while ($cliente = mysqli_fetch_array($query_ID))
              //    {
              //      ?>
                <!--    <option value="<?php //echo $cliente['raz_prov']; ?>">
              //      <?php
              //      $campo = $cliente['raz_prov'];
              //      echo $campo; ?>
                      </option>-->
                    <?php
                //  }
              //}
            ?>
            <input type="hidden" name="conse<?php echo $i; ?>" id="conse<?php echo $i; ?>" value = "1" class="form-control">
          <?php
          }
          else
          {
          if (!empty($valfor))
          {
                ?>
                <td class='text-center'><input type="hidden" name="fecha<?php echo $i; ?>" id="fecha<?php echo $i; ?>"  value = "<?php echo $fecha; ?>" class="form-control"><?php echo $fecha; ?></td>
                <td class='text-left'><input type="hidden" name="descrip<?php echo $i; ?>" id="descrip<?php echo $i; ?>" value = "<?php echo $descrip; ?>" class="form-control"><?php echo $descrip; ?></td>
                <td class='text-center'><input type="hidden" name="monto<?php echo $i; ?>" id="monto<?php echo $i; ?>" value = "<?php echo "$" . number_format($valfor,2); ?>" class="form-control"><?php echo "$" . number_format($valfor,2); ?></td>
                <?php
                if ($valfor == "5.00") {
                $prov = "COMISION ORDEN DE PAGO SPEI";
                ?>
                <td class='text-center'><input type="hidden" name="descripdet<?php echo $i; ?>" id="descripdet<?php echo $i; ?>" value = "<?php echo $descripdet; ?>"class="form-control"><?php echo $descripdet; ?></td>
                <td class='text-left'><input type="hidden" name="cliente<?php echo $i; ?>" id="cliente<?php echo $i; ?>" value = "<?php echo $prov; ?>" class="form-control"><?php echo $prov; ?></td>
                <td class='text-center'>N/A</td>
                <td class='text-center'>N/A</td>
                <td class='text-center'>N/A</td>
                <?php
                }
                else if ($valfor == "0.80") {
                $prov = "I.V.A. ORDEN DE PAGO SPEI";
                ?>
                <td class='text-center'><input type="hidden" name="descripdet<?php echo $i; ?>" id="descripdet<?php echo $i; ?>" value = "<?php echo $descripdet; ?>"class="form-control"><?php echo $descripdet; ?></td>
                <td class='text-left'><input type="hidden" name="cliente<?php echo $i; ?>" id="cliente<?php echo $i; ?>" value = "<?php echo $prov; ?>" class="form-control"><?php echo $prov; ?></td>
                <td class='text-center'>N/A</td>
                <td class='text-center'>N/A</td>
                <td class='text-center'>N/A</td>
                <?php
                }
                else
                {
                ?>
                <td class='text-left'><textarea name="descripdet<?php echo $i; ?>" id="descripdet<?php echo $i; ?>" class="form-control"><?php echo $descripdet; ?></textarea></td>
                <td class='text-left'><input type="text" list ="provee" name="cliente<?php echo $i; ?>" id="cliente<?php echo $i; ?>" value = "<?php echo $cliente; ?>" class="form-control"></td>
                <td class='text-center'><input type="text" name="folio<?php echo $i; ?>" id="folio<?php echo $i; ?>" value = "<?php echo $factura; ?>" class="form-control-fac"></td>
                <td class='text-center'><input type="date" name="ffact<?php echo $i; ?>" id="ffact<?php echo $i; ?>" value = "<?php echo $ffact; ?>" class="form-control text-center"> </td>
                <td class='text-center'><textarea name="obs<?php echo $i; ?>" id="obs<?php echo $i; ?>"class="form-control"><?php echo $obs; ?></textarea></td>
                <?php
                }
                ?>
                <datalist id="provee">
                  <?php
                  $query_ID = mysqli_query($conexion, "SELECT * FROM proveedores ORDER BY clv_prov");
                  $resultado_ID = mysqli_num_rows($query_ID);
                  if ($resultado_ID > 0)
                  {
                      while ($cliente = mysqli_fetch_array($query_ID))
                      {
                        ?>
                        <option value="<?php echo $cliente['raz_prov']; ?>">
                        <?php
                        $campo = $cliente['raz_prov'];
                        echo $campo; ?>
                        </option>
                        <?php
                      }
                  }
                ?>
                </datalist>
                <input type="hidden" name="conse<?php echo $i; ?>" id="conse<?php echo $i; ?>" value = "3" class="form-control">
                <?php
              }
            }
          }
  ?>
  </tr>
  <?php
  $i++;
  }
}
?>
</tbody>
</table>
</div>
<?php echo "<h3>El monto total depositado es: " . "$" . number_format($gtotal,2) . "<h3>";
?>
<input type="hidden" name="mes" id="mes" class="form-control" value = "<?php echo $mes; ?>">
<input type="hidden" name="registros" id="registros" class="form-control" value = "<?php echo $row; ?>">
<input type="hidden" name="rutaArchivo" id="rutaArchivo" class="form-control" value = "<?php echo $rutaArchivo; ?>">
<input type="hidden" name="totald" id="totald" class="form-control" value = "<?php echo $gtotal; ?>">
<div class="text-right">
  <p> </p>
  <a href="Banortet-egr.php" class="btn btn-danger" id="btn_anular_venta">Anular conciliación</a>
  <input type="submit" id="gv" name="gv" value="Guardar conciliación" class="btn btn-info">
</div>
</form>
</div>*/
