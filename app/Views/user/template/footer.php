<footer class="container-fluid bg-dark p-3">
        <div class="text-light text-center">
            Copyright &copy; HopeFund 2025
        </div>
    </footer>

    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Select "Logout" below if you are ready to end your current session.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="<?= site_url('auth/logout') ?>">Logout</a>
      </div>
    </div>
  </div>
</div>

<a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logoutModal">
  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
  Logout
</a>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/js/sb-admin-2.min.js')?>"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('assets/vendor/chart.js/Chart.min.js')?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/js/demo/chart-area-demo.js')?>"></script>
    <script src="<?= base_url('assets/js/demo/chart-pie-demo.js')?>"></script>
</body>

</html>