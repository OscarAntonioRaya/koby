<?php
if (isset($_COOKIE["seleccion"])) {
	$data = json_decode($_COOKIE['seleccion'], true);

	//Primero revisamos si existe en la cookie los datos de la forma y la imagen elegidas.
	//Si existen, creamos la ruta de la imagen y e la forma.
	//Además creams la variable $imagenExiste para validar en el html si mostramos Croppic o
	//mostramos el mensaje de que la imagen no existe
	if (isset($data['forFr']) && isset($data['forImg']) && isset($data['fecha']) && isset($data['fotoCod'])) {
		$fecha = (strftime("%Y/%m", strtotime(($data['forFr']))));
		$nombre = $data['forImg'];
		$rutaForma = 'upload/formas/' . $fecha . '/' . $nombre . '.png';

		$fecha = (strftime("%Y/%m", strtotime(($data['fecha']))));
		$nombre = $data['fotoCod'];
		$ruta = 'upload/pedidos/' . $fecha . '/' . $nombre . '.jpg';

		$imagenExiste = true;
	} else {
		$imagenExiste = false;
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="assets/img/favicon.png">
	<title>Print Block - Ajustar Imagen</title>
	<!-- Bootstrap core CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- Custom styles for this template -->
	<link href="assets/css/main.css" rel="stylesheet">
	<link href="assets/css/croppic.css" rel="stylesheet">
	<!-- Fonts from Google Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Mrs+Sheppards&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
	<style>
		body {
			background-color: #ededed;
		}

		.boton-rojo {
			background-color: #ff2d3e;
			border-color: #ff2d3e;
		}

		.boton-rojo:hover {
			background-color: #d60021;
			border-color: #ff2d3e;
		}
	</style>
</head>

<body>
	<div class="container-fluid overflow-hidden" style="max-width: 100vw !important;">
		<div class="row justify-content-center justify-content-md-start">
			<div class="col-md-1 d-md-block d-none">
				<a href="/">
					<img src="logo.png" alt="logo" class="img-fluid">
				</a>
			</div>
			<div class="col-4 col-md-1 d-block d-md-none text-center pt-5">
				<a href="/">
					<img src="logo.png" alt="logo" class="img-fluid">
				</a>
			</div>
		</div>
	</div>

	<?php
	//Aquí validamos la variable para saber si existen los datos de la imagen en la cookie.
	if ($imagenExiste) {
	?>
		<div class="container mt-3 mt-md-0 py-4 overflow-hidden card" style="border-radius: 50px; box-shadow: 0px 0px 5px lightgray;">
			<div class="row">
				<div class="col-12 text-center">
					<h3>Ajuste su imagen, y de click en continuar.</h3>
				</div>
			</div>
			<div class="row justify-content-center pt-4">
				<div class="col-lg-4">
					<img class="" style="margin-right: 0 !important; width: 20rem; height:20rem; position: absolute; z-index: 2; pointer-events: none;" src="<?php echo $rutaForma; ?>" alt="Forma Seleccionada">
					<div class=" overflow-hidden" id="cropContainerPreload" style="width: 20rem; height: 20rem;"></div>
				</div>
			</div>
			<div class="row pt-4 justify-content-center">
				<div class="col-md-4 text-center">
					<a id="crop" href="#" class="btn btn-primary py-3 w-100 boton-rojo">Continuar</a>
				</div>
			</div>
		</div>

	<?php
	} else {
		//Aquí, ya sabemos que no existe la imagen en la cookie, o ni siquiera existe la cookie
		//Vamos a mostrar el mensaje de imagen no encontrada, pero quitamos la cookie en caso que exista.
		//De todos modos vamos a regresar al inicio de los pasos.
		unset($_COOKIE['seleccion']);
	?>
		<div class="container p-5">
			<div class="row justify-content-center">
				<div class="card col-md-6 text-center p-5" style="box-shadow: 0px 0px 5px lightgray; border-radius: 50px;">
					<h2>
						Imagen no encontrada, da click en continuar para realizar un nuevo diseño.
					</h2>
					<br> <br>
					<div class="row justify-content-center">
						<div class="col-md-6">
							<a href="/crear" class="btn btn-primary py-3 w-100 boton-rojo">Continuar</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
	?>
	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<!-- <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script> -->
	<script src=" https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<script src="assets/js/jquery.mousewheel.min.js"></script>
	<script src="croppic.js"></script>
	<script src="assets/js/main.js"></script>
	<script>
		var croppicContainerPreloadOptions = {
			uploadUrl: 'img_save_to_file.php',
			cropUrl: 'img_crop_to_file.php',
			loadPicture: '<?php echo $ruta; ?>',
			enableMousescroll: true,
			loaderHtml: '<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
			onBeforeImgUpload: function() {
				console.log('onBeforeImgUpload')
			},
			onAfterImgUpload: function() {
				console.log('onAfterImgUpload')
			},
			onImgDrag: function() {
				console.log('onImgDrag')
			},
			onImgZoom: function() {
				console.log('onImgZoom')
			},
			onBeforeImgCrop: function() {
				console.log('onBeforeImgCrop')
			},
			onAfterImgCrop: function() {
				console.log('onAfterImgCrop')
				window.location = ('/detallespedido.html?img=' + response.url);
			},
			onReset: function() {
				console.log('onReset')
			},
			onError: function(errormessage) {
				console.log('onError:' + errormessage)
			}
		}
		var cropContainerPreload = new Croppic('cropContainerPreload', croppicContainerPreloadOptions);
		crop.onclick = function() {
			cropContainerPreload.crop();
		}
	</script>
</body>

</html>