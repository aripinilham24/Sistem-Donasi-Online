<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Form Edit User</h6>
    </div>
    <div class="card-body">
      <?php if(session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
          <ul>
            <?php foreach(session()->getFlashdata('errors') as $error): ?>
              <li><?= esc($error) ?></li>
            <?php endforeach ?>
          </ul>
        </div>
      <?php endif; ?>

      <form action="<?= base_url('update_user/' . $user['id']) ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <input type="hidden" name="_method" value="PUT">

        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama" value="<?= esc($user['nama']) ?>">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="<?= esc($user['email']) ?>">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password (kosongkan jika tidak diubah)</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3">
          <label for="role" class="form-label">Role</label>
          <select class="form-control" name="role" id="role">
            <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
            <option value="user" <?= $user['role'] == 'user' ? 'selected' : '' ?>>User</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="foto" class="form-label">Foto</label>
          <input type="file" class="form-control" id="foto" name="foto">
          <p class="mt-2">Foto saat ini: <br>
            <img src="<?= base_url('assets/uploads/users/' . $user['foto']) ?>" width="120">
          </p>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="<?= base_url('lihatuser') ?>" class="btn btn-secondary">Batal</a>
      </form>
    </div>
  </div>
</div>
