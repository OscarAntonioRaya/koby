<?php
if (isset($_COOKIE["seleccion"])) {
	$data = json_decode($_COOKIE['seleccion'], true);
	$x1 = (strftime("%Y/%m", strtotime(($data['forFr']))));
	$x2 = $data['forImg'];
	$rutaForma = 'upload/formas/' . $x1 . '/' . $x2 . '.png';
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
	<title>Ajustar Imagen</title>
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
</head>

<body style="background-color: #ededed !important;">
	<div class="container-fluid overflow-hidden" style="max-width: 100vw !important;">
		<div class="row justify-content-center justify-content-md-start">
			<div class="col-md-1 d-md-block d-none">
				<img src="logo.png" alt="logo" class="img-fluid">
			</div>
			<div class="col-4 col-md-1 d-block d-md-none text-center pt-5">
				<img src="logo.png" alt="logo" class="img-fluid">
			</div>
		</div>
	</div>
	<div class="container pt-md-0 py-5 overflow-hidden" style="max-width: 100vw !important;">
		<div class="row">
			<div class="col-12 text-center">
				<h2>Ajuste su imagen, y de click en continuar.</h2>
			</div>
		</div>
	</div>
	<div class="container overflow-hidden" style="max-width: 100vw !important;">
		<div class="row justify-content-center">
			<div class="col-md-4" style="padding-left: 2rem">
				<img class=" " style="width: 20rem; height:20rem; position: absolute; z-index: 2; pointer-events: none;" src="<?php echo $rutaForma; ?>" alt="">
				<div class="overflow-hidden" id="cropContainerPreload" style="width: 20rem; height: 20rem"></div>
			</div>
		</div>
	</div>
	<div class="container pt-5">
		<div class="row">
			<div class="col-12 text-center">
				<a id="crop" href="#" class="btn btn-primary">Continuar</a>
			</div>
		</div>
	</div>
	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<!-- <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script> -->
	<script src=" https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<script src="assets/js/jquery.mousewheel.min.js"></script>
	<script src="croppic.js"></script>
	<script src="assets/js/main.js"></script>
	<?php
	$data = json_decode($_COOKIE['seleccion'], true);
	$x1 = (strftime("%Y/%m", strtotime(($data['fecha']))));
	$x2 = $data['fotoCod'];
	$ruta = 'upload/pedidos/' . $x1 . '/' . $x2 . '.jpg';
	?>
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
				window.location = ('/?img=' + response.url);
			},
			onReset: function() {
				console.log('onReset')
			},
			onError: function(errormessage) {
				console.log('onError:' + errormessage)
			}
		}
		var cropContainerPreload = new Croppic('cropContainerPreload', croppicContainerPreloadOptions);
		crop.onclick = function(){ cropContainerPreload.crop();}
	</script>
</body>

</html>