<div class="container profile">
    <button class="btn btn-secondary" onclick="history.back()"><i class="bi bi-arrow-left-circle"></i> Kembali</button>
    <h1 class="text-center m-3">Edit Profile</h1>
    <form method="post" action="<?= site_url('cuser/update_profile') ?>" enctype="multipart/form-data" class="row">
        <div class="col-4 text-center">
            <img class="border" src="<?= base_url('assets/uploads/users/' . $session['foto']) ?>" alt="profile pict"
                style="height: 20rem;">
            <input type="file" name="foto" class="form-control mt-2">
        </div>
        <div class="col-8 d-flex flex-column">
            <label for="username">Username</label>
            <input class="border border-0" type="text" name="username" id="username"
                value="<?= $session['username'] ?>">

            <label for="username">Email</label>
            <input class="border border-0" type="email" name="email" id="email" value="<?= $session['email'] ?>">

            <label for="password">Password</label>
            <input class="border border-0" type="password" name="password" id="password"
                value="<?= $session['password'] ?>">

            <button type="submit" class="btn btn-info w-auto align-self-start m-2">Submit</button>
        </div>
    </form>

</div>