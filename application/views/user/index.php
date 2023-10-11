<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Akun Penduduk</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Akun Penduduk</h6>
        </div>
        <div class="card-body">
            <?= ($this->session->flashdata('flash')); ?>
            <div class="row mb-4">
                <div class="col-md-6">
                    <a href="<?= base_url('auth/tambah') ?>" class="btn btn-outline-primary">Tambah Akun</a>

                </div>
            </div>
            <div class=" row mt-3 mb-3">
                <div class="col-lg">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($penduduk as $pdk) {
                            ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $pdk['nama']; ?></td>
                                    <td>
                                        <a href="<?= base_url(); ?>user/detail/<?= $pdk['id']; ?>" class="btn btn-primary btn-circle btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="<?= base_url(); ?>auth/edit/<?= $pdk['id']; ?>" class="btn btn-warning btn-circle btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="<?= base_url(); ?>auth/hapus/<?= $pdk['id']; ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Anda yakin ingin menghapus?');">
                                            <i class="fas fa-trash"></i>
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

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->