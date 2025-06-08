<main class="p-5">
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>
    <a href="<?= previous_url() ?>" class="btn btn-secondary"><i class="bi bi-arrow-left-circle"></i> Kembali</a>
    <div class="container text-center">
        <img src="<?= base_url('assets/uploads/' . $data['detail_kampanye']['gambar']) ?>" alt=""
            class="rounded object-fit-cover" style="height: 20rem; width: 40rem;">
    </div>
    <div class="row justify-content-center gap-4">
        <div class="col-7">
            <h3><?= $data['detail_kampanye']['judul'] ?></h3>
            <div class="d-flex gap-5">
                <span>
                    <i class="bi bi-people-fill"></i>
                    <?= $data['total_donatur'] ?> Donatur</span>
                <span>
                    <i class="bi bi-calendar-heart"></i>
                    <?= waktu_sisa($data['detail_kampanye']['deadline']) ?>
                </span>
            </div>
        </div>

        <div class="col-7">
            <h3>Deskripsi</h3>
            <p><?= $data['detail_kampanye']['deskripsi'] ?></p>
            <div>
                <a href="<?= site_url('transaksi/' . $data['id_kampanye']) ?>" class="btn btn-primary">Donasi</a>
                <!-- <a href="<?= site_url('donasi') ?>" class="btn btn-primary">Testing Midtrans</a> -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#donationModal">
                    Donasi Sekarang
                </button>

            </div>
        </div>

        <div class="col-7">
            <h3>Donatur (<?= $data['total_donatur'] ?>)</h3>
            <?php foreach ($data['donatur_kampanye'] as $donatur): ?>
                <div class="row border-bottom border-info rounded p-1">
                    <img src="<?= base_url('assets/uploads/users/' . $donatur['foto']) ?>" alt="profile"
                        class="profile-donatur col-2 rounded-circle object-fit-cover img-fluid">
                    <div class="col-10">
                        <div class="d-flex gap-3">
                            <span class="fw-bold"><?= $donatur['nama_donatur'] ?></span>
                            <span><?= waktu_terlewat($donatur['dibuat_pada']) ?></span>
                        </div>
                        <div>
                            <?= $donatur['pesan'] ?>
                        </div>
                        <div>
                            <span>Donasi: Rp <?= number_format($donatur['nominal'], 0, ',', '.') ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</main>

<!-- Modal donasi -->
<div class="modal fade" id="donationModal" tabindex="-1" aria-labelledby="donationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= site_url('donasi/' . $data['id_kampanye']) ?>" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="donationModalLabel">Form Donasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="donasi" class="form-label">Jumlah Donasi (Rp)</label>
                        <input type="number" class="form-control" name="donasi" id="donasi" min="1000" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Pesan</label>
                        <input type="text" class="form-control" name="pesan" id="pesan">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Kirim Donasi</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- midtrans pop up -->
<script src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="<?= getenv('MIDTRANS_CLIENT_KEY') ?>"></script>
<script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    <?php if (!empty($show_popup) && $show_popup): ?>
        window.onload = function () {
            window.snap.pay('<?= $snapToken ?>', {
                onSuccess: function (result) {
                    alert("Pembayaran berhasil!");
                    console.log(result);
                },
                onPending: function (result) {
                    alert("Menunggu pembayaran...");
                    console.log(result);
                },
                onError: function (result) {
                    alert("Pembayaran gagal!");
                    console.log(result);
                },
                onClose: function () {
                    alert('Kamu menutup popup sebelum menyelesaikan pembayaran.');
                }
            });
        };
    <?php endif; ?>
</script>