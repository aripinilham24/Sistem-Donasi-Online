<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HopeFund | Beranda</title>
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- bootstrap cdn end -->

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-primary navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">HopeFund</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarNavAltMarkup">
                    <div class="navbar-nav gap-4 ms-4">
                        <a class="nav-link rounded" href="#">Beranda</a>
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

    <!-- content -->
    <main class="container-fluid">
        <!-- carousel -->
        <div class="container">
            <div id="carouselExampleInterval" class="carousel slide mt-5" data-bs-ride="carousel">
                <div class="carousel-inner rounded shadow">
                    <div class="carousel-item active" data-bs-interval="10000">
                        <img width="1280" height="400"
                            src="https://810bf2a659dbe63f18a7-974cbc13ede5a0c8fe2137f6c1d2be33.ssl.cf6.rackcdn.com/file/2024-11-20/SKiouFlUiXNI.webp"
                            class="d-block rounded object-fit-cover w-100" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img width="1280" height="400"
                            src="https://810bf2a659dbe63f18a7-974cbc13ede5a0c8fe2137f6c1d2be33.ssl.cf6.rackcdn.com/file/2024-11-18/BdqBU63OQQpW.webp"
                            class="d-block rounded object-fit-cover w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!-- carousel end -->

        <div class="container shadow rounded mt-5">
            <ul class="navbar-nav d-flex flex-row justify-content-between gap-5">
                <li class="nav-item">
                    <a class="nav-link fs-3" href="#"><i class="bi bi-heart-pulse-fill"></i> Donasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-3" href="#"><i class="bi bi-heart-pulse-fill"></i> Donasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-3" href="#"><i class="bi bi-heart-pulse-fill"></i> Donasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-3" href="#"><i class="bi bi-heart-pulse-fill"></i> Donasi</a>
                </li>
            </ul>
        </div>

        <!-- daftar kampanye -->
        <div class="container mt-5 shadow p-4">
            <h3 class="">Daftar Kampanye</h3>
            <div class="container row gap-4">
                <?php foreach ($donasi['donasi'] as $data): ?>
                    <div class="card shadow" style="width: 18rem; height: 25rem;">
                        <img src="<?= base_url('assets/uploads/' . $data['gambar']) ?>"
                            class="card-img-top img-fluid mt-2 rounded object-fit-cover" style="height: 180px; width: 100%;"
                            alt="<?= $data['gambar'] ?>">
                        <div class="card-body overflow-auto">
                            <h5 class="card-title fw-bold"><?= $data['judul'] ?></h5>
                            <p class="card-text"><?= $data['deskripsi'] ?></p>
                        </div>
                        <div class="card-footer rounded mb-2">
                            <span>Dana terkumpul</span>
                            <div class="progress" role="progressbar" aria-label="Info example" aria-valuenow="<?= $donasi['persentase']?>"
                                aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar text-bg-info" style="width: <?= $donasi['width']?>%"><?= $donasi['persentase']?>%</div>
                            </div>

                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </main>
</body>

</html>