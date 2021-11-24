<div class="main-navigation-light" data-x-data="initNavbarLight()" data-x-on:scroll.window="scroll()" data-x-on:mouseleave="megamenuOpened = false" data-x-bind:class="{
        'is-scrolled': scrolled,
        '': !scrolled,
        'is-solid': megamenuOpened,
        '': !megamenuOpened,
    }">
  <div class="main-navigation--menu">
    <div class="container">
      <div class="main-navigation--menu-inner">
        <div class="left">
          <a href="/" class="brand">
            <img style="width: 75px; height: auto;" class="light-logo" src="/logo.png" alt="" />
            <img style="width: 75px; height: auto;" class="dark-logo" src="/logo.png" alt="" />
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
                <img data-x-show="$store.app.isLoggedIn === false" class="is-rounded" src="https://dummyimage.com/150x150" data-demo-src="/img/photo/avatar/placeholder.png" alt="" />
                <img data-x-show="$store.app.isLoggedIn === true" class="is-rounded" src="https://dummyimage.com/150x150" data-demo-src="/img/photo/avatar/19.jpg" alt="" />
              </span>
            </button>
            <div data-x-show.transition="accountDropOpened" class="drop-menu">
              <div class="drop-menu-inner">
                <a href="login.html" data-x-show="$store.app.isLoggedIn === false" class="drop-menu-item is-heavy">Sign In</a>
                <a href="signup.html" data-x-show="$store.app.isLoggedIn === false" class="drop-menu-item">Register</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="megamenu" data-x-bind:class="{
      'is-active': megamenuOpened,
      '': !megamenuOpened,
    }">
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
                    Explore a wide variety of events and services provided by
                    members of our huge community.
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
                    Learn how you can start hosting events and offering services
                    on our platform.
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
                    Explore a wide variety of road and luxury trips hosted by
                    members of our community.
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
                    Not the adventurer type? Discover dozens of luxury trips in a
                    wide selection of locations.
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
    <!--Megamenu 2-->
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
                  <span class="fas fa-2x fa-suitcase-rolling"></span>
                </div>
                <div class="media-content">
                  <h3 class="text-rainbow">Planned Trips</h3>
                  <p>
                    Explore a wide variety of road and luxury trips hosted by
                    members of our community.
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
                    Not the adventurer type? Discover dozens of luxury trips in a
                    wide selection of locations.
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
  </div>
</div>