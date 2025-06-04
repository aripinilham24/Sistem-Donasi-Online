<div class="container">
    <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
    <form class="d-flex flex-column gap-3" action="<?= site_url('transaksi/donasi/'.$id_kampanye)?>" method="post">
        <h3>Form Donasi</h3>
        <label for="nominal">Nominal Donasi</label>
        <input type="number" min="10000" name="nominal" id="nominal">
        <label for="pesan">Pesan</label>
        <input type="text" name="pesan" id="pesan">
        <button id="pay-button" class="btn btn-primary" type="submit">Kirim</button>
    </form>
    
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?= $midtrans_client_key?>"></script>

    <script>
        document.getElementById('pay-button').addEventListener('click', function () {
            fetch('<?= site_url("transaksi/snapToken") ?>')
                .then(res => res.json())
                .then(data => {
                    snap.pay(data.snapToken, {
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
                        }
                    });
                });
        });
    </script>

</div>