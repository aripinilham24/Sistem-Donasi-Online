<main class="container-sm">
    <form class="container-sm" action="<?= site_url('transaksi/donasi/' . $id_kampanye) ?>" method="post">
        <h3>Form Donasi</h3>
        <label class="form-label" for="nominal">Nominal Donasi</label>
        <input class="form-control" type="number" min="10000" name="nominal" id="nominal">
        <label class="form-label" for="pesan">Pesan</label>
        <input class="form-control" type="text" name="pesan" id="pesan">
        <button type="submit" class="btn btn-primary mt-3" id="pay">Submit</button>
    </form>
</main>

