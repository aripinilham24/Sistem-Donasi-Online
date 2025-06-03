<main class="p-5">
    <a href="<?= previous_url()?>" class="btn btn-secondary"><i class="bi bi-arrow-left-circle"></i> Kembali</a>
    <div class="container text-center">
        <img src="<?= base_url('assets/uploads/' . $data['detail_kampanye']['gambar']) ?>" alt="" class="rounded object-fit-cover"
            style="height: 20rem; width: 40rem;">
    </div>
    <div class="row justify-content-center gap-4">
        <div class="col-7">
            <h3><?= $data['detail_kampanye']['judul'] ?></h3>
            <div class="d-flex gap-5">
                <span>
                    <i class="bi bi-people-fill"></i>
                    <?= $data['total_donatur']?> Donatur</span>
                <span>
                    <i class="bi bi-calendar-heart"></i>
                    <?= waktu_sisa($data['detail_kampanye']['deadline'])?>
                </span>
            </div>
        </div>

        <div class="col-7">
            <h3>Deskripsi</h3>
            <p><?= $data['detail_kampanye']['deskripsi']?></p>
            <div>
                <a href="<?= site_url('transaksi/')?>" class="btn btn-primary">Donasi</a>
            </div>
        </div>

        <div class="col-7">
            <h3>Donatur (<?= $data['total_donatur']?>)</h3>
            <?php foreach($data['donatur_kampanye'] as $data): ?>
            <div class="row border-bottom border-info rounded p-1">
                <img src="<?= base_url('assets/uploads/users/'.$data['foto'])?>" alt="profile" class="col-2 rounded-circle">
                <div class="col-10">
                    <div class="d-flex gap-3">
                        <span class="fw-bold"><?= $data['nama_donatur']?></span>
                        <span><?= waktu_terlewat($data['dibuat_pada'])?></span>
                    </div>
                    <div>
                        <?= $data['pesan']?>
                    </div>
                    <div>
                        <span>Donasi: Rp <?=  number_format($data['nominal'], 0, ',', '.')?></span>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</main>