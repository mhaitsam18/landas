    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Daftar Penduduk Musiman</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Accounts</h6>
            </div>
            <div class="card-body">
                <?= ($this->session->flashdata('flash')); ?>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= base_url('user/recmus') ?>">Data Penduduk Musiman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('user/recttp') ?>">Data Penduduk Tetap</a>
                    </li>
                </ul>
                <div>
                    <br>
                </div>
                <div class="col-md-6">
                    <a href="<?= base_url('user/recmus_p') ?>" class="btn btn-primary" target="_blank">
                        <i class="fa fa-print"> Cetak</i>
                    </a>
                </div>
                <div class="col-md-6">
                    <br>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <?php
                        $no = 1;
                        foreach ($query as $u) {
                        ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><img src="<?= base_url('assets/img/profile/') . $u['image']; ?>" height="50"></td>
                                <td><?php echo $u['nik']; ?></td>
                                <td><?php echo $u['nama']; ?></td>
                                <td><?php echo $u['email']; ?></td>
                                <td><?php echo $u['alamat']; ?></td>
                                <td><?php echo $u['status']; ?></td>
                            </tr>
                        <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>