<?php
include "conexion.php";
if (isset($_POST['tipo']))
  {
  if ($_POST['tipo']=="editar")
    {
      $ITEM = $_POST['Item'];
      $Mercado = $_POST['Mercado'];
      $Sub_mercado = $_POST['Sub_mercado'];
      $Atributo_categoria = $_POST['Atributo_categoria'];
      $Laboratorio = $_POST['Laboratorio'];
      $Laboratorio_completo = $_POST['Laboratorio_completo'];
      $Descripcion = $_POST['Descripcion'];
      $Sun_file = $_POST['Sun_file'];
      $Pais = $_POST['Pais'];
      $Mineral = $_POST['Mineral'];
      $Tracker = $_POST['Tracker'];
      $TrackerD = $_POST['TrackerD'];
      $sql_editar = "UPDATE master_latam SET Mercado = '$Mercado', Sub_mercado='$Sub_mercado', Atributo_categoria = '$Atributo_categoria', Laboratorio='$Laboratorio', Laboratorio_completo = '$Laboratorio_completo', Descripcion='$Descripcion', Sun_file='$Sun_file', Pais='$Pais',Mineralno_mineral = '$Mineral', Tracker = '$Tracker', Tracker_descripcion='$TrackerD' WHERE ITEM = '$ITEM'";
      $query = mysqli_query($conexion,$sql_editar);
      echo "El producto con el ITEM:" . " ". $ITEM . " " . "fue actualizado correctamente";
    }
  else
  if ($_POST['tipo']=="guardar")
    {
      $ITEM = $_POST['Item'];
      $Mercado = $_POST['Mercado'];
      $Sub_mercado = $_POST['Sub_mercado'];
      $Atributo_categoria = $_POST['Atributo_categoria'];
      $Laboratorio = $_POST['Laboratorio'];
      $Laboratorio_completo = $_POST['Laboratorio_completo'];
      $Descripcion = $_POST['Descripcion'];
      $Sun_file = $_POST['Sun_file'];
      $Pais = $_POST['Pais'];
      $Mineral = $_POST['Mineral'];
      $Tracker = $_POST['Tracker'];
      $TrackerD = $_POST['TrackerD'];
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
      echo "El producto con el ITEM:" . " ". $ITEM . " " . "fue registró correctamente";
    }
  }
 ?>
