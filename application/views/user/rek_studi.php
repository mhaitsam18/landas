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
                <h4 class="m-0 font-weight-bold text-primary">Rekap Penduduk berdasarkan Pendidikan</h4>
            </div>
            <div class="card-body">
                <?= ($this->session->flashdata('flash')); ?>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('user/view_rekapjk') ?>">Jenis Kelamin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= base_url('user/view_rekSt') ?>">Pendidikan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('user/view_rekAgm') ?>">Agama</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('user/view_rekPkj') ?>">Pekerjaan</a>
                    </li>
                </ul>
                <div>
                    <br>
                </div>
                <div>
                    <br>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Jumlah</th>
                                <th>%</th>
                            </tr>
                        </thead>

                        <?php
                        $no = 1;
                        foreach ($query as $u) {
                        ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $u['kelompok_s']; ?></td>
                                <td><?php echo $u['jumlah_s']; ?></td>
                                <td><?php echo $u['persentase_s']; ?></td>
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