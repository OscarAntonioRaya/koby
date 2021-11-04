<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajustar Imagen</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="assets/css/croppic.css" rel="stylesheet">
</head>

<body>
    <div class="container">
    <div class="row mt">
            <div class="col-lg-2">
            <img style="width: 75px; height: auto;" class="img" src="/logo.png" alt="">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 ">
                <h4 class="centered"> Ajustar Imagen </h4>
                <p class="centered">Acomode la imagen para colocarla en la mejor posición</p>
                <br>
                <br>
                <div id="cropContainerPreload"></div>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>

    <script src=" https://code.jquery.com/jquery-2.1.3.min.js"></script>

    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.mousewheel.min.js"></script>
    <script src="croppic.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
        <?php
        $data = json_decode($_COOKIE['seleccion'], true);
        ?>
        var croppicContainerPreloadOptions = {
            uploadUrl: '/img_save_to_file.php',
            cropUrl: '/img_crop_to_file.php',
            loadPicture: '/upload/pedidos/<?php echo (strftime("%Y/%m", strtotime(($data['fecha'])))); ?>/<?php echo ($data['fotoCod']) ?>.jpg',
            enableMousescroll: true,
            loaderHtml: '<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> '
        }
        <?php
        $data = json_decode($_COOKIE['seleccion'], true);
        ?>
        var cropContainerPreload = new Croppic('cropContainerPreload', croppicContainerPreloadOptions);
    </script>
</body>

</html>