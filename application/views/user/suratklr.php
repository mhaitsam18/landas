<!-- Custom styles for this page -->
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Surat Keluar</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Surat Keluar</h6>
        </div>
        <div class="card-body">
            <?= ($this->session->flashdata('flash')); ?>
            <div class="row mb-4">
                <div class="col-md-6">
                    <button type="button" class="btn btn-outline-primary"> <a href="<?= base_url('user/tambahsurat_keluar') ?>">Tambah Surat Keluar</a> </button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Tanggal</th>
                            <th>No Surat</th>
                            <th>Perihal</th>
                            <th>Pengirim</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <?php
                    $no = 1;
                    foreach ($surat_keluar as $su) {
                    ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><img src="<?= base_url('assets/img/file/') . $su['gambar']; ?>" height="50"></td>
                            <td><?php echo $su['tanggal']; ?></td>
                            <td><?php echo $su['no_surat']; ?></td>
                            <td><?php echo $su['perihal']; ?></td>
                            <td><?php echo $su['pengirim']; ?></td>
                            <td>
                                <a href="<?= base_url(); ?>user/hapussk/<?= $su['id']; ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Anda yakin ingin menghapus?');">
                                    <i class="fas fa-trash"></i>
                                </a> <br>
                                <a href="<?= base_url(); ?>user/editskeluar/<?= $su['id']; ?>" class="btn btn-danger btn-circle btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
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