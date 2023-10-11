    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Monitoring</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Accounts</h6>
            </div>
            <div class="card-body">
                <?= ($this->session->flashdata('flash')); ?>
                <div class="row mb-4">
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Resi</th>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>Alamat</th>
                                <th>No HP</th>
                                <th>Email</th>
                                <th>Tanggal Input</th>
                                <th>Jenis Surat</th>
                                <th>Status</th>
                                <th>File</th>
                            </tr>
                        </thead>
                        <?php if ($user) : ?>


                            <?php $no = 1; ?>
                            <?php foreach ($hasil as $u) { ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $u['resi']; ?></td>
                                    <td><?php echo $u['nama']; ?></td>
                                    <td><?php echo $u['nik']; ?></td>
                                    <td><?php echo $u['alamat']; ?></td>
                                    <td><?php echo $u['nohp']; ?></td>
                                    <td><?php echo $u['email']; ?></td>
                                    <td><?php echo $u['tanggalinput']; ?></td>
                                    <td><?php echo $u['nama_surat']; ?></td>

                                    <td>

                                        <?php if ($u['status'] == "1") : ?>

                                            <span class="badge badge-info">Menunggu pengecekan <br> dari bagian umum</span>

                                        <?php elseif ($u['status'] == "2") : ?>
                                            <span class="badge badge-warning">Pengecekan Selesai, <br>Menunggu Penyetujuan Dari Lurah</span>

                                        <?php elseif ($u['status'] == "3") : ?>
                                            <?php if ($u['setuju'] == 1) { ?>
                                                <span class="badge badge-success">Proses Selesai, <br>Surat dapat di download</span>
                                            <?php } else { ?>
                                                <span class="badge badge-danger">Penandatanganan ditolak, <br>Silahkan lakukan permohonan ulang</span>
                                            <?php } ?>
                                        <?php elseif ($u['status'] == "4") : ?>
                                            <span class="badge badge-danger">Penandatanganan ditolak, <br>Silahkan lakukan permohonan ulang</span>
                                        <?php endif ?>
                                    </td>

                                    <td>

                                        <a href="<?= base_url('assets/file_upload_surat/' . $u['file_upload']) ?>" target="blank_" class="btn btn-primary mt-2">Download All File</a>

                                        <?php if ($u['status'] == 3) : ?>

                                            <a href="<?= base_url('assets/surat_selesai/' . $u['file_surat_selesai']) ?>" target="blank_" class="btn btn-primary btn-sm">
                                                Download Surat Selesai
                                            </a>

                                        <?php endif ?>

                                    </td>
                                </tr>
                            <?php } ?>
                        <?php endif ?>
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