<main class="p-5">
    <div class="container text-center">
        <img src="<?= base_url('assets/uploads/' . $data['gambar']) ?>" alt="" class="rounded object-fit-cover"
            style="height: 20rem; width: 40rem;">
    </div>
    <div class="row justify-content-center gap-4">
        <div class="col-7">
            <h3><?= $data['judul'] ?></h3>
            <div>
                <span>
                    <i class="bi bi-people-fill"></i>
                    20 Donatur</span>
                <span>
                    <i class="bi bi-calendar-heart"></i>
                    30 Hari lagi</span>
            </div>
        </div>

        <div class="col-7">
            <h3>Deskripsi</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro sit repellat, cupiditate minus, incidunt
                eius maiores amet quo cumque totam quibusdam aliquam magni optio quisquam ut quos commodi mollitia
                ipsum.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem distinctio, nemo aliquid deserunt sint
                illo quis eligendi odio voluptatum quos perferendis doloremque labore nesciunt, enim ab nostrum ipsa
                reiciendis nulla!
            </p>
        </div>

        <div class="col-7">
            <h3>Donatur (10)</h3>
            <div class="row border border-info rounded">
                <img src="" alt="profile" class="col-1">
                <div class="col-11">
                    <div>
                        <span>Anonymous</span>
                        <span>1 jam yang lalu</span>
                    </div>
                    <div>
                        <span>Donasi Rp 10.000</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>