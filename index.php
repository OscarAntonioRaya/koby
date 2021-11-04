<!DOCTYPE html>
<html lang="en">
  

<?php 
  require_once($_SERVER["DOCUMENT_ROOT"]."/modulos/head.php");
?>

  <body>
    <div id="pageloader" class="pageloader is-left-to-right"></div>
    <div id="infraloader" class="infraloader is-active"></div>

    <main>
    <!--Main Navbar-->

<?php 
  require_once($_SERVER["DOCUMENT_ROOT"]."/modulos/nav.php");
  require_once($_SERVER["DOCUMENT_ROOT"]."/modulos/hero.php");
?>




</main>
    <div
      class="progress-wrap"
      data-x-data="initBackToTop()"
      data-x-init="setup()"
      data-x-on:scroll.window="scroll()"
      data-x-bind:class="{
        'active-progress': scrolled,
        '': !scrolled,
        }"
      data-x-on:click="scrollTop()"
    >
      <svg
        class="progress-circle svg-content"
        width="100%"
        height="100%"
        viewBox="-1 -1 102 102"
      >
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
                  <img
                    src="https://dummyimage.com/150x150"
                    data-demo-src="img/icons/flags/united-states-of-america.svg"
                    alt=""
                  />
                  <div class="meta">
                    <span>English [US]</span>
                  </div>
                </div>
              </div>
              <!--Card-->
              <div class="check-card">
                <input type="radio" name="language_selection" />
                <div class="check-card-inner">
                  <img
                    src="https://dummyimage.com/150x150"
                    data-demo-src="img/icons/flags/england.svg"
                    alt=""
                  />
                  <div class="meta">
                    <span>English [UK]</span>
                  </div>
                </div>
              </div>
              <!--Card-->
              <div class="check-card">
                <input type="radio" name="language_selection" />
                <div class="check-card-inner">
                  <img
                    src="https://dummyimage.com/150x150"
                    data-demo-src="img/icons/flags/france.svg"
                    alt=""
                  />
                  <div class="meta">
                    <span>French [FR]</span>
                  </div>
                </div>
              </div>
              <!--Card-->
              <div class="check-card">
                <input type="radio" name="language_selection" />
                <div class="check-card-inner">
                  <img
                    src="https://dummyimage.com/150x150"
                    data-demo-src="img/icons/flags/canada.svg"
                    alt=""
                  />
                  <div class="meta">
                    <span>French [CA]</span>
                  </div>
                </div>
              </div>
              <!--Card-->
              <div class="check-card">
                <input type="radio" name="language_selection" />
                <div class="check-card-inner">
                  <img
                    src="https://dummyimage.com/150x150"
                    data-demo-src="img/icons/flags/germany.svg"
                    alt=""
                  />
                  <div class="meta">
                    <span>German</span>
                  </div>
                </div>
              </div>
              <!--Card-->
              <div class="check-card">
                <input type="radio" name="language_selection" />
                <div class="check-card-inner">
                  <img
                    src="https://dummyimage.com/150x150"
                    data-demo-src="img/icons/flags/spain.svg"
                    alt=""
                  />
                  <div class="meta">
                    <span>Spanish</span>
                  </div>
                </div>
              </div>
              <!--Card-->
              <div class="check-card">
                <input type="radio" name="language_selection" />
                <div class="check-card-inner">
                  <img
                    src="https://dummyimage.com/150x150"
                    data-demo-src="img/icons/flags/portugal.svg"
                    alt=""
                  />
                  <div class="meta">
                    <span>Portuguese</span>
                  </div>
                </div>
              </div>
              <!--Card-->
              <div class="check-card">
                <input type="radio" name="language_selection" />
                <div class="check-card-inner">
                  <img
                    src="https://dummyimage.com/150x150"
                    data-demo-src="img/icons/flags/brazil.svg"
                    alt=""
                  />
                  <div class="meta">
                    <span>Portuguese [BR]</span>
                  </div>
                </div>
              </div>
              <!--Card-->
              <div class="check-card">
                <input type="radio" name="language_selection" />
                <div class="check-card-inner">
                  <img
                    src="https://dummyimage.com/150x150"
                    data-demo-src="img/icons/flags/china.svg"
                    alt=""
                  />
                  <div class="meta">
                    <span>Chinese</span>
                  </div>
                </div>
              </div>
              <!--Card-->
              <div class="check-card">
                <input type="radio" name="language_selection" />
                <div class="check-card-inner">
                  <img
                    src="https://dummyimage.com/150x150"
                    data-demo-src="img/icons/flags/thailand.svg"
                    alt=""
                  />
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

    <script src="/js/bundle.js"></script>
    
  </body>

</html>
