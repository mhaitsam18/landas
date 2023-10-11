<div class="container">

    <div class="row mt-3 mb-3">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    Edit Akun
                </div>
                <div class="card-body">
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= validation_errors() ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif ?>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $penduduk['nama']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" class="form-control" id="nik" name="nik" value="<?= $penduduk['nik']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= $penduduk['email']; ?>">
                        </div>

                        <div class="form-group mb-3">
                            <label for="username">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $penduduk['alamat']; ?>">
                        </div>

                        <button type="submit" class="btn btn-primary float-end">Ubah Akun Penduduk</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>