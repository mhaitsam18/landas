<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Content Row -->
    <div class="row mt-3 mb-3">
        <div class="col-md-6">
            <a href="<?= base_url('user/index') ?>" class="btn btn-primary btn-circle">
                <i class="fas fa-chevron-left"></i>
            </a>
        </div>
    </div>
    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Details Penduduk</h6>

                </div>
                <!-- Card Body -->
                <div class="card">

                    <div class="card-body">
                        <h5 class="card-title"><strong><?= $penduduk['nama']; ?></strong></h5>
                        <small class="card-subtitle mb-2 text-muted">NIK</>
                        </small>
                        <p class="card-text"><?= $penduduk['nik']; ?></p>
                        <small class="card-subtitle mb-2 text-muted">Email</>
                        </small>
                        <p class="card-text"><?= $penduduk['email']; ?></p>
                        <small class="card-subtitle mb-2 text-muted">Alamat</>
                        </small>
                        <p class="card-text"><?= $penduduk['alamat']; ?></p>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">

                <!-- Card Body -->
                <div class="card-body">

                    <small class="card-subtitle mb-2 text-muted">Tempat Lahir</>
                    </small>
                    <p class="card-text"><?= $penduduk['tempatlahir']; ?></p>
                    <small class="card-subtitle mb-2 text-muted">Tanggal Lahir</>
                    </small>
                    <p class="card-text"><?= $penduduk['tanggallahir']; ?></p>
                    </small>
                    <small class="card-subtitle mb-2 text-muted">Agama</>
                    </small>
                    <p class="card-text"><?= $penduduk['agama']; ?></p>
                    </small>
                    <small class="card-subtitle mb-2 text-muted">Status</>
                    </small>
                    <p class="card-text"><?= $penduduk['status']; ?></p>
                    </small>

                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Scans</h6>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Scan KTP</th>
                                <th scope="col"></th>
                                <th scope="col">Scan KK</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td colspan="2"><img src="<?= base_url('assets/img/file/') . $penduduk['scanktp']; ?>" height="150"></td>

                                <td colspan="2"><img src="<?= base_url('assets/img/file/') . $penduduk['scankk']; ?>" height="150"></td>
                            </tr>




                        </tbody>
                    </table>



                </div>
            </div>


        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->