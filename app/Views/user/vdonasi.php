<main class="container-sm">
    <form class="container-sm" method="post">

        <h3>Detail Donasi</h3>
        <label class="form-label" for="nominal">Nama</label>
        <input type="text" name="nama" id="nama" value="<?= $detail_donasi['nama'] ?>" class="form-control" readonly>
        <label class="form-label" for="email">Email</label>
        <input type="email" name="email" id="email" value="<?= $detail_donasi['email'] ?>" class="form-control"
            readonly>
        <label class="form-label" for="nominal">Nominal Donasi</label>
        <input type="number" name="nominal" id="nominal" value="<?= $detail_donasi['jumlah'] ?>" class="form-control"
            readonly>
        <label class="form-label" for="pesan">Pesan</label>
        <input type="text" name="pesan" id="pesan" value="<?= $detail_donasi['pesan'] ?>" class="form-control" readonly>

    </form>
    <button type="" class="btn btn-primary mt-3" id="pay-button">Donasikan</button>
</main>
<script src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="<?= getenv('MIDTRANS_CLIENT_KEY') ?>"></script>
<script type="text/javascript">
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
        window.snap.pay('<?= $snapToken ?>', {
            onSuccess: function (result) {
                alert("payment success!"); console.log(result);
            },
            onPending: function (result) {
                alert("wating your payment!"); console.log(result);
            },
            onError: function (result) {
                alert("payment failed!"); console.log(result);
            },
            onClose: function () {
                alert('you closed the popup without finishing the payment');
            }
        })
    });
</script>