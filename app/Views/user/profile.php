<div class="container profile">
    <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>
    <a href="<?= previous_url()?>" class="btn btn-secondary"><i class="bi bi-arrow-left-circle"></i> Kembali</a>
    <h1 class="text-center m-3">Profile</h1>
    <form class="row">
        <div class="col-4 text-center">
            <img class="border" src="<?= base_url('assets/uploads/users/'.$session['foto']) ?>" alt="profile pict"
                style="height: 20rem;">
        </div>
        <div class="col-8 d-flex flex-column">
            <label for="username">Username</label>
            <input class="border border-0" type="text" name="username" id="username" value="<?= $session['username'] ?>"
                readonly>
                
            <label for="username">Email</label>
            <input class="border border-0" type="email" name="email" id="email" value="<?= $session['email'] ?>"
                readonly>
            
            <label for="password">Password</label>
            <input class="border border-0" type="password" name="password" id="password"
                value="<?= $session['password'] ?>" readonly>
            <a href="<?= site_url('cuser/edit_profile') ?>" class="btn btn-info w-auto align-self-start m-2">
                <i class="bi bi-pencil-square"></i>
                Edit
            </a>
        </div>
    </form>
</div>