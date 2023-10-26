<?php
    include "conexion.php";
    $id = $_GET['id'];
    $query_delete = mysqli_query($conexion, "DELETE FROM master_latam WHERE ID = $id");
    mysqli_close($conexion);
    echo "El producto con el ID:" . " ". $id . " " . "fue eliminado correctamente";
     header("location: productos.php");
?>
