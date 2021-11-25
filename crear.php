<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/config.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/include/funciones.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_COOKIE["seleccion"])) {
  $data = json_decode($_COOKIE['seleccion'], true);
  $flag = false;

  if ((isset($_REQUEST['tex']) & (isset($_REQUEST['tex'])))) {
    extract($_REQUEST);
    $pasos = 2;
    $materialData = $db->getAllRecords('pbMateriales', '*', 'AND id="' . $tex . '" LIMIT 1')[0];
    $seleccion = array(
      "texId"    => $materialData['id'],
      "texNom"   => $materialData['nombre'],
    );
    //Y REESCRIBIMOS LA COOKIE DE 1 HORA
    //SI EL USUARIO REINICIA, SOBREESCRIBIMOS TODA LA COOKIE COMPLETA.
    setcookie("seleccion", json_encode($seleccion), time() + 3600, "/");
    header('Location: /crear?tex2=' . $materialData['id'] . '');
    exit;
  }
  //Primer paso
  if ((isset($_REQUEST['tex2']) & (isset($_REQUEST['tex2'])))) {
    extract($_REQUEST);
    $pasos = 2;
    $data = json_decode($_COOKIE['seleccion'], true);
    $seleccion = array(
      "texId"    => $data['texId'],
      "texNom"   => $data['texNom'],
    );
    //Y REESCRIBIMOS LA COOKIE DE 1 HORA
    //SI EL USUARIO REINICIA, SOBREESCRIBIMOS TODA LA COOKIE COMPLETA.
    setcookie("seleccion", json_encode($seleccion), time() + 3600, "/");
    $flag = true;
  }
  //SEGUNDO PASO
  //RECORREMOS EL ARRAY PARA CONSEGUIR PRECIO SELECCIONADO EN EL
  if ((isset($_REQUEST['form']) & (isset($_REQUEST['form'])))) {
    extract($_REQUEST);
    $pasos = 3;
    $materialData = $db->getAllRecords('pbFormas', '*', 'AND id="' . $form . '" LIMIT 1')[0];
    $data = json_decode($_COOKIE['seleccion'], true);
    $seleccion = array(
      "texId"    => $data['texId'],
      "texNom"   => $data['texNom'],
      "forId"    => $materialData['id'],
      "forNom"   => $materialData['nombre'],
      "forImg"   => $materialData['forma'],
      "forFr"    => $materialData['fr'],
    );
    //Y REESCRIBIMOS LA COOKIE DE 1 HORA
    //SI EL USUARIO REINICIA, SOBREESCRIBIMOS TODA LA COOKIE COMPLETA.
    setcookie("seleccion", json_encode($seleccion), time() + 3600, "/");
    header('Location: /crear?formSel=' . $materialData['id'] . '');
    exit;
  }
  //SEGUNDO PASO
  //RECORREMOS EL ARRAY PARA CONSEGUIR PRECIO SELECCIONADO EN EL
  if ((isset($_REQUEST['formSel']) & (isset($_REQUEST['formSel'])))) {
    extract($_REQUEST);
    $pasos = 3;
    $data = json_decode($_COOKIE['seleccion'], true);
    $seleccion = array(
      "texId"    => $data['texId'],
      "texNom"   => $data['texNom'],
      "forId"    => $data['forId'],
      "forNom"   => $data['forNom'],
      "forImg"   => $data['forImg'],
      "forFr"    => $data['forFr'],
    );
    //Y REESCRIBIMOS LA COOKIE DE 1 HORA
    //SI EL USUARIO REINICIA, SOBREESCRIBIMOS TODA LA COOKIE COMPLETA.
    setcookie("seleccion", json_encode($seleccion), time() + 3600, "/");
    $flag = true;
  }
  //TERCER PASO
  //RECORREMOS EL ARRAY PARA CONSEGUIR PRECIO SELECCIONADO EN EL
  if ((isset($_REQUEST['med']) & (isset($_REQUEST['med'])))) {
    extract($_REQUEST);
    $pasos = 4;
    $tarifaData = $db->getAllRecords('pbTarifas', '*', 'AND id="' . $med . '" LIMIT 1')[0];
    $tamSel = $db->getAllRecords('pbTiposMedidas', '*', 'AND id="' . $tarifaData['tipoMedida'] . '" LIMIT 1')[0];
    $data = json_decode($_COOKIE['seleccion'], true);
    $seleccion = array(
      "texId"     => $data['texId'],
      "texNom"    => $data['texNom'],
      "forId"     => $data['forId'],
      "forNom"    => $data['forNom'],
      "forImg"    => $data['forImg'],
      "forFr"     => $data['forFr'],
      "tarId"     => $tarifaData['id'],
      "tarPrecio" => $tarifaData['precio'],
      "tarTam"    => $tamSel['nombre'],
    );
    //Y REESCRIBIMOS LA COOKIE DE 1 HORA
    //SI EL USUARIO REINICIA, SOBREESCRIBIMOS TODA LA COOKIE COMPLETA.
    setcookie("seleccion", json_encode($seleccion), time() + 3600, "/");
    header('Location: /crear?tarSel=' . $tarifaData['id'] . '');
    exit;
  }
  //TERCER PASO
  //RECORREMOS EL ARRAY PARA CONSEGUIR PRECIO SELECCIONADO EN EL
  if ((isset($_REQUEST['tarSel']) & (isset($_REQUEST['tarSel'])) & (!isset($_REQUEST['submit'])))) {
    extract($_REQUEST);
    $pasos = 4;
    $data = json_decode($_COOKIE['seleccion'], true);
    $seleccion = array(
      "texId"     => $data['texId'],
      "texNom"    => $data['texNom'],
      "forId"     => $data['forId'],
      "forNom"    => $data['forNom'],
      "forImg"    => $data['forImg'],
      "forFr"     => $data['forFr'],
      "tarId"     => $data['tarId'],
      "tarPrecio" => $data['tarPrecio'],
      "tarTam"    => $data['tarTam'],
    );
    //Y REESCRIBIMOS LA COOKIE DE 1 HORA
    //SI EL USUARIO REINICIA, SOBREESCRIBIMOS TODA LA COOKIE COMPLETA.
    setcookie("seleccion", json_encode($seleccion), time() + 3600, "/");
    $flag = true;
  }
  if (isset($_REQUEST['submit']) and $_REQUEST['submit'] != "") {
    extract($_REQUEST);
    $pasos = 5;
    if (($_FILES['thumb']['tmp_name']) == "") {
      setcookie("msg", "basic", time() + 2, "/");
      header('location: /crear?tarSel=' . $data['tarId'] . '');
      exit;
    } else {
      $fecha = date("Y-m-d H:i:s");
      $mesr = strftime("%m");
      $anor = strftime("%Y");
      if (!empty($_FILES['thumb']['tmp_name'])) {
        $thumb = $_FILES['thumb']['tmp_name']; //DEFINIMOS LA VARIABLE THUMB YA SABEMOS QUE SI SE CARGÓ UNA FOTO
        if ($_FILES['thumb']['type'] !== 'image/jpeg') {
          setcookie("msg", "fnv", time() + 2, "/");
          header('location: /crear?tarSel=' . $data['tarId'] . '');
          exit;
        }
        //if (($_FILES['thumb']['size']) > 1000000) {
        //  setcookie("msg", "fnvz", time() + 2, "/");
        //  header('location: /crear?tarSel=' . $data['tarId'] . '');
        //  exit;
        //}
        $codigo = GeraHash(10); //LO USAMOS PARA EL NOMBRE DE LA FOTO
        $ruta = 'upload/pedidos/' . $anor . '/' . $mesr . '';
        //SI LA CARPETA NO EXISTE LA CREAMOS
        if (!file_exists($ruta)) {
          mkdir($ruta, 0777, true);
        }
        //SUBIMOS LA FOTO EN LA CARPETA EXISTENTE O LA CREADA
        $archivo_subido = '' . $ruta . '/' . $codigo . '.jpg';
        move_uploaded_file($thumb, $archivo_subido);
      }
      $pasos = 5;
      $data = json_decode($_COOKIE['seleccion'], true);
      $seleccion = array(
        "texId"     => $data['texId'],
        "texNom"    => $data['texNom'],
        "forId"     => $data['forId'],
        "forNom"    => $data['forNom'],
        "forImg"    => $data['forImg'],
        "forFr"     => $data['forFr'],
        "tarId"     => $data['tarId'],
        "tarPrecio" => $data['tarPrecio'],
        "tarTam"    => $data['tarTam'],
        "fecha" => $fecha,
        "fotoCod" => $codigo
      );
      setcookie("seleccion", json_encode($seleccion), time() + 3600, "/");
      header('location: /ajustarimagen.php');
    }
    $flag = true;
  }

  if (!$flag) {
    header('location: /');
  }
} else {
  //PRIMER PASO
  //RECORREMOS EL ARRAY PARA CONSEGUIR PRECIO SELECCIONADO EN EL
  if ((isset($_REQUEST['tex']) & (isset($_REQUEST['tex'])))) {
    extract($_REQUEST);
    $pasos = 2;
    $materialData = $db->getAllRecords('pbMateriales', '*', 'AND id="' . $tex . '" LIMIT 1')[0];
    $seleccion = array(
      "texId"    => $materialData['id'],
      "texNom"   => $materialData['nombre'],
    );
    //Y REESCRIBIMOS LA COOKIE DE 1 HORA
    //SI EL USUARIO REINICIA, SOBREESCRIBIMOS TODA LA COOKIE COMPLETA.
    setcookie("seleccion", json_encode($seleccion), time() + 3600, "/");
    header('Location: /crear?tex2=' . $materialData['id'] . '');
    exit;
  } else {
    $pasos = 1;
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  require_once($_SERVER["DOCUMENT_ROOT"] . "/modulos/head.php");
  ?>
</head>

<body>
  <?php
  if (!isset($pasos)) {
  ?>
    <div id="pageloader" class="pageloader is-left-to-right"></div>
    <div id="infraloader" class="infraloader is-active"></div>
  <?php
  }
  ?>
  <main>
    <!--Main Navbar-->
    <?php
    require_once($_SERVER["DOCUMENT_ROOT"] . "/modulos/nav.php");
    ?>
    <div class="hero is-fullheight is-grey is-bold has-form" data-background="https://dummyimage.com/1920x1080" data-demo-background="/img/crear.jpg">
      <div class="hero-overlay"></div>
      <div class="hero-body">
        <div class="container p-0">
          <div class="columns is-vcentered p-0">
            <?php
            if (isset($pasos)) {
              if ($pasos == 2) {
                //PRIMER PASO ACEPTADO
                $formaData = $db->getAllRecords('pbFormas', '*', ' ORDER BY nombre DESC');
                
                //Guardamos el nombre del material
                $nom = $data['texNom'];

                //Contador para formas disponibles
                $count = 0;

                //Arreglo para guardar formas disponibles
                $formas_disponibles;

                //Recorremos para encontrar las formas disponibles
                foreach ($formaData as $forma) {
                  $formSel = $db->getAllRecords('pbTarifas', '*', ' AND forma="' . $forma['id'] . '" AND material="' . $data['texId'] . '" LIMIT 1');
                  if (!empty($formSel)) {
                    $formas_disponibles[$count] = $forma;
                    $count++;
                  }
                }

                //Si son muy pocas figuras, agregamos la clase "card-form" para ajustar la vista
                $cantidad_de_formas = $count < 3 ? "card-form" : "";

                //Se guarda el título en caso de no haber formas disponibles
                $titulo = $count == 0 ?
                  "Aún no tenemos formas disponibles para $nom, ¡esperalas pronto!" :
                  "Selecciona una de las formas disponibles para <b>$nom</b>.";

              ?>
                <div class="column is-12 is-vcentered">
                  <div class="card <?php echo $cantidad_de_formas; ?> p-5 mt-6" style="border-radius: 25px;">
                    <div class="head">
                      <h2 class="has-text-centered title is-5">
                        <?php echo $titulo; ?>
                      </h2>
                      <div class="has-text-centered columns is-vcentered">
                        <?php
                        if ($count > 0) {
                          foreach ($formas_disponibles as $formas_disponible) {
                        ?>
                            <div class="column">
                              <a href="/crear?form=<?php echo ($formas_disponible['id']) ?>"><img src="/upload/formas/<?php echo (strftime("%Y/%m", strtotime(($formas_disponible['fr'])))); ?>/<?php echo ($formas_disponible['forma']) ?>.png" alt="<?php echo ($formas_disponible['nombre']) ?>"></a>
                              <h4><?php echo ($formas_disponible['nombre']) ?></h4>
                            </div>
                        <?php
                          }
                        }
                        ?>
                      </div>
                    </div>
                  </div>
                  <div style="margin-top: 15px;" class="has-text-centered">
                    <a href="javascript:history.back();" class="button is-primary mx-1">Volver</a>
                  </div>
                </div>
              <?php
              } else if ($pasos == 3) {
                //SEGUNDO PASO ACEPTADO
                $PrintBlockData = $db->getAllRecords('pbTarifas', '*', 'AND material="' . $data['texId'] . '" AND forma="' . $data['forId'] . '" ORDER BY id ASC');
              ?>
                <div class="column is-12 mt-6">
                  <div class="card card-form" data-x-data="initHeroCreateListingForm()" data-x-init="initSelects()">
                    <div class="head">
                      <h2 style="text-align: center;" class="title is-5">
                        PrintBlock de <b><?php echo $data['texNom']; ?></b> con forma de <b><?php echo $data['forNom']; ?></b>.
                        <br><br> Selecciona un tamaño.
                      </h2>
                      <div style="text-align: center;" class="columns is-vcentered">
                        <?php
                        if (count($PrintBlockData) > 0) {
                          $y  =  '';
                          foreach ($PrintBlockData as $PrintBlock) {
                            $medidaSel = $db->getAllRecords('pbTiposMedidas', '*', 'AND id="' . $PrintBlock['tipoMedida'] . '"LIMIT 1')[0];
                            if ($medidaSel['id'] == 1) {
                              $style = "60";
                            }
                            if ($medidaSel['id'] == 2) {
                              $style = "80";
                            }
                            if ($medidaSel['id'] == 3) {
                              $style = "100";
                            }
                        ?>
                            <div class="column is-4">
                              <a style="color:#000" href="/crear?med=<?php echo ($PrintBlock['id']) ?>">
                                <h4><b><?php echo ($medidaSel['nombre']) ?></b></h4>
                              </a>
                              <a style="color:#000" href="/crear?med=<?php echo ($PrintBlock['id']) ?>"><img style="max-width: <?php echo $style; ?>%;" src="/upload/formas/<?php echo (strftime("%Y/%m", strtotime(($data['forFr'])))); ?>/<?php echo ($data['forImg']) ?>.png"></a>
                              <a style="color:#000" href="/crear?med=<?php echo ($PrintBlock['id']) ?>">
                                <h4>$<?php echo number_format($PrintBlock['precio'], 2) ?> MXN</h4>
                              </a>
                            </div>
                        <?php
                          }
                        }
                        ?>
                      </div>
                    </div>
                  </div>
                  <div style="margin-top: 15px;" class="has-text-centered">
                    <a href="javascript:history.back();" class="button is-primary mx-1">Volver</a>
                  </div>
                </div>
              <?php
              } else if ($pasos == 4) {
                //TERCER PASO ACEPTADO
              ?>
                <style>
                  .input-file-container {
                    position: relative;
                    width: 225px;
                  }

                  .js .input-file-trigger {
                    display: block;
                    padding: 14px;
                    background: #ff2d3e;
                    color: #fff;
                    font-size: 1em;
                    transition: all .4s;
                    cursor: pointer;
                  }

                  .js .input-file {
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 225px;
                    opacity: 0;
                    padding: 14px 0;
                    cursor: pointer;
                  }

                  .js .input-file:hover+.input-file-trigger,
                  .js .input-file:focus+.input-file-trigger,
                  .js .input-file-trigger:hover,
                  .js .input-file-trigger:focus {
                    background: #d60021;
                    color: #d60021;
                  }

                  .file-return {
                    margin: 0;
                  }

                  .file-return:not(:empty) {
                    margin: 1em 0;
                  }

                  .js .file-return {
                    font-style: italic;
                    font-size: .9em;
                    font-weight: bold;
                  }

                  .js .file-return:not(:empty):before {
                    content: "Selected file: ";
                    font-style: normal;
                    font-weight: normal;
                  }

                  /* Useless styles, just for demo styles */
                  body {
                    font-family: "Open sans", "Segoe UI", "Segoe WP", Helvetica, Arial, sans-serif;
                    color: #7F8C9A;
                    background: #FCFDFD;
                  }

                  h1,
                  h2 {
                    margin-bottom: 5px;
                    font-weight: normal;
                    text-align: center;
                    color: #aaa;
                  }

                  h2 {
                    margin: 5px 0 2em;
                    color: #1ABC9C;
                  }

                  form {
                    width: 225px;
                    margin: 0 auto;
                    text-align: center;
                  }

                  h2+P {
                    text-align: center;
                  }

                  .txtcenter {
                    margin-top: 4em;
                    font-size: .9em;
                    text-align: center;
                    color: #aaa;
                  }

                  .copy {
                    margin-top: 2em;
                  }

                  .copy a {
                    text-decoration: none;
                    color: #1ABC9C;
                  }
                </style>
                <div class="column is-12 mt-6">
                  <div class="card card-form" data-x-data="initHeroCreateListingForm()" data-x-init="initSelects()">
                    <div class="head">
                      <h2 style="text-align: center;" class="title is-5">
                        ¡Carga tu fotografía!
                      </h2>
                      <div style="text-align: center;" class="columns is-vcentered">
                        <form enctype="multipart/form-data" novalidate="" method="post">
                          <div class="input-file-container">
                            <input required class="input-file" id="my-file" name="thumb" type="file">
                            <label tabindex="0" for="my-file" class="input-file-trigger ">Seleccionar archivo...</label>
                          </div>
                          <p class="file-return"></p>
                          <div style="margin-top: 50px;">
                            <button class="button is-primary mx-1" type="submit" name="submit" value="Submit">Subir</button>
                          </div>
                          <div style="margin-top: 15px;" class="has-text-centered">
                            <a href="javascript:history.back();" class="button is-primary mx-1">Volver</a>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <script>
                  document.querySelector("html").classList.add('js');
                  var fileInput = document.querySelector(".input-file"),
                    button = document.querySelector(".input-file-trigger"),
                    the_return = document.querySelector(".file-return");
                  button.addEventListener("keydown", function(event) {
                    if (event.keyCode == 13 || event.keyCode == 32) {
                      fileInput.focus();
                    }
                  });
                  button.addEventListener("click", function(event) {
                    fileInput.focus();
                    return false;
                  });
                  fileInput.addEventListener("change", function(event) {
                    the_return.innerHTML = this.value;
                  });
                </script>
              <?php
              } else if ($pasos == 5) {
                //Acá no hay nada xD
              } else if ($pasos == 1) {
                //PASO 1
                //PASO 1
                //PASO 1
                //PASO 1
                $materialData = $db->getAllRecords('pbMateriales', '*', ' ORDER BY nombre DESC');
              ?>
                <div class="column is-12 mt-6">
                  <div class="card card-form mt-6" data-x-data="initHeroCreateListingForm()" data-x-init="initSelects()">
                    <div class="head">
                      <h2 style="text-align: center;" class="title is-5">
                        Selecciona una textura
                      </h2>
                      <div style="text-align: center;" class="columns is-vcentered">
                        <?php
                        if (count($materialData) > 0) {
                          $y  =  '';
                          foreach ($materialData as $material) {
                        ?>
                            <div class="column is-4">
                              <a href="/crear?tex=<?php echo ($material['id']) ?>"><img src="/upload/texturas/<?php echo (strftime("%Y/%m", strtotime(($material['fr'])))); ?>/<?php echo ($material['textura']) ?>.jpg" alt="<?php echo ($material['nombre']) ?>"></a>
                              <h4><?php echo ($material['nombre']) ?></h4>
                            </div>
                        <?php
                          }
                        }
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
              <?php
              }
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </main>
  <div class="progress-wrap" data-x-data="initBackToTop()" data-x-init="setup()" data-x-on:scroll.window="scroll()" data-x-bind:class="{
        'active-progress': scrolled,
        '': !scrolled,
        }" data-x-on:click="scrollTop()">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
      <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
  </div>
  <div id="languages-modal" class="modal">
    <div class="modal-background modal-dismiss"></div>
    <div class="modal-content">
      <!--Modal card-->
      <div class="card">
        <header class="card-header">
          <div class="card-header-title">
            <span>Seleccionar idioma</span>
          </div>
          <button class="modal-dismiss">
            <span class="icon">
              <i data-feather="x"></i>
            </span>
          </button>
        </header>
        <div class="card-content">
          <div class="check-cards-group">
            <!--Card-->
            <div class="check-card">
              <input type="radio" name="language_selection" checked />
              <div class="check-card-inner">
                <img src="https://dummyimage.com/150x150" data-demo-src="img/icons/flags/united-states-of-america.svg" alt="" />
                <div class="meta">
                  <span>English [US]</span>
                </div>
              </div>
            </div>
            <!--Card-->
            <div class="check-card">
              <input type="radio" name="language_selection" />
              <div class="check-card-inner">
                <img src="https://dummyimage.com/150x150" data-demo-src="img/icons/flags/england.svg" alt="" />
                <div class="meta">
                  <span>English [UK]</span>
                </div>
              </div>
            </div>
            <!--Card-->
            <div class="check-card">
              <input type="radio" name="language_selection" />
              <div class="check-card-inner">
                <img src="https://dummyimage.com/150x150" data-demo-src="img/icons/flags/france.svg" alt="" />
                <div class="meta">
                  <span>French [FR]</span>
                </div>
              </div>
            </div>
            <!--Card-->
            <div class="check-card">
              <input type="radio" name="language_selection" />
              <div class="check-card-inner">
                <img src="https://dummyimage.com/150x150" data-demo-src="img/icons/flags/canada.svg" alt="" />
                <div class="meta">
                  <span>French [CA]</span>
                </div>
              </div>
            </div>
            <!--Card-->
            <div class="check-card">
              <input type="radio" name="language_selection" />
              <div class="check-card-inner">
                <img src="https://dummyimage.com/150x150" data-demo-src="img/icons/flags/germany.svg" alt="" />
                <div class="meta">
                  <span>German</span>
                </div>
              </div>
            </div>
            <!--Card-->
            <div class="check-card">
              <input type="radio" name="language_selection" />
              <div class="check-card-inner">
                <img src="https://dummyimage.com/150x150" data-demo-src="img/icons/flags/spain.svg" alt="" />
                <div class="meta">
                  <span>Spanish</span>
                </div>
              </div>
            </div>
            <!--Card-->
            <div class="check-card">
              <input type="radio" name="language_selection" />
              <div class="check-card-inner">
                <img src="https://dummyimage.com/150x150" data-demo-src="img/icons/flags/portugal.svg" alt="" />
                <div class="meta">
                  <span>Portuguese</span>
                </div>
              </div>
            </div>
            <!--Card-->
            <div class="check-card">
              <input type="radio" name="language_selection" />
              <div class="check-card-inner">
                <img src="https://dummyimage.com/150x150" data-demo-src="img/icons/flags/brazil.svg" alt="" />
                <div class="meta">
                  <span>Portuguese [BR]</span>
                </div>
              </div>
            </div>
            <!--Card-->
            <div class="check-card">
              <input type="radio" name="language_selection" />
              <div class="check-card-inner">
                <img src="https://dummyimage.com/150x150" data-demo-src="img/icons/flags/china.svg" alt="" />
                <div class="meta">
                  <span>Chinese</span>
                </div>
              </div>
            </div>
            <!--Card-->
            <div class="check-card">
              <input type="radio" name="language_selection" />
              <div class="check-card-inner">
                <img src="https://dummyimage.com/150x150" data-demo-src="img/icons/flags/thailand.svg" alt="" />
                <div class="meta">
                  <span>Thai</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src=" https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="/assets/js/bootstrap.min.js"></script>
  <script src="/assets/js/jquery.mousewheel.min.js"></script>
  <script src="/croppic.min.js"></script>
  <script src="/assets/js/main.js"></script>
  <script>
    var croppicHeaderOptions = {
      //uploadUrl:'img_save_to_file.php',
      cropData: {
        "dummyData": 1,
        "dummyData2": "asdas"
      },
      cropUrl: 'img_crop_to_file.php',
      customUploadButtonId: 'cropContainerHeaderButton',
      modal: false,
      processInline: true,
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
    var croppic = new Croppic('croppic', croppicHeaderOptions);
    var croppicContainerPreloadOptions = {
      uploadUrl: 'img_save_to_file.php',
      cropUrl: 'img_crop_to_file.php',
      loadPicture: '/upload/pedidos/<?php echo (strftime("%Y/%m", strtotime(($data['fecha'])))); ?>/<?php echo ($data['fotoCod']) ?>.jpg',
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
  <script src="/js/bundle.js"></script>
</body>

</html>