    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div>
            <br>
        </div>
        <!-- Page Heading -->

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary">Data Sarana Rumah Ibadah</h4>
            </div>
            <div class="card-body">
                <?= ($this->session->flashdata('flash')); ?>
                <ul class="nav nav-tabs">


                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('user/view_sape') ?>">Sarana Pendidikan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('user/view_sake') ?>">Sarana Kesehatan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= base_url('user/view_sri') ?>">Sarana Rumah Ibadah</a>
                    </li>
                </ul>
                <div>
                    <br>
                </div>
                <div class="col-md-6">
                    <br>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Sarana</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>

                        <?php
                        $no = 1;
                        foreach ($query as $u) {
                        ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $u['sarana_ri']; ?></td>
                                <td><?php echo $u['jumlah_ri']; ?></td>
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