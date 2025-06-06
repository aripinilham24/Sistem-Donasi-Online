<div class="container">
    <h3>Donasi Rp10.000</h3>
    <button id="pay-button">Bayar</button>
    
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