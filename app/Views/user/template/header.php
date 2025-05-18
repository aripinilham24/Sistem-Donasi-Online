<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-primary navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?= site_url('/')?>">HopeFund</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarNavAltMarkup">
                    <div class="navbar-nav gap-4 ms-4">
                        <a class="nav-link rounded" href="<?= site_url('/')?>">Beranda</a>
                        <a class="nav-link rounded" href="#">Donasi</a>
                        <a class="nav-link rounded" href="#">Galang Dana</a>
                        <a class="nav-link rounded" href="#">Tentang Kami</a>
                    </div>
                    <div>
                        <a href="<?= site_url('auth/login') ?>" class="btn btn-outline-light">Login</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>