<nav class="navbar border-bottom navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/"><img src="/assets/logo.png" alt="Logo" height="24" class="d-inline-block align-text-top me-1"> Flashcardd</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/"><i class="bi bi-house-fill"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/?sets"><i class="bi bi-stack"></i> Sets</a>
                </li>
                 <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="bi bi-person-circle"></i> <?php echo $userapi->getUsername(); ?>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/?settings">Settings</a></li>
                                            <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="/?logout">Logout</a></li>
                    </ul>
                </li>               
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <li class="nav-item pt-1" >
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="darkModeSwitch" data-bs-toggle="tooltip" data-bs-placement="top">
                        <label for="darkModeSwitch">Dark Mode</label>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>