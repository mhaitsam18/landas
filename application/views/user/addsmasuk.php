<div class="container">
    <div class="row mt-3 mb-3">
        <div class="col-md-6">
            <a href="<?= base_url('user/surat_masuk') ?>" class="btn btn-primary btn-circle">
                <i class="fas fa-chevron-left"></i>
            </a>
        </div>
    </div>
    <div class="row mt-3 mb-3">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    Tambah Surat
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
                            <small><label for="tanggal">Tanggal</label></small>
                            <input type="date" class="form-control form-control-user" id="tanggal" name='tanggal' value="<?= set_value('tanggal'); ?>">
                            <small class="text-danger"><?= form_error('tanggal'); ?></small>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="no_surat" name='no_surat' placeholder="No Surat" value="<?= set_value('no_surat'); ?>">
                            <small class="text-danger"><?= form_error('no_surat'); ?></small>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="perihal" name='perihal' placeholder="Perihal" value="<?= set_value('perihal'); ?>">
                            <small class="text-danger"><?= form_error('perihal'); ?></small>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="pengirim" name='pengirim' placeholder="Pengirim" value="<?= set_value('pengirim'); ?>">
                            <small class="text-danger"><?= form_error('pengirim'); ?></small>
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="scankk">Lampiran (Gambar Surat)</label>
                            <input type="file" class="form-control" id="gambar" name="gambar" value="<?= set_value('gambar'); ?>">
                            <br><small class="text-danger"><?= form_error('gambar'); ?></small>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Simpan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>