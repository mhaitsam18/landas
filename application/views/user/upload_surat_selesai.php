<div class="container">

    <?= $this->session->flashdata('flash') ?>

    <div class="row mt-3 mb-3">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Informasi Jenis Surat
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-12">
                            Jenis Surat : <?php echo $permohonan['nama_surat']; ?>
                        </div>
                    </div>

                    <!-- <a href="" class="btn btn-primary btn-user btn-block">
                        Pilih
                    </a> -->

                </div>
            </div>
        </div>

        <?php if ($this->uri->segment('3')) : ?>
            <div class="col-lg-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        Informasi Permohonan
                    </div>
                    <div class="card-body">
                        <?php if (validation_errors()) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= validation_errors() ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif ?>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <input hidden type="text" class="form-control form-control-user" id="resi" name='resi' value="<?= $permohonan['resi'] ?>">
                            <div class="form-group">
                                <p>Nama : <?= $permohonan['nama'] ?></p>
                                <input hidden type="text" class="form-control form-control-user" id="nama" name='nama' placeholder="Full Name" value="<?= $permohonan['nama'] ?>">
                                <small class="text-danger"><?= form_error('nama'); ?></small>
                            </div>
                            <div class="form-group">
                                <p>NIK : <?= $permohonan['nik'] ?></p>
                                <input hidden type="text" class="form-control form-control-user" id="nik" name='nik' placeholder="Nomor Induk Kependudukan" value="<?= $permohonan['nik'] ?>">
                                <small class="text-danger"><?= form_error('nik'); ?></small>
                            </div>
                            <div class="form-group">
                                <p>Alamat : <?= $permohonan['alamat'] ?></p>
                                <input hidden type="textarea" class="form-control form-control-user" id="alamat" name='alamat' placeholder="Alamat" value="<?= $permohonan['alamat'] ?>">
                                <small class="text-danger"><?= form_error('alamat'); ?></small>
                            </div>
                            <div class="form-group">
                                <p>Nomor HP : <?= $permohonan['nohp'] ?></p>
                                <input hidden type="text" class="form-control form-control-user" id="nohp" name='nohp' placeholder="No HP" value="<?= $permohonan['nohp'] ?>">
                                <small class="text-danger"><?= form_error('nohp'); ?></small>
                            </div>
                            <div class="form-group">
                                <p>Email Pemohon : <?= $permohonan['email'] ?></p>
                                <input hidden type="email" class="form-control form-control-user" id="email" name='email' placeholder="Email" value="<?= $permohonan['email'] ?>">
                                <small class="text-danger"><?= form_error('email'); ?></small>
                            </div>
                            <div class="form-group">
                                <p>Tanggal Input : <?= $permohonan['tanggalinput'] ?></p>
                                <input hidden type="date" class="form-control form-control-user" id="tanggalinput" name='tanggalinput' placeholder="Tanggal Inputan" value="<?= $permohonan['tanggalinput'] ?>">
                                <small class="text-danger"><?= form_error('tanggalinput'); ?></small>
                            </div>

                            <div class="form-group">
                                <p>Status Kependudukan : <?= $permohonan['status_kependudukan'] ?></p>
                                <input hidden type="text" class="form-control form-control-user" id="status_kependudukan" name='status_kependudukan' placeholder="status_kependudukan" value="<?= $permohonan['status_kependudukan'] ?>">
                                <small class="text-danger"><?= form_error('status_kependudukan'); ?></small>
                            </div>
                            <div class="form-group">
                                <a href="" class="btn btn-info btn-sm">Tanda tangani surat</a>
                            </div>
                            <div class="input-file">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="file_surat_selesai">Upload Surat Selesai</label>
                                    <input type="file" class="form-control" id="file_surat_selesai" name="file_surat_selesai">
                                    <br><small class="text-danger"><?= form_error('file_surat_selesai'); ?></small>
                                </div>
                                <div class="alert alert-danger" role="alert">
                                    Pastikan file yang anda upload dalam format <b>.pdf</b>
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block" onclick="return confirm('Anda yakin ingin menerima dan mengupload surat selesainya?');">
                                Submit
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        <?php endif ?>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>