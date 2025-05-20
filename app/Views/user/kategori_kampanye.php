<div class="container">
    <?php if (empty($donasi)): ?>
        <div class="alert alert-warning">
            Tidak ada data donasi untuk saat ini.
        </div>
    <?php else: ?>
        <h3>Daftar Kampanye <?= $donasi[0]['kategori'] ?></h3>
        <div class="container row justify-content-evenly">
            <?php foreach ($donasi as $data): ?>
                <?php $width = round($data['persentase'] ?? 0) ?>

                <div class="card shadow m-2" style="width: 30rem; height: 35rem;">
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
                                <div class="progress-bar text-bg-info" style="width: <?= $width ?>%"><?= $data['persentase'] ?>%
                                </div>
                            </div>
                        </div>
                        <a href="<?= site_url('beranda/detail_kampanye/' . $data['id']) ?>" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    <?php endif; ?>

</div>