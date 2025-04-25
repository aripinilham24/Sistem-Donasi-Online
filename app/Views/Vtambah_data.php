<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Form Tambah Kampanye</h6>
    </div>
    <div class="card-body">

      <!-- Tampilkan Error Validasi -->
      <?php if(session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
          <ul>
          <?php foreach(session()->getFlashdata('errors') as $error): ?>
            <li><?= esc($error) ?></li>
          <?php endforeach ?>
          </ul>
        </div>
      <?php endif; ?>

      <form action="<?= base_url('simpan_data') ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        
        <div class="mb-3">
          <label for="judul" class="form-label">Judul Kampanye</label>
          <input type="text" class="form-control" id="judul" name="judul" value="<?= old('judul') ?>">
        </div>
        <div class="mb-3">
          <label for="deskripsi" class="form-label">Deskripsi</label>
          <textarea class="form-control" id="deskripsi" name="deskripsi"><?= old('deskripsi') ?></textarea>
        </div>
        <div class="mb-3">
          <label for="target_donasi" class="form-label">Target Donasi (Rp)</label>
          <input type="number" class="form-control" id="target_donasi" name="target_donasi" value="<?= old('target_donasi') ?>">
        </div>
        <div class="mb-3">
          <label for="deadline" class="form-label">Batas Tanggal Donasi</label>
          <input type="date" class="form-control" id="deadline" name="deadline" value="<?= old('deadline') ?>">
        </div>
        <div class="mb-3">
          <label for="gambar" class="form-label">Gambar Kampanye</label>
          <input type="file" class="form-control" id="gambar" name="gambar">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= base_url('lihatdonasi') ?>" class="btn btn-secondary">Batal</a>
      </form>
    </div>
  </div>
</div>
