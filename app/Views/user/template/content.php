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

    <!-- kategori -->
    <div class="row mt-5 px-5">
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?= site_url('beranda/kategori/sosial') ?>">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Sosial</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_kampanye['sosial']?></div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-globe-americas" style="font-size: 2rem;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?= site_url('beranda/kategori/pendidikan') ?>">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Pendidikan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_kampanye['pendidikan']?></div>

                            </div>
                            <div class="col-auto">
                                <i class="bi bi-mortarboard" style="font-size: 2rem;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?= site_url('beranda/kategori/lingkungan') ?>">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Lingkungan
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_kampanye['lingkungan']?></div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-Tree" style="font-size: 2rem;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?= site_url('beranda/kategori/keagamaan') ?>">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Keagamaan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_kampanye['keagamaan']?></div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-bank" style="font-size: 2rem;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- daftar kampanye -->
    <div class="container-fluid mt-5 p-4">
        <h3 class="fw-bold text-center">Daftar Kampanye</h3>
        <div class="container d-flex flex-wrap justify-content-evenly">
            <?php foreach ($donasi as $data): ?>
                <?php $width = round($data['persentase'] ?? 0) ?>

                <div class="card shadow m-2 p-2" style="width: 30rem; height: 35rem;">
                    <img src="<?= base_url('assets/uploads/' . $data['gambar']) ?>"
                        class="card-img-top img-fluid mt-2 rounded object-fit-cover" style="height: 180px; width: 100%;"
                        alt="<?= $data['gambar'] ?>">
                    <div class="card-body overflow-auto">
                        <h5 class="card-title fw-bold"><?= $data['judul'] ?></h5>
                        <p class="card-text"><?= $data['deskripsi_singkat'] ?></p>
                    </div>
                    <div class="card-footer rounded mb-2 d-flex flex-column gap-3">
                        <div>
                            <div class="info-dana d-flex flex-column">
                                <span>Target: Rp. <?= number_format($data['target_donasi'], 0, ',', '.') ?></span>
                                <span>Terkumpul: Rp.<?= number_format($data['terkumpul'], 0, ',', '.') ?></span>
                            </div>
                            <div class="progress" role="progressbar" aria-label="Info example"
                                aria-valuenow="<?= $data['persentase'] ?>" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar text-bg-info" style="width: <?= $width ?>%">
                                    <?= $data['persentase'] ?>%
                                </div>
                            </div>
                        </div>
                        <a href="<?= site_url('beranda/detail_kampanye/' . $data['id']) ?>"
                            class="btn btn-primary">Detail</a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</main>