<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <a href="<?= base_url('tambah_user') ?>" class="btn btn-primary btn-sm">
      <i class="fas fa-user-plus"></i> Tambah User
    </a>
  </div>

  <?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
  <?php endif; ?>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Daftar User</h6>
    </div>
    <div class="card-body">
      <table class="table table-bordered table-hover" id="dataTable">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Password</th>
            <th>Role</th>
            <th>Foto</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; foreach ($datauser as $user): ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= esc($user['nama']) ?></td>
            <td><?= esc($user['email']) ?></td>
            <td><?= esc($user['password']) ?></td>
            <td><?= esc($user['role']) ?></td>
            <td>
              <img src="<?= base_url('assets/uploads/users/' . $user['foto']) ?>" width="80">
            </td>
            <td>
              <a href="<?= base_url('edit_user/' . $user['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
              <a href="<?= base_url('hapus_user/' . $user['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus user ini?')">Hapus</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
