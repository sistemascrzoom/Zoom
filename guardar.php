<?php
include "conexion.php";
$ITEM = $_POST['Item'];
$Mercado = $_POST['Mercado'];
$Sub_mercado = $_POST['Sub_mercado'];
$Atributo_categoria = $_POST['Atributo_categoria'];
$Laboratorio = $_POST['Laboratorio'];
$Laboratorio_completo = $_POST['Laboratorio_completo'];
$Descripcion = $_POST['Descripcion'];
$Sun_file = $_POST['Sun_file'];
$Pais = $_POST['Pais'];
$sql_guardar = "UPDATE master_latam SET Mercado = '$Mercado', Sub_mercado='$Sub_mercado', Atributo_categoria = '$Atributo_categoria', Laboratorio='$Laboratorio', Laboratorio_completo = '$Laboratorio_completo', Descripcion='$Descripcion', Sun_file='$Sun_file', Pais='$Pais' WHERE ITEM = '$ITEM'";
$query = mysqli_query($conexion,$sql_guardar);
echo "El producto con el ITEM:" . " ". $ITEM . " " . "fue actualizado correctamente";
?>
