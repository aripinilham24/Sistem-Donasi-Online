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
            <div class="container row justify-content-evenly">
                <?php foreach ($donasi as $data): ?>
                    <?php $width = round($data['persentase'] ?? 0)?>
                    
                    <div class="card shadow m-2" style="width: 30rem; height: 35rem;">
                        <img src="<?= base_url('assets/uploads/' . $data['gambar']) ?>"
                            class="card-img-top img-fluid mt-2 rounded object-fit-cover" style="height: 180px; width: 100%;"
                            alt="<?= $data['gambar'] ?>">
                        <div class="card-body overflow-auto">
                            <h5 class="card-title fw-bold"><?= $data['judul'] ?></h5>
                            <p class="card-text"><?= $data['deskripsi'] ?></p>
                        </div>
                        <div class="card-footer rounded mb-2 d-flex flex-column gap-3">
                            <div>
                            <div class="info-dana d-flex flex-column">
                                <span>Target: Rp. <?= number_format($data['target_donasi'], 0, ',', '.')?></span>
                                <span>Terkumpul: Rp.<?= number_format($data['terkumpul'], 0, ',', '.')?></span>
                            </div>
                            <div class="progress" role="progressbar" aria-label="Info example" aria-valuenow="<?= $data['persentase']?>"
                                aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar text-bg-info" style="width: <?= $width?>%"><?= $data['persentase']?>%</div>
                            </div>
                            </div>
                            <a href="<?= site_url('beranda/detail_kampanye/'.$data['id'])?>" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </main> 