<?php
  $ID = $_GET['id'];
  include "conexion.php";
  $query = mysqli_query($conexion, "SELECT * FROM master_latam WHERE ID = '$ID'");
  while($data = mysqli_fetch_array($query))
    {
      $ITEM = $data['ITEM'];
      $Mercado = $data['Mercado'];
      $Sub_mercado = $data['Sub_mercado'];
      $Atributo_categoria = $data['Atributo_categoria'];
      $Laboratorio = $data['Laboratorio'];
      $Laboratorio_completo = $data['Laboratorio_completo'];
      $Descripcion = $data['Descripcion'];
      $Sun_file = $data['Sun_file'];
      $Pais = $data['Pais'];
      $Mineral = $data['Mineralno_mineral'];
      $Tracker = $data['Tracker'];
      $TrackerD = $data['Tracker_descripcion'];
    }
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Zoom - BDF</title>
  </head>
  <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
  <link href="vendorr/all.min.css" rel="stylesheet" type="text/css">
	<!-- Bootstrap core JavaScript-->
	<script src="vendorr/jquery/jquery.min.js"></script>
	<script src="vendorr/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Core plugin JavaScript-->
	<script src="vendorr/jquery-easing/jquery.easing.min.js"></script>
	<script src="js/all.min.js"></script>
  <link rel="stylesheet" href="estilo.css">
  <script>
    function ejecutarPHP() {
      tipo = "editar";
      Item=document.getElementById("ITEM").value;
      Mercado=document.getElementById("Mercado").value;
      Sub_mercado=document.getElementById("Sub_mercado").value;
      Atributo_categoria=document.getElementById("Atributo_categoria").value;
      Laboratorio=document.getElementById("Laboratorio").value;
      Laboratorio_completo=document.getElementById("Laboratorio_completo").value;
      Descripcion=document.getElementById("Descripcion").value;
      Sun_file=document.getElementById("Sun_file").value;
      Pais=document.getElementById("Pais").value;
      Mineral = document.getElementById("Mineral").value;
      Tracker = document.getElementById("Tracker").value;
      TrackerD = document.getElementById("TrackerD").value;
      if (Item == 0 || Mercado == 0 || Sub_mercado == 0 || Atributo_categoria == 0 || Laboratorio == 0 || Laboratorio_completo == 0
        || Descripcion == 0 || Sun_file == 0 || Pais == 0 || Mineral == 0 || Tracker == 0 || TrackerD == 0) {
        alert("no puede haber campos vacios, revise los datos");
          return false;
      }
      $.ajax({
        url: "editgua.php", // Nombre del archivo PHP
        type: "POST", // Método HTTP utilizado
        data: {
          tipo:tipo,
          Item:Item,
          Mercado:Mercado,
          Sub_mercado:Sub_mercado,
          Atributo_categoria:Atributo_categoria,
          Laboratorio:Laboratorio,
          Laboratorio_completo:Laboratorio_completo,
          Descripcion:Descripcion,
          Sun_file:Sun_file,
          Pais:Pais,
          Mineral:Mineral,
          Tracker:Tracker,
          TrackerD:TrackerD
          },
        dataType: "html", // Tipo de datos que se espera recibir
        success: function(resultado) {
          alert(resultado); // Muestra el resultado del archivo PHP
          window.location.href= "productos.php";
        }
      });
    }
  </script>
  <body>
    <br>
    <br>
    <div class="container">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Editar producto</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ITEM">ITEM:</Label>
                            <input type=text id="ITEM" name="ITEM" value="<?php echo $ITEM; ?>" class="form-control" required>
                            <label for="Mercado">Mercado:</Label>
                            <input type=text id="Mercado" name="Mercado" value="<?php echo $Mercado; ?>" class="form-control" required>
                            <label for="Sub_mercado">Sub Mercado:</Label>
                            <input type=text id="Sub_mercado" name="Sub_mercado" value="<?php echo $Sub_mercado; ?>" class="form-control" required>
                            <label for="Atributo_categoria">Atributo categoria:</Label>
                            <input type=text id="Atributo_categoria" name="Atributo_categoria" value="<?php echo $Atributo_categoria; ?>" class="form-control" required>
                            <label for="Laboratorio">Laboratorio:</Label>
                            <input type=text id="Laboratorio" name="Laboratorio" value="<?php echo $Laboratorio; ?>" class="form-control" required>
                            <label for="Laboratorio_completo">Laboratorio completo:</Label>
                            <input type=text id="Laboratorio_completo" name="Laboratorio_completo" value="<?php echo $Laboratorio_completo; ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="Descripcion">Descripcion:</Label>
                          <input type=text id="Descripcion" name="Descripcion" value="<?php echo $Descripcion; ?>" class="form-control" required>
                          <label for="Sun_file">Sun_file:</Label>
                          <input type=text id="Sun_file" name="Sun_file" value="<?php echo $Sun_file; ?>" class="form-control" required>
                          <label for="Pais">Pais:</Label>
                          <input type=text id="Pais" name="Pais" value="<?php echo $Pais; ?>" class="form-control" required>
                          <label for="Mineral">Mineral/No_mineral:</Label>
                          <input type=text id="Mineral" name="Mineral" value="<?php echo $Mineral; ?>" class="form-control" required>
                          <label for="Tracker">Tracker:</Label>
                          <input type=text id="Tracker" name="Tracker" value="<?php echo $Tracker; ?>" class="form-control" required>
                          <label for="TrackerD">Tracker Descripcion:</Label>
                          <input type=text id="TrackerD" name="TrackerD" value="<?php echo $TrackerD; ?>" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-danger" onclick="window.location.href = 'productos.php';">Regresar</button>
                      &nbsp;
                      &nbsp;
                        <button id=guardar name=guardar class="btn btn-info" onclick="ejecutarPHP()">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
