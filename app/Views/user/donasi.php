<!-- <div class="container">
    <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
    <form class="d-flex flex-column gap-3" action="<?= site_url('transaksi/donasi/' . $id_kampanye) ?>" method="post">
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

</div> -->

<!-- midtrans -->
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="<?= $midtrans_client_key ?>"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
</head>

<body>

    <form class="container-sm" action="">
        <h3>Form Donasi</h3>
        <!-- <label class="form-label" for="nominal">Nominal Donasi</label>
        <input class="form-control" type="number" min="10000" name="nominal" id="nominal">
        <label class="form-label" for="pesan">Pesan</label>
        <input class="form-control" type="text" name="pesan" id="pesan"> -->
        <button class="btn btn-primary mt-3" id="pay-button">Donasikan</button>
    </form>

   <script type="text/javascript">
      // For example trigger on button clicked, or any time you need
      var payButton = document.getElementById('pay-button');
      payButton.addEventListener('click', function () {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay('TRANSACTION_TOKEN_HERE', {
          onSuccess: function(result){
            /* You may add your own implementation here */
            alert("payment success!"); console.log(result);
          },
          onPending: function(result){
            /* You may add your own implementation here */
            alert("wating your payment!"); console.log(result);
          },
          onError: function(result){
            /* You may add your own implementation here */
            alert("payment failed!"); console.log(result);
          },
          onClose: function(){
            /* You may add your own implementation here */
            alert('you closed the popup without finishing the payment');
          }
        })
      });
    </script>


</body>

</html>