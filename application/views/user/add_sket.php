<div class="container">
    <div class="row mt-3 mb-3">
        <div class="col-md-6">
            <a href="<?= base_url('user/dashboard') ?>" class="btn btn-primary btn-circle">
                <i class="fas fa-chevron-left"></i>
            </a>
        </div>
    </div>
    <div class="row mt-3 mb-3">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    Tambah Syarat
                </div>
                <div class="card-body">
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= validation_errors() ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif ?>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <small><label for="syarat_ske">Syarat Surat Keterangan</label></small>
                            <input type="text" class="form-control form-control-user" id="syarat_ske" name='syarat_ske' value="">
                            <small class="text-danger"><?= form_error('syarat_ske'); ?></small>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Simpan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>