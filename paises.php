<!DOCTYPE html>
<html lang="en" dir="ltr">
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
	<script type="text/javascript">
	function confirmdelete()
	{
	Item=document.getElementById("ITEM").value;
	var respuesta = confirm("¿Estas seguro de eliminar este registro?");
		if (respuesta==true)
		{
			return true;
		}
		else
		{
		return false;
		}
	}
</script>
	<body>
	<div class="centro">
		<div class="paises">
		<a href="?pais=peru">
			<img src="img/peru.jpg" weigth="50px" height="50px" class="imgcss">
			<br><center>Perú</center>
		</a>
		&nbsp;
		&nbsp;
		<a href="?pais=colombia">
			<img src="img/colombia.jpg" weigth="50px" height="50px" class="imgcss">
			<br><center>Colombia</center>
		</a>
		&nbsp;
		&nbsp;
		<a href="?pais=mexico">
			<img src="img/mexico.jpg" weigth="50px" height="50px" class="imgcss">
			<br><center>México</center>
		</a>
		&nbsp;
		&nbsp;
		<a href="?pais=cam">
			<img src="img/cam.jpg" weigth="50px" height="50px" class="imgcss">
			<br><center>CAM</center>
		</a>
		&nbsp;
		&nbsp;
		<a href="?pais=chile">
			<img src="img/chile.jpg" weigth="50px" height="50px" class="imgcss">
			<br><center>Chile</center>
		</a>
		&nbsp;
		&nbsp;
		<a href="?pais=brasil">
			<img src="img/brasil.jpg" weigth="50px" height="50px" class="imgcss">
			<br><center>Brasil</center>
		</a>
		&nbsp;
		&nbsp;
		<a href="?pais=ecuador">
			<img src="img/ecuador.jpg" weigth="50px" height="50px" class="imgcss">
			<br><center>Ecuador</center>
		</a>
		&nbsp;
		&nbsp;
		</div>
		<br>
		<h3>
		Base <?php
		if (isset($_GET['pais']))
		{
			$pais = $_GET['pais'];
			echo $pais;
		}
		else
		{
			$pais="-";
		}
		?>
	  </h3>
		<br>
		<button class="btn btn-danger" onclick="window.location.href = 'index.php';">Regresar</button>
		<br>
		<?php switch ($pais) {
			case 'peru': ?>
			<div class="table-responsive">
				<table class="table table-striped table-bordered" id="table2">
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
							$query = mysqli_query($conexion, "SELECT * FROM peru ORDER BY ITEM ASC LIMIT 1000");
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
				<table class="table table-striped table-bordered" id="table2">
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
							$query = mysqli_query($conexion, "SELECT * FROM colombia ORDER BY ITEM ASC LIMIT 1000");
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
				<table class="table table-striped table-bordered" id="table2">
					<thead class="thead-dark">
						<tr>
							<th class='text-center'>ITEM</th>
							<th class='text-center'>MERCADO</th>
							<th class='text-center'>SEGMENTO1</th>
							<th class='text-center'>SEGMENTO2</th>
              <th class='text-center'>SEGMENTO3</th>
							<th class='text-center'>PRESENTACION</th>
							<th class='text-center'>MercadoID</th>
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
							$query = mysqli_query($conexion, "SELECT * FROM mexico ORDER BY ITEM ASC LIMIT 1000");
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
				<table class="table table-striped table-bordered" id="table2">
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
							$query = mysqli_query($conexion, "SELECT * FROM cam ORDER BY ITEM ASC LIMIT 1000");
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
				<table class="table table-striped table-bordered" id="table2">
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
							$query = mysqli_query($conexion, "SELECT * FROM chile ORDER BY ITEM ASC LIMIT 1000");
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
				<table class="table table-striped table-bordered" id="table2">
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
							$query = mysqli_query($conexion, "SELECT * FROM brasil ORDER BY ITEM ASC LIMIT 1000");
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
				<table class="table table-striped table-bordered" id="table2">
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
							$query = mysqli_query($conexion, "SELECT * FROM ecuador ORDER BY ITEM ASC LIMIT 1000");
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
		</div>
	</body>
</html>
<?php include_once "footer.php"; ?>
