<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Permohonan Surat</h1>

    </div>


    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl col-lg">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Surat Permohonan</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="card-body">
                        <?= ($this->session->flashdata('flash')); ?>
                        <div class="row mb-4">
                        </div>
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-bordered table-hover table-striped" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Resi</th>
                                        <th>Nama</th>
                                        <th>NIK</th>
                                        <th>Alamat</th>
                                        <th>No HP</th>
                                        <th>Tanggal Input</th>
                                        <th>Jenis Surat</th>
                                        <th>File</th>
                                        <th>Process</th>
                                        <th>Action</th>
                                        <th>Hasil</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $no = 1; ?>
                                    <?php foreach ($hasil as $u) { ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $u['resi']; ?></td>
                                            <td><?php echo $u['nama']; ?></td>
                                            <td><?php echo $u['nik']; ?></td>
                                            <td><?php echo $u['alamat']; ?></td>
                                            <td><?php echo $u['nohp']; ?></td>
                                            <td><?php echo $u['tanggalinput']; ?></td>
                                            <td><?php echo $u['nama_surat']; ?></td>

                                            <td>
                                                <a href="<?= base_url('assets/file_upload_surat/' . $u['file_upload']) ?>" target="blank_" class="btn btn-primary mt-2">Download All File</a>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('user/prosesu/' . $u['id']) ?>" class="btn btn-success mt-2">Buat Surat</a>
                                                <?php if ($u['status'] == 2) : ?>

                                                    <a href="<?= base_url('user/downloadsurat/' . $u['id']) ?>" target="_blank" class="btn btn-success mt-2">Download Surat</a>

                                                <?php endif ?>

                                            </td>
                                            <td>

                                                <?php if ($u['status'] == 1) { ?>

                                                    <form action="<?= base_url('user/proses_tolakBU/' . $u['id']) ?>" method="POST">
                                                        <button type="submit" class="btn btn-danger mt-2">Tolak</button>
                                                    </form>
                                                <?php } ?>

                                            </td>
                                            <td>
                                                <?php if ($u['status'] == 2) : ?>

                                                    <a href="<?= base_url('user/downloadsurat/' . $u['id']) ?>" target="_blank" class="btn btn-success mt-2">Download Surat</a>

                                                <?php endif ?>
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


    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->