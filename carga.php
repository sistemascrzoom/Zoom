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
			$("#pais").hide();
			$("#titpa").hide();
			pais=document.getElementById("pais").value;
			switch (pais)
			{
				case "CAM":
					paisc = "CAM.php";
					break;
				case "Chile":
					paisc = "Chile.php";
					break;
				case "Colombia":
					paisc = "Colombia.php";
					break;
				case "Peru":
					paisc = "Peru.php";
					break;
				case "Mexico":
					paisc = "Mexico.php";
					break;
				case "Brasil":
					paisc = "Brasil.php";
					break;
			}
			$.ajax({
				url: paisc, // Nombre del archivo PHP
				type: "POST", // Método HTTP utilizado
				data: {pais:pais},
				dataType: "html", // Tipo de datos que se espera recibir
				success: function(resultado) {
					$("#resultado").html(resultado); // Muestra el resultado del archivo PHP
					$("#gif").hide();
					$("#text").hide();
					window.open("data/xls/nuevo-"+ pais +".xlsx", '_blank')
				}
			});
		}
	</script>
<body>
<div class="centro">
	<h3>Manejador de base de datos - BDF</h3>
	<span id="titpa" name="titpa">Elije Pais:</span>
	<input type="Text" id="pais" name="pais" list="paises" required>
	<datalist id="paises">
		<option value="Colombia" id="colombia" name="colombia"></option>
		<option value="Mexico" id="mexico" name="mexico"></option>
		<option value="Peru" id="peru" name="peru"></option>
		<option value="Ecuador" id="ecuador" name="ecuador"></option>
		<option value="CAM" id="cam" name="cam"></option>
		<option value="Chile" id="chile" name="chile"></option>
		<option value="Brasil" id="brasil" name="brasil"></option>
	</datalist>
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
