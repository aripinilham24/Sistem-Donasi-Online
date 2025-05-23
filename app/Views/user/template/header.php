<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-primary navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?= site_url('/') ?>">HopeFund</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarNavAltMarkup">
                    <div class="navbar-nav gap-4 ms-4">
                        <a class="nav-link rounded" href="<?= site_url('/') ?>">Beranda</a>
                        <a class="nav-link rounded" href="#">Donasi</a>
                        <a class="nav-link rounded" href="#">Galang Dana</a>
                        <a class="nav-link rounded" href="#">Tentang Kami</a>
                    </div>

                    <?php if (session()->get('logged_in') == true): ?>
                        <ul class="navbar-nav ml-auto">
                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span
                                        class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $session['username'] ?></span>
                                    <img class="img-profile rounded-circle" width="50rem"
                                        src="<?= base_url('assets/uploads/users/' . $session['foto']) ?>">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Settings
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Activity Log
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>
                        </ul>
                    <?php else: ?>
                        <div>
                            <a href="<?= site_url('cuser/setting') ?>">Setting profile</a>
                            <a href="<?= site_url('auth/login') ?>" class="btn btn-outline-light">Login</a>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </nav>
    </header>