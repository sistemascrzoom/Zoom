  <!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Zoom - BDF</title>
  </head>
	<link rel="stylesheet" href="estilo.css">
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
  <body>
<?php
include "conexion.php";
if (isset($_POST['pais']))
     {
        $pais = $_POST['pais'];
     }
else
    {
    $pais = "-";
    }
if (isset($_POST['item']))
    {
    $ITEM = $_POST['item'];
    }
else
    {
    $ITEM = "-";
    }
if (isset($_POST['pais']) AND isset($_POST['item']))
{
$consulta = "Se ejecuto la siguiente consulta: Pais:" . " " . $pais . " " . "- ITEM:" . " " . $ITEM;
}
else {
  $consulta="-";
}
?>
<script>
  function ejecutarPHP()
  {
    Item=document.getElementById("ITEM").value;
    Mercado=document.getElementById("Mercado").value;
    Sub_mercado=document.getElementById("Sub_mercado").value;
    Atributo_categoria=document.getElementById("Atributo_categoria").value;
    Laboratorio=document.getElementById("Laboratorio").value;
    Laboratorio_completo=document.getElementById("Laboratorio_completo").value;
    Descripcion=document.getElementById("Descripcion").value;
    Sun_file=document.getElementById("Sun_file").value;
    Pais=document.getElementById("Pais").value;
    $.ajax({
      url: "guardar.php", // Nombre del archivo PHP
      type: "POST", // Método HTTP utilizado
      data: {
        Item:Item,
        Mercado:Mercado,
        Sub_mercado:Sub_mercado,
        Atributo_categoria:Atributo_categoria,
        Laboratorio:Laboratorio,
        Laboratorio_completo:Laboratorio_completo,
        Descripcion:Descripcion,
        Sun_file:Sun_file,
        Pais:Pais},
      dataType: "html", // Tipo de datos que se espera recibir
      success: function(resultado) {
        alert(resultado); // Muestra el resultado del archivo PHP
      }
    });
  }
