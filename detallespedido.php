<?php
if (isset($_REQUEST)) {
  extract($_REQUEST);
  $ruta = $img;
}
?>
<!DOCTYPE html>
<html lang="en">
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Print Block - Detalles de Compra</title>

  <link rel="icon" type="image/png" href="img/favicon.png" />
  <link rel="preconnect" href="https://fonts.gstatic.com/" />
  <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,300;0,400;0,500;0,600;1,300&amp;family=Montserrat:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet" />
  <link href="../api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/app.css" />
  <link rel="stylesheet" type="text/css" href="css/main.css" />
</head>

<body>
  <div id="pageloader" class="pageloader is-left-to-right"></div>
  <div id="infraloader" class="infraloader is-active"></div>

  <main>
    <!--Main Navbar-->
    <div class="main-navigation-light is-default" data-x-data="initNavbarLight()" data-x-on:scroll.window="scroll()" data-x-on:mouseleave="megamenuOpened = false" data-x-bind:class="{
        'is-scrolled': scrolled,
        '': !scrolled,
        'is-solid': megamenuOpened,
        '': !megamenuOpened,}">
      <div class="main-navigation--menu">
        <div class="container">
          <div class="main-navigation--menu-inner">
            <div class="left">
              <a href="/" class="brand">
                <img class="light-logo" src="/logo.png" alt="" />
                <img class="dark-logo" src="/logo.png" alt="" />
              </a>
            </div>

            <div class="center">
              <div class="navigation-link has-caret" data-x-on:mouseover="megamenuOpened = true, openedMegamenu = 'megamenu-1'">
                <a class="is-flex is-align-items-center">
                  <span>Events</span>
                  <i data-feather="chevron-down"></i>
                </a>
              </div>
              <div class="navigation-link has-caret" data-x-on:mouseover="megamenuOpened = true, openedMegamenu = 'megamenu-2'">
                <a class="is-flex is-align-items-center">
                  <span>Trips</span>
                  <i data-feather="chevron-down"></i>
                </a>
              </div>
              <div class="navigation-link has-caret" data-x-on:mouseover="megamenuOpened = true, openedMegamenu = 'megamenu-3'">
                <a class="is-flex is-align-items-center">
                  <span>Flats</span>
                  <i data-feather="chevron-down"></i>
                </a>
              </div>
            </div>

            <div class="right">
              <div class="account-drop">
                <button data-x-on:click="openDrop('account-drop')" data-x-on:click.away="closeDrop('account-drop')">
                  <span class="image is-32x32">
                    <img data-x-show="$store.app.isLoggedIn === false" class="is-rounded" src="https://dummyimage.com/150x150" data-demo-src="img/photo/avatar/placeholder.png" alt="" />
                    <img data-x-show="$store.app.isLoggedIn === true" class="is-rounded" src="https://dummyimage.com/150x150" data-demo-src="img/photo/avatar/19.jpg" alt="" />
                  </span>
                </button>
                <div data-x-show.transition="accountDropOpened" class="drop-menu">
                  <div class="drop-menu-inner">
                    <a href="login.html" data-x-show="$store.app.isLoggedIn === false" class="drop-menu-item is-heavy">Sign In</a>
                    <a href="signup.html" data-x-show="$store.app.isLoggedIn === false" class="drop-menu-item">Register</a>
                    <a href="account-main.html" data-x-show="$store.app.isLoggedIn === true" class="drop-menu-item">Account</a>
                    <a href="account-main.html" data-x-show="$store.app.isLoggedIn === true" class="drop-menu-item">Settings</a>
                    <a href="account-schedule.html" data-x-show="$store.app.isLoggedIn === true" class="drop-menu-item">Schedule</a>
                    <hr />
                    <!-- <a href="host.html" class="drop-menu-item">Host Event</a>
                      <a href="events.html" class="drop-menu-item">Explore Events</a>
                      <a href="how.html" class="drop-menu-item">Help</a> -->
                    <a data-x-show="$store.app.isLoggedIn === true" class="drop-menu-item" data-x-on:click="logout()">Logout</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="megamenu" data-x-bind:class="{
      'is-active': megamenuOpened,
      '': !megamenuOpened,}">
        <!--Megamenu 1-->
        <div data-x-show="openedMegamenu === 'megamenu-1'" class="megamenu-inner">
          <button class="close-button" data-x-on:click="megamenuOpened = !megamenuOpened">
            <i data-feather="arrow-left"></i>
          </button>
          <div class="container">
            <div class="columns">
              <div class="column is-4">
                <div class="megamenu-block">
                  <div class="media">
                    <div class="media-left text-primary">
                      <span class="fas fa-2x fa-cocktail"></span>
                    </div>
                    <div class="media-content">
                      <h3 class="text-rainbow">Social Events</h3>
                      <p>
                        Explore a wide variety of events and services provided
                        by members of our huge community.
                      </p>
                      <a href="events.html" class="arrow-link">
                        <span>Explore scheduled events</span>
                        <i data-feather="arrow-right"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="column is-4">
                <div class="megamenu-block has-margin">
                  <h4 class="text-rainbow">Trending now</h4>
                  <ul>
                    <li>
                      <a href="events.html" class="arrow-link">
                        <span>Reading groups</span>
                        <i data-feather="arrow-right"></i>
                      </a>
                    </li>
                    <li>
                      <a href="events.html" class="arrow-link">
                        <span>Shopping meetups</span>
                        <i data-feather="arrow-right"></i>
                      </a>
                    </li>
                    <li>
                      <a href="events.html" class="arrow-link">
                        <span>Gaming parties</span>
                        <i data-feather="arrow-right"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="column is-4">
                <div class="megamenu-block is-left-bordered">
                  <div class="media">
                    <div class="media-content">
                      <h3 class="text-rainbow">Schedule an event</h3>
                      <p>
                        Learn how you can start hosting events and offering
                        services on our platform.
                      </p>
                      <a href="host.html" class="arrow-link">
                        <span>Become a Host</span>
                        <i data-feather="arrow-right"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!--Megamenu 2-->
        <div data-x-show="openedMegamenu === 'megamenu-2'" class="megamenu-inner">
          <button class="close-button" data-x-on:click="megamenuOpened = !megamenuOpened">
            <i data-feather="arrow-left"></i>
          </button>
          <div class="container">
            <div class="columns">
              <div class="column is-4">
                <div class="megamenu-block">
                  <div class="media">
                    <div class="media-left text-primary">
                      <span class="fas fa-2x fa-suitcase-rolling"></span>
                    </div>
                    <div class="media-content">
                      <h3 class="text-rainbow">Planned Trips</h3>
                      <p>
                        Explore a wide variety of road and luxury trips hosted
                        by members of our community.
                      </p>
                      <a href="trips.html" class="arrow-link">
                        <span>Explore scheduled trips</span>
                        <i data-feather="arrow-right"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="column is-4">
                <div class="megamenu-block has-margin">
                  <h4 class="text-rainbow">Categories</h4>
                  <div class="tags">
                    <a href="home-2.html" class="tag is-rounded">Trekking</a>
                    <a href="home-2.html" class="tag is-rounded">Adventure</a>
                    <a href="home-2.html" class="tag is-rounded">Discovery</a>
                    <a href="home-2.html" class="tag is-rounded">Climbing</a>
                    <a href="home-2.html" class="tag is-rounded">Bicycle</a>
                    <a href="home-2.html" class="tag is-rounded">Scuba diving</a>
                    <a href="home-2.html" class="tag is-rounded">Safari</a>
                    <a href="home-2.html" class="tag is-rounded">Rafting</a>
                    <a href="home-2.html" class="tag is-rounded">Survival</a>
                    <a href="home-2.html" class="tag is-rounded">Speleology</a>
                    <a href="home-2.html" class="tag is-rounded">Hunting</a>
                  </div>
                </div>
              </div>
              <div class="column is-4">
                <div class="megamenu-block is-left-bordered">
                  <div class="media">
                    <div class="media-content">
                      <h3 class="text-rainbow">Try our luxury trips</h3>
                      <p>
                        Not the adventurer type? Discover dozens of luxury
                        trips in a wide selection of locations.
                      </p>
                      <a href="trips.html" class="arrow-link">
                        <span>Explore luxury trips</span>
                        <i data-feather="arrow-right"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!--Megamenu 3-->
        <div data-x-show="openedMegamenu === 'megamenu-3'" class="megamenu-inner">
          <button class="close-button" data-x-on:click="megamenuOpened = !megamenuOpened">
            <i data-feather="arrow-left"></i>
          </button>
          <div class="container">
            <div class="columns">
              <div class="column is-4">
                <div class="megamenu-block">
                  <div class="media">
                    <div class="media-left text-primary">
                      <span class="fas fa-2x fa-igloo"></span>
                    </div>
                    <div class="media-content">
                      <h3 class="text-rainbow">Flats & Homes</h3>
                      <p>
                        Explore a wide variety of events and services provided
                        by members of our huge community.
                      </p>
                      <a href="flats.html" class="arrow-link">
                        <span>Find a flat nearby</span>
                        <i data-feather="arrow-right"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="column is-4">
                <div class="megamenu-block has-margin">
                  <h4 class="text-rainbow">Recently Added</h4>
                  <div class="block-list">
                    <div class="block-list-item">
                      <img class="is-rounded-md" src="https://dummyimage.com/150x150" data-demo-src="img/photo/content/thumbs/square/9.jpg" alt="" />
                    </div>
                    <div class="block-list-item">
                      <img class="is-rounded-md" src="https://dummyimage.com/150x150" data-demo-src="img/photo/content/thumbs/square/10.jpg" alt="" />
                    </div>
                    <div class="block-list-item">
                      <img class="is-rounded-md" src="https://dummyimage.com/150x150" data-demo-src="img/photo/content/thumbs/square/11.jpg" alt="" />
                    </div>
                    <div class="block-list-item">
                      <img class="is-rounded-md" src="https://dummyimage.com/150x150" data-demo-src="img/photo/content/thumbs/square/12.jpg" alt="" />
                    </div>
                    <div class="block-list-item">
                      <img class="is-rounded-md" src="https://dummyimage.com/150x150" data-demo-src="img/photo/content/thumbs/square/13.jpg" alt="" />
                    </div>
                    <div class="block-list-item">
                      <img class="is-rounded-md" src="https://dummyimage.com/150x150" data-demo-src="img/photo/content/thumbs/square/14.jpg" alt="" />
                    </div>
                  </div>
                  <a href="#" class="arrow-link mt-4">
                    <span>View all</span>
                    <i data-feather="arrow-right"></i>
                  </a>
                </div>
              </div>
              <div class="column is-4">
                <div class="megamenu-block is-left-bordered">
                  <div class="media">
                    <div class="media-content">
                      <h3 class="text-rainbow">Submit your flat</h3>
                      <p>
                        Looking to generate revenue with your unused flat?
                        Learn more about our terms.
                      </p>
                      <a href="#" class="arrow-link">
                        <span>Learn more</span>
                        <i data-feather="arrow-right"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="section app-section">
      <div class="container">
        <nav class="breadcrumb account-breadcrumb" aria-label="breadcrumbs">
          <ul>
            <li><a href="account-main.html">Crear</a></li>
            <li class="is-active">
              <a href="account-personal.html" aria-current="page">Detalles de Compra</a>
            </li>
          </ul>
        </nav>

        <div class="account-header">
          <div class="header-meta">
            <h2 class="title is-3 is-bold">Detalles de Compra</h2>
          </div>
        </div>

        <div class="account-layout py-6">
          <div class="columns b-flex-tablet-p">
            <div class="column is-7">
              <form action="#">
                <div class="mb-4">
                  <h2 class="title is-5 is-bold">General</h2>
                  <h4 class="subtitle is-6">
                    Su información general
                  </h4>
                </div>

                <!--Setting block-->
                <article class="media">
                  <div class="media-content">
                    <span class="is-block">Nombre</span>
                    <input name="nombre" type="text" class="input" placeholder="Ingrese su nombre" />
                  </div>
                </article>
                <!--Setting block
                  <article class="media" style="display: none !important;">
                    <div class="media-content">
                      <span class="is-block">Género</span>
                      <input name="genero" type="text" class="input" placeholder="Ingrese su género" />
                    </div>
                  </article>
                  -->
                <!--Setting block-->
                <article class="media">
                  <div class="media-content">
                    <span class="is-block">Correo Electrónico</span>
                    <input name="email" type="email" class="input" placeholder="Ingrese su correo electrónico" />
                  </div>
                </article>
                <!--Setting block-->
                <article class="media">
                  <div class="media-content">
                    <span class="is-block">Fecha de nacimiento</span>
                    <input name="fecha" type="date" class="input" />
                  </div>
                </article>

                <div>
                  <div class="mt-6 mb-4">
                    <h2 class="title is-5 is-bold">Información de Envío</h2>
                    <h4 class="subtitle is-6">
                      Detalles para hacerle llegar su nuevo producto
                    </h4>
                  </div>

                  <!--Setting block-->
                  <article class="media">
                    <div class="media-content">
                      <span class="is-block">Télefono de contacto</span>
                      <input name="tel" type="tel" class="input" placeholder="Ingrese su télefono de contacto más usado" />
                    </div>
                  </article>
                  <!--Setting block-->
                  <article class="media">
                    <div class="media-content">
                      <span class="is-block">Dirección de envío</span>
                      <input name="direccion1" type="text" class="input" placeholder="Ingrese su Calle, Colonia, Ciudad y Estado" />
                    </div>
                  </article>
                  <!--Setting block-->
                  <article class="media">
                    <div class="media-content">
                      <span class="is-block">Código Postal</span>
                      <input name="codigo" type="number" class="input" placeholder="Ingrese su código postal" />
                    </div>
                  </article>
                  <!--Setting block-->
                  <article class="media">
                    <div class="media-content">
                      <span class="is-block">Referencias</span>
                      <input name="referencias" type="text" class="input" placeholder="Indicaciones adicionales para su envío" />
                    </div>
                  </article>
                </div>
                <br> <br>
                <button class="button is-primary" type="submit" id="submit" name="submit">Continuar</button>
              </form>
            </div>
            <div class="column is-4 is-offset-1">
              <!--Categories-->
              <div class="account-categories">
                <!--Category-->
                <a href="/ajustarimagen.php" class="card mb-5">
                  <div class="card-content">
                    <h3 class="title is-6 has-space">
                      <span class="icon-text">
                        <span>Volver a recortar</span>
                        <span class="icon">
                          <i data-feather="chevron-right"></i>
                        </span>
                      </span>
                    </h3>
                    <img src="<?php echo $ruta; ?>" alt="recorte" class="img-fluid" style="border: 1px solid lightgray; border-radius: 15px;">
                    <p class="stressed-1 is-md">
                      Imagen solo de referencia, resultado actual con precisión será enviado.
                    </p>
                  </div>
                </a>
                <!--Category-->
                <a href="account-personal.html" class="card">
                  <div class="card-content">
                    <div class="svg-icon">
                      <img class="mb-2" src="img/icons/custom/credit-card.svg" alt="" />
                    </div>
                    <h3 class="title is-6 has-space">
                      <span class="icon-text">
                        <span>FAQ</span>
                        <span class="icon">
                          <i data-feather="chevron-right"></i>
                        </span>
                      </span>
                    </h3>
                    <p class="stressed-1 is-md">
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad nemo tempora sit perspiciatis! Id accusamus autem, maxime, deserunt amet earum expedita repudiandae sit ipsam nobis aperiam culpa consequatur velit. A?
                    </p>
                  </div>
                </a>
              </div>
            </div>
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
  <script src="../api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js"></script>
  <script src="js/bundle.js"></script>
</body>

<!-- Mirrored from listkit.cssninja.io/account-personal.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Oct 2021 21:11:56 GMT -->

</html>