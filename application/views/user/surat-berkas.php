    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Berkas Lengkap</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Accounts</h6>
            </div>
            <div class="card-body">
                <?= ($this->session->flashdata('flash')); ?>
                <ul>
                    <?php foreach ($data_berkas as $berkas) : ?>
                        <li><?= $berkas->nama_file ?> - <a href="<?= base_url('assets/file_upload_surat/' . $berkas->file) ?>" class="btn btn-link" target="_blank">Download File</a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

    </div> <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>