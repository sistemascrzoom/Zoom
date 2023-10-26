<!DOCTYPE html>
<html>
<head>
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
	<script>
		function ejecutarPHP() {
			$("#gif").show();
			$("#text").show();
			$("#ejecutar").hide();
			$("#regresar").hide();
			$.ajax({
				url: "cargan.php", // Nombre del archivo PHP
				type: "POST", // Método HTTP utilizado
				//data: {pais:pais},
				dataType: "html", // Tipo de datos que se espera recibir
				success: function(resultado) {
					$("#resultado").html(resultado); // Muestra el resultado del archivo PHP
					$("#gif").hide();
					$("#text").hide();
				}
			});
		}
	</script>
<body>
<div class="centro">
	<h3>Manejador de base de datos - BDF</h3>
	<br>
	<h5>Cargar nuevo(s) producto(s)</h5>
	<br>
	<button id="ejecutar" name="ejecutar" class="btn btn-info" onclick="ejecutarPHP()">Cargar datos</button>
	<br>
	<button id="regresar" name="regresar" class="btn btn-danger" onclick="window.location.href = 'index.php';">Regresar</button>
	<div id="resultado"></div>
	<br>
	<img src="cargando.gif" width="40px" height="40px" id=gif style="display:none">
	<br>
	<span style="display:none" id="text">Cargando Datos...</span>
</div>
</body>
</html>
