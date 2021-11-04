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

	<link href="assets/css/bootstrap.css" rel="stylesheet">



	<!-- Custom styles for this template -->

	<link href="assets/css/main.css" rel="stylesheet">

	<link href="assets/css/croppic.css" rel="stylesheet">



	<!-- Fonts from Google Fonts -->

	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>

	<link href='http://fonts.googleapis.com/css?family=Mrs+Sheppards&subset=latin,latin-ext' rel='stylesheet' type='text/css'>



	<script>
		(function(i, s, o, g, r, a, m) {

			i['GoogleAnalyticsObject'] = r;

			i[r] = i[r] || function() {

				(i[r].q = i[r].q || []).push(arguments)

			}, i[r].l = 1 * new Date();

			a = s.createElement(o),

				m = s.getElementsByTagName(o)[0];

			a.async = 1;

			a.src = g;

			m.parentNode.insertBefore(a, m)

		})(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

		ga('create', 'UA-10627690-5', 'auto');

		ga('send', 'pageview');
	</script>



	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

	<!--[if lt IE 9]>

      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>

    <![endif]-->

</head>



<body style="background-color: #ededed !important;">



	<!-- Fixed navbar -->

	<div class="navbar navbar-default navbar-fixed-top" style="background-color: #ededed !important;">

		<div class="container">

			<div class="navbar-header">

				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

				</button>

				<a class="navbar-brand" href="#">

					<img src="logo.png" alt="logo" style="max-width: 8rem; max-height: auto;">

				</a>

			</div>

		</div>

	</div>







	<div class="container" style="margin-top: 10rem">

		<h2 class="centered" style="margin-bottom: 8rem">Ajuste su imagen, y después capturela</h2>

		<div class="row mt ">

			<div class="col-lg-5 "></div>

			<div class="col-lg-2">

				<img src="/upload/formas/2021/09/2YAMVYK5HT.png" style="pointer-events: none !important; width: 100% !important; height: auto !important; position: absolute !important; z-index: 2 !important;">

				<div id="cropContainerPreload"></div>

			</div>

			<div class="col-lg-5 "></div>

		</div>

	</div>



	<!-- Bootstrap core JavaScript

    ================================================== -->

	<!-- Placed at the end of the document so the pages load faster -->

	<!-- <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script> -->

	<script src=" https://code.jquery.com/jquery-2.1.3.min.js"></script>



	<script src="assets/js/bootstrap.min.js"></script>

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

			},

			onReset: function() {

				console.log('onReset')

			},

			onError: function(errormessage) {

				console.log('onError:' + errormessage)

			}

		}

		var cropContainerPreload = new Croppic('cropContainerPreload', croppicContainerPreloadOptions);
	</script>

</body>



</html>