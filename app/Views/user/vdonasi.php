<a href="<?= site_url('donasi/bayar')?>" id="pay-button">Bayar Sekarang</a>
<?php
if($snapToken) {
  echo $snapToken;
}
?>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?= getenv('MIDTRANS_CLIENT_KEY') ?>"></script>
<script>
document.getElementById('pay-button').addEventListener('click', function () {
    snap.pay("<?= $snapToken ?>", {
        onSuccess: function(result){ console.log("Success:", result); },
        onPending: function(result){ console.log("Pending:", result); },
        onError: function(result){ console.log("Error:", result); }
    });
});
</script>
