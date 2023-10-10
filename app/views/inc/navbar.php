
  <nav class="navbar navbar-dark bg-dark" aria-label="Dark offcanvas navbar">
    <div class="container-fluid">
     <a class="navbar-brand" href="<?= URLROOT ?>"><?= SITENAME ?></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarDark" aria-controls="offcanvasNavbarDark" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasNavbarDark" aria-labelledby="offcanvasNavbarDarkLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarDarkLabel">Offcanvas</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?= URLROOT ?>">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= URLROOT ."/pages/about" ?>">ABOUT</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Login
              </a>
              <ul class="dropdown-menu">
               <?php if(isset($_SESSION['user_id'])) : ?>
                <li><a class="dropdown-item" href="<?= URLROOT ."/users/logout/" ?>">Logout</a></li>
              <?php else: ?>  
              <li><a class="dropdown-item" href="<?= URLROOT ."/users/register/" ?>">Register</a></li>
              <li><a class="dropdown-item" href="<?= URLROOT ."/users/login/" ?>">Login</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
            <?php endif; ?>
          </ul>

        </div>
      </div>
    </div>
  </nav>