</script>
<link rel="stylesheet" href="estilo.css">
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
<div class="centro">
  <h3>Consulta de productos</h3>
  <br>
  <form class="centro" method="POST" action="#">
  <span id="titpa" name="titpa">Elije Pais:</span>
	<input type="Text" id="pais" name="pais" list="paises" required>
	<datalist id="paises">
		<option value="colombia" id="colombia" name="colombia"></option>
		<option value="mexico" id="mexico" name="mexico"></option>
		<option value="peru" id="peru" name="peru"></option>
		<option value="ecuador" id="ecuador" name="ecuador"></option>
		<option value="cam" id="cam" name="cam"></option>
		<option value="chile" id="chile" name="chile"></option>
		<option value="brasil" id="brasil" name="brasil"></option>
	</datalist>
  <br>
  <span id="titpa" name="titpa">Escribe ITEM:</span>
	<input type="Text" id="item" name="item" required>
  <br>
  <button class="btn btn-info" onclick="window.location.href = '#';">Consultar</button>
  <br>
  <button class="btn btn-danger" onclick="window.location.href = 'index.php';">Regresar</button>
  </form>
  <br>
  <br>
    <div class="table-responsive">
      <h3 id="consulta" name="consulta"> <?php echo $consulta; ?> </h3>
      <br>
      <br>
      <h5>Base - pais</h5>
      <?php switch ($pais) {
  			case 'peru': ?>
  			<div class="table-responsive">
  				<table class="table table-striped table-bordered" id="table4">
  					<thead class="thead-dark">
  						<tr>
  							<th class='text-center'>ITEM</th>
  							<th class='text-center'>CATEGORIA</th>
  							<th class='text-center'>SUBCAT</th>
  							<th class='text-center'>MARCA</th>
  							<th class='text-center'>SKU</th>
                <th class='text-center'>FECHA</th>
  							<th class='text-center'>UNIDADES</th>
  							<th class='text-center'>VALOR</th>
  						</tr>
  					</thead>
  					<tbody>
  						<?php
  						include "conexion.php";
  							$query = mysqli_query($conexion, "SELECT * FROM peru WHERE ITEM = '$ITEM' LIMIT 3");
  							while($data = mysqli_fetch_array($query)) {
  								?>
  									<tr>
  										<td class='text-center'><input type="hidden" id="ITEM" name="ITEM" value="<?php echo $data['ITEM']; ?>"><?php echo $data['ITEM']; ?></td>
  										<td class='text-center'><?php echo $data['CATEGORIA']; ?></td>
  										<td class='text-center'><?php echo $data['SUBCAT']; ?></td>
  										<td class='text-center'><?php echo $data['MARCA']; ?></td>
  										<td class='text-center'><?php echo $data['SKU']; ?></td>
  										<td class='text-center'><?php echo $data['FECHA']; ?></td>
  										<td class='text-center'><?php echo $data['UNIDADES']; ?></td>
  										<td class='text-center'><?php echo $data['VALOR']; ?></td>
  									<?php } ?>
  									</tr>
  						<?php break; ?>
  					</tbody>
  				</table>
  			</div>
  			<?php case 'colombia': ?>
  			<div class="table-responsive">
  				<table class="table table-striped table-bordered" id="table4">
  					<thead class="thead-dark">
  						<tr>
  							<th class='text-center'>ITEM</th>
  							<th class='text-center'>CATEGORIA</th>
  							<th class='text-center'>SUBCATEGORIA</th>
  							<th class='text-center'>PRESENTACION</th>
                <th class='text-center'>PRODCUCTO</th>
  							<th class='text-center'>BRAND</th>
  							<th class='text-center'>LABORATORIO</th>
  							<th class='text-center'>FECHA</th>
  							<th class='text-center'>VALOR</th>
  							<th class='text-center'>UNIDADES</th>
  						</tr>
  					</thead>
  					<tbody>
  						<?php
  						include "conexion.php";
  							$query = mysqli_query($conexion, "SELECT * FROM colombia WHERE ITEM = '$ITEM' LIMIT 3");
  							while($data = mysqli_fetch_array($query)) {
  								?>
  									<tr>
  										<td class='text-center'><input type="hidden" id="ITEM" name="ITEM" value="<?php echo $data['ITEM']; ?>"><?php echo $data['ITEM']; ?></td>
  										<td class='text-center'><?php echo $data['CATEGORIA']; ?></td>
  										<td class='text-center'><?php echo $data['SUBCATEGORIA']; ?></td>
  										<td class='text-center'><?php echo $data['PRESENTACION']; ?></td>
  										<td class='text-center'><?php echo $data['PRODUCTO']; ?></td>
  										<td class='text-center'><?php echo $data['BRAND']; ?></td>
  										<td class='text-center'><?php echo $data['LABORATORIO']; ?></td>
  										<td class='text-center'><?php echo $data['FECHA']; ?></td>
  										<td class='text-center'><?php echo $data['VALOR']; ?></td>
  										<td class='text-center'><?php echo $data['UNIDADES']; ?></td>
  									<?php } ?>
  									</tr>
  						<?php break; ?>
  					</tbody>
  				</table>
  			</div>
  			<?php case 'mexico': ?>
  			<div class="table-responsive">
  				<table class="table table-striped table-bordered" id="table4">
  					<thead class="thead-dark">
  						<tr>
  							<th class='text-center'>MercadoID</th>
  							<th class='text-center'>MERCADO</th>
  							<th class='text-center'>SEGMENTO1</th>
  							<th class='text-center'>SEGMENTO2</th>
                <th class='text-center'>SEGMENTO3</th>
  							<th class='text-center'>PRESENTACION</th>
  							<th class='text-center'>ITEM</th>
  							<th class='text-center'>CT</th>
  							<th class='text-center'>NOM_CT</th>
  							<th class='text-center'>LAB</th>
  							<th class='text-center'>LABORATORIO</th>
  							<th class='text-center'>PROPIOS_BDF</th>
  							<th class='text-center'>FECHA</th>
  							<th class='text-center'>VALOR</th>
  							<th class='text-center'>UNIDADES</th>
  						</tr>
  					</thead>
  					<tbody>
  						<?php
  						include "conexion.php";
  							$query = mysqli_query($conexion, "SELECT * FROM mexico WHERE ITEM = '$ITEM' LIMIT 3");
  							while($data = mysqli_fetch_array($query)) {
  								?>
  									<tr>
  										<td class='text-center'><input type="hidden" id="ITEM" name="ITEM" value="<?php echo $data['ITEM']; ?>"><?php echo $data['ITEM']; ?></td>
  										<td class='text-center'><?php echo $data['MERCADO']; ?></td>
  										<td class='text-center'><?php echo $data['SEGMENTO1']; ?></td>
  										<td class='text-center'><?php echo $data['SEGMENTO2']; ?></td>
  										<td class='text-center'><?php echo $data['SEGMENTO3']; ?></td>
  										<td class='text-center'><?php echo $data['PRESENTACION']; ?></td>
  										<td class='text-center'><?php echo $data['MercadoID']; ?></td>
  										<td class='text-center'><?php echo $data['CT']; ?></td>
  										<td class='text-center'><?php echo $data['NOM_CT']; ?></td>
  										<td class='text-center'><?php echo $data['LAB']; ?></td>
  										<td class='text-center'><?php echo $data['LABORATORIO']; ?></td>
  										<td class='text-center'><?php echo $data['PROPIOS_BDF']; ?></td>
  										<td class='text-center'><?php echo $data['FECHA']; ?></td>
  										<td class='text-center'><?php echo $data['VALOR']; ?></td>
  										<td class='text-center'><?php echo $data['UNIDADES']; ?></td>
  									<?php } ?>
  									</tr>
  						<?php break; ?>
  					</tbody>
  				</table>
  			</div>
  			<?php case 'cam': ?>
  			<div class="table-responsive">
  				<table class="table table-striped table-bordered" id="table4">
  					<thead class="thead-dark">
  						<tr>
  							<th class='text-center'>ITEM</th>
  							<th class='text-center'>PAIS_MES</th>
  							<th class='text-center'>PAIS</th>
  							<th class='text-center'>FECHA</th>
  							<th class='text-center'>N_REPORTE</th>
  							<th class='text-center'>COD_SEGMENTO</th>
  							<th class='text-center'>N_SEGMENTO</th>
  							<th class='text-center'>COD_COMPETIDOR</th>
  							<th class='text-center'>N_COMPETIDOR</th>
  							<th class='text-center'>PRODUCTO</th>
  							<th class='text-center'>DESCRIPCION</th>
  							<th class='text-center'>UNIDADES</th>
  							<th class='text-center'>VALOR</th>
  						</tr>
  					</thead>
  					<tbody>
  						<?php
  						include "conexion.php";
  							$query = mysqli_query($conexion, "SELECT * FROM cam WHERE ITEM = '$ITEM' LIMIT 3");
  							while($data = mysqli_fetch_array($query)) {
  								?>
  									<tr>
  										<td class='text-center'><input type="hidden" id="ITEM" name="ITEM" value="<?php echo $data['ITEM']; ?>"><?php echo $data['ITEM']; ?></td>
  										<td class='text-center'><?php echo $data['PAIS_MES']; ?></td>
  										<td class='text-center'><?php echo $data['PAIS']; ?></td>
  										<td class='text-center'><?php echo $data['FECHA']; ?></td>
  										<td class='text-center'><?php echo $data['N_REPORTE']; ?></td>
  										<td class='text-center'><?php echo $data['COD_SEGMENTO']; ?></td>
  										<td class='text-center'><?php echo $data['N_SEGMENTO']; ?></td>
  										<td class='text-center'><?php echo $data['COD_COMPETIDOR']; ?></td>
  										<td class='text-center'><?php echo $data['N_COMPETIDOR']; ?></td>
  										<td class='text-center'><?php echo $data['PRODUCTO']; ?></td>
  										<td class='text-center'><?php echo $data['DESCRIPCION']; ?></td>
  										<td class='text-center'><?php echo $data['UNIDADES']; ?></td>
  										<td class='text-center'><?php echo $data['VALOR']; ?></td>
  									<?php } ?>
  									</tr>
  						<?php break;  ?>
  					</tbody>
  				</table>
  			</div>
  			<?php case 'chile': ?>
  			<div class="table-responsive">
  				<table class="table table-striped table-bordered" id="table4">
  					<thead class="thead-dark">
  						<tr>
  							<th class='text-center'>ITEM</th>
  							<th class='text-center'>CATEGORIA</th>
  							<th class='text-center'>SUBCATEGORIA</th>
  							<th class='text-center'>PRESENTACION</th>
                <th class='text-center'>PRODCUCTO</th>
  							<th class='text-center'>BRAND</th>
  							<th class='text-center'>LABORATORIO</th>
  							<th class='text-center'>CANAL</th>
  							<th class='text-center'>FECHA</th>
  							<th class='text-center'>VALOR</th>
  							<th class='text-center'>UNIDADES</th>
  						</tr>
  					</thead>
  					<tbody>
  						<?php
  						include "conexion.php";
  							$query = mysqli_query($conexion, "SELECT * FROM chile WHERE ITEM = '$ITEM' LIMIT 3");
  							while($data = mysqli_fetch_array($query)) {
  								?>
  									<tr>
  										<td class='text-center'><input type="hidden" id="ITEM" name="ITEM" value="<?php echo $data['ITEM']; ?>"><?php echo $data['ITEM']; ?></td>
  										<td class='text-center'><?php echo $data['CATEGORIA']; ?></td>
  										<td class='text-center'><?php echo $data['SUBCATEGORIA']; ?></td>
  										<td class='text-center'><?php echo $data['PRESENTACION']; ?></td>
  										<td class='text-center'><?php echo $data['PRODUCTO']; ?></td>
  										<td class='text-center'><?php echo $data['BRAND']; ?></td>
  										<td class='text-center'><?php echo $data['LABORATORIO']; ?></td>
  										<td class='text-center'><?php echo $data['CANAL']; ?></td>
  										<td class='text-center'><?php echo $data['FECHA']; ?></td>
  										<td class='text-center'><?php echo $data['VALOR']; ?></td>
  										<td class='text-center'><?php echo $data['UNIDADES']; ?></td>
  									<?php } ?>
  									</tr>
  						<?php break;  ?>
  					</tbody>
  				</table>
  			</div>
  			<?php case 'brasil': ?>
  			<div class="table-responsive">
  				<table class="table table-striped table-bordered" id="table4">
  					<thead class="thead-dark">
  						<tr>
  							<th class='text-center'>ITEM</th>
  							<th class='text-center'>Laboratorio_BR</th>
  							<th class='text-center'>Laboratorio</th>
  							<th class='text-center'>Descripcion</th>
                <th class='text-center'>Mercado</th>
  							<th class='text-center'>Sub_mercado</th>
  							<th class='text-center'>Atributo_categoria</th>
  							<th class='text-center'>Fecha</th>
  							<th class='text-center'>Valor</th>
  							<th class='text-center'>Unidades</th>
  						</tr>
  					</thead>
  					<tbody>
  						<?php
  						include "conexion.php";
  							$query = mysqli_query($conexion, "SELECT * FROM brasil WHERE ITEM = '$ITEM' LIMIT 3");
  							while($data = mysqli_fetch_array($query)) {
  								?>
  									<tr>
  										<td class='text-center'><input type="hidden" id="ITEM" name="ITEM" value="<?php echo $data['ITEM']; ?>"><?php echo $data['ITEM']; ?></td>
  										<td class='text-center'><?php echo $data['Laboratorio_BR']; ?></td>
  										<td class='text-center'><?php echo $data['Laboratorio']; ?></td>
  										<td class='text-center'><?php echo $data['Descripcion']; ?></td>
  										<td class='text-center'><?php echo $data['Mercado']; ?></td>
  										<td class='text-center'><?php echo $data['Sub_mercado']; ?></td>
  										<td class='text-center'><?php echo $data['Atributo_categoria']; ?></td>
  										<td class='text-center'><?php echo $data['Fecha']; ?></td>
  										<td class='text-center'><?php echo $data['Valor']; ?></td>
  										<td class='text-center'><?php echo $data['Unidades']; ?></td>
  									<?php } ?>
  									</tr>
  						<?php break;  ?>
  					</tbody>
  				</table>
  			</div>
  			<?php case 'ecuador': ?>
  			<div class="table-responsive">
  				<table class="table table-striped table-bordered" id="table4">
  					<thead class="thead-dark">
  						<tr>
  							<th class='text-center'>ITEM</th>
  							<th class='text-center'>DESC_PRESENTACION</th>
  							<th class='text-center'>FPS</th>
  							<th class='text-center'>MARCA</th>
                <th class='text-center'>CATEGORIA</th>
  							<th class='text-center'>SUBCATEGORIA</th>
  							<th class='text-center'>SEGMENTO</th>
  							<th class='text-center'>SUBSEGMENTO</th>
  							<th class='text-center'>Grupo_Mexico</th>
  							<th class='text-center'>Grupo_Mexico_2</th>
  							<th class='text-center'>FABRICANTE_ANALISIS_GLORIA</th>
  							<th class='text-center'>FECHA</th>
  							<th class='text-center'>UNIDADES</th>
  							<th class='text-center'>VALOR</th>
  						</tr>
  					</thead>
  					<tbody>
  						<?php
  						include "conexion.php";
  							$query = mysqli_query($conexion, "SELECT * FROM ecuador WHERE ITEM = '$ITEM' LIMIT 3");
  							while($data = mysqli_fetch_array($query)) {
  								?>
  									<tr>
  										<td class='text-center'><input type="hidden" id="ITEM" name="ITEM" value="<?php echo $data['ITEM']; ?>"><?php echo $data['ITEM']; ?></td>
  										<td class='text-center'><?php echo $data['DESC_PRESENTACION']; ?></td>
  										<td class='text-center'><?php echo $data['FPS']; ?></td>
  										<td class='text-center'><?php echo $data['MARCA']; ?></td>
  										<td class='text-center'><?php echo $data['CATEGORIA']; ?></td>
  										<td class='text-center'><?php echo $data['SUBCATEGORIA']; ?></td>
  										<td class='text-center'><?php echo $data['SEGMENTO']; ?></td>
  										<td class='text-center'><?php echo $data['SUBSEGMENTO']; ?></td>
  										<td class='text-center'><?php echo $data['Grupo_Mexico']; ?></td>
  										<td class='text-center'><?php echo $data['Grupo_Mexico_2']; ?></td>
  										<td class='text-center'><?php echo $data['FABRICANTE_ANALISIS_GLORIA']; ?></td>
  										<td class='text-center'><?php echo $data['FECHA']; ?></td>
  										<td class='text-center'><?php echo $data['UNIDADES']; ?></td>
  										<td class='text-center'><?php echo $data['VALOR']; ?></td>
  									<?php } ?>
  									</tr>
  						<?php break; } ?>
  					</tbody>
  				</table>
  			</div>
    <br>
    <br>
    <div class="table-responsive">
      <h5>Catalogo de productos</h5>
      <table class="table table-striped table-bordered" id="table4">
        <thead class="thead-dark">
          <tr>
            <th class='text-center'>ITEM</th>
            <th class='text-center'>Mercado</th>
            <th class='text-center'>Sub Mercado</th>
            <th class='text-center'>Atributo Categoria</th>
            <th class='text-center'>Laboratorio</th>
            <th class='text-center'>Laboratorio Completo</th>
            <th class='text-center'>Descripción</th>
            <th class='text-center'>SUN FILE</th>
            <th class='text-center'>Pais</th>
            <th class='text-center'>ACCIONES</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query1 = mysqli_query($conexion, "SELECT * FROM master_latam WHERE ITEM = '$ITEM'");
          while($data1 = mysqli_fetch_array($query1)) {
            ?>
              <tr>
                <td class='text-center'><input type="hidden" id="ITEM" name="ITEM" value="<?php echo $data1['ITEM']; ?>"><?php echo $data1['ITEM']; ?></td>
                <td class='text-center'><input type="text" id="Mercado" name="Mercado" style="width: 60px;" value="<?php echo $data1['Mercado']; ?>"></td>
                <td class='text-center'><input type="text" id="Sub_mercado" name="Sub_mercado" style="width: 90px;" value="<?php echo $data1['Sub_mercado']; ?>"></td>
                <td class='text-center'><input type="text" id="Atributo_categoria" name="Atributo_categoria" style="width: 140px;" value="<?php echo $data1['Atributo_categoria']; ?>"></td>
                <td class='text-center'><input type="text" id="Laboratorio" name="Laboratorio" style="width: 90px;" value="<?php echo $data1['Laboratorio']; ?>"></td>
                <td class='text-center'><input type="text" id="Laboratorio_completo" name="Laboratorio_completo" style="width: 170px;" value="<?php echo $data1['Laboratorio_completo']; ?>"></td>
                <td class='text-center'><input type="text" id="Descripcion" name="Descripcion" style="width: 190px;" value="<?php echo $data1['Descripcion']; ?>"></td>
                <td class='text-center'><input type="text" id="Sun_file" name="Sun_file" style="width: 90px;" value="<?php echo $data1['Sun_file']; ?>"></td>
                <td class='text-center'><input type="text" id="Pais" name="Pais" style="width: 90px;" value="<?php echo $data1['Pais']; ?>"></td>
                <td class='text-center'><a href="" id="guardar" name="guardar" class="btn btn-primary" onclick="ejecutarPHP()"><i class="fas fa-save"></i></td>
              <?php } ?>
              </tr>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
<?php include_once "footer.php"; ?>
