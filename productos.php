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
		<h3>Lista de Productos</h3>
		<br>
		<button class="btn btn-danger" onclick="window.location.href = 'index.php';">Regresar</button>
		<br>
		<button class="btn btn-success" onclick="window.location.href = 'nuevo.php';">Nuevo</button>
			<div class="table-responsive">
				<table class="table table-striped table-bordered" id="table2">
					<thead class="thead-dark">
						<tr>
							<th class='text-center'>ITEM</th>
							<th class='text-center'>Mercado</th>
							<th class='text-center'>Sub Mercado</th>
							<th class='text-center'>Atributo Categoria</th>
							<th class='text-center'>Laboratorio</th>
              <th class='text-center'>Laboratorio_Completo</th>
							<th class='text-center'>Descripción</th>
							<th class='text-center'>SUN_FILE</th>
							<th class='text-center'>Pais</th>
							<th class='text-center' style="width:100px;">Acciones</th>
						</tr>
					</thead>
					<tbody>
						<?php
						include "conexion.php";
							$query = mysqli_query($conexion, "SELECT * FROM master_latam ORDER BY ITEM ASC LIMIT 1000");
							while($data = mysqli_fetch_array($query)) {
								?>
									<tr>
										<td class='text-center'><input type="hidden" id="ITEM" name="ITEM" value="<?php echo $data['ITEM']; ?>"><?php echo $data['ITEM']; ?></td>
										<td class='text-center'><?php echo $data['Mercado']; ?></td>
										<td class='text-center'><?php echo $data['Sub_mercado']; ?></td>
										<td class='text-center'><?php echo $data['Atributo_categoria']; ?></td>
										<td class='text-center'><?php echo $data['Laboratorio']; ?></td>
										<td class='text-center'><?php echo $data['Laboratorio_completo']; ?></td>
										<td class='text-center'><?php echo $data['Descripcion']; ?></td>
										<td class='text-center'><?php echo $data['Sun_file']; ?></td>
										<td class='text-center'><?php echo $data['Pais']; ?></td>
										<td class='text-center'>
											<button class="btn btn-warning" id="editar" name="editar" onclick="window.location.href = 'editar.php?id=' + '<?php echo $data['ID']; ?>';"><i class="fas fa-edit"></i></button>
											<a href="eliminar.php?id=<?php echo $data['ID']; ?>" class="btn btn-danger" onclick="return confirmdelete()"><i class='fas fa-trash-alt'></i></a>
										</td>
									<?php } ?>
									</tr>
							</tbody>
				</table>
			</div>
		</div>
	</body>
</html>
<?php include_once "footer.php"; ?>
