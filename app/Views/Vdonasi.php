<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <a href="<?= base_url('tambahdata') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
      <i class="bi bi-clipboard2-pulse-fill"></i> Tambah Kampanye
    </a>
  </div>

  <!-- Content Row -->
  <div class="col">
    <div class="container-fluid">
      <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Daftar Kampanye</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover" id="dataTable" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Kategori</th>
                  <th>Deskripsi Singkat</th>
                  <th>Deskripsi</th>
                  <th>Target</th>
                  <th>Terkumpul</th>
                  <th>Tgl Buat</th>
                  <th>Batas Tgl</th>
                  <th>Gambar</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
                <?php foreach ($datadonasi as $data): ?>
                  <tr>
                    <td><?= esc($no++) ?></td>
                    <td><?= esc($data['judul']) ?></td>
                    <td><?= esc($data['kategori']) ?></td>
                    <td><?= esc($data['deskripsi_singkat']) ?></td>
                    <td><?= esc($data['deskripsi']) ?></td>
                    <td><?= number_format($data['target_donasi'], 0, ',', '.') ?></td>
                    <td><?= number_format($data['terkumpul'], 0, ',', '.') ?></td>

                    <td><?= esc($data['dibuat_pada']) ?></td>
                    <td><?= esc($data['deadline']) ?></td>
                    <td><img src="<?= base_url('assets/uploads/' . $data['gambar']) ?>" width="120" height="100"></td>
                    <td>
                      <a href="<?= base_url('edit_data/' . $data['id']) ?>" class="btn btn-warning btn-sm mb-2">Edit</a>
                      <a href="#" class="btn btn-danger btn-sm btn-hapus" data-bs-toggle="modal"
                        data-bs-target="#modalHapus" data-href="<?= site_url('hapus_data/' . $data['id']) ?>">Hapus</a>

                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Hapus (1x saja) -->
  <div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="modalHapusLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="modalHapusLabel">Konfirmasi Hapus</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Apakah Anda yakin ingin menghapus produk ini?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <a href="#" class="btn btn-danger" id="btn-confirm-hapus">Ya, Hapus</a>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<!-- DataTables CSS & JS + jQuery -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js" defer></script>

<!-- Bootstrap 5 JS (pastikan ini ada juga di project kamu) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>

<!-- Script Inisialisasi DataTables dan Modal -->
<script defer>
  document.addEventListener("DOMContentLoaded", function () {
    // Inisialisasi DataTable
    $('#dataTable').DataTable({
      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.13.4/i18n/Indonesian.json"
      }
    });

    // Modal konfirmasi hapus
    $('.btn-hapus').on('click', function () {
      var href = $(this).data('href');
      $('#btn-confirm-hapus').attr('href', href);
    });
  });
</script>
<?php if (session()->getFlashdata('success')): ?>
  <div class="alert alert-success">
    <?= session()->getFlashdata('success') ?>
  </div>
<?php endif; ?>