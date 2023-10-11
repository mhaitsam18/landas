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
                    Tambah Announcement
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
                            <small><label for="isidbi">Pengumuman</label></small>
                            <input type="text" class="form-control form-control-user" id="isidbi" name='isidbi' value="">
                            <small class="text-danger"><?= form_error('isidbi'); ?></small>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Simpan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>