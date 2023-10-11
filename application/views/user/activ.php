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
                                        <a href="<?= base_url(); ?>user/detail/<?= $pdk['id']; ?>" class="btn btn-primary btn-sm">
                                            Lihat Detail
                                        </a>
                                        <a href="<?= base_url(); ?>user/setujuact/<?= $pdk['id']; ?>" class="btn btn-warning btn-sm">
                                            Validasi
                                        </a>
                                        <a href="<?= base_url(); ?>user/tolakact/<?= $pdk['id']; ?>" class="btn btn-danger btn-sm">
                                            Tolak
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