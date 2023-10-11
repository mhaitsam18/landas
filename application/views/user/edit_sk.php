<div class="container">
    <div class="row mt-3 mb-3">
        <div class="col-md-6">
            <a href="<?= base_url('user/surat_keluar') ?>" class="btn btn-primary btn-circle">
                <i class="fas fa-chevron-left"></i>
            </a>
        </div>
    </div>
    <div class="row mt-3 mb-3">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    Edit Surat Keluar
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <small><label for="tanggal">Tanggal</label></small>
                            <input type="date" class="form-control form-control-user" id="tanggal" name='tanggal' value="<?= $suratkeluar['tanggal']; ?>">
                            <small class="text-danger"><?= form_error('tanggal'); ?></small>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="no_surat" name='no_surat' placeholder="No Surat" value="<?= $suratkeluar['no_surat']; ?>">
                            <small class="text-danger"><?= form_error('no_surat'); ?></small>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="perihal" name='perihal' placeholder="Perihal" value="<?= $suratkeluar['perihal']; ?>">
                            <small class="text-danger"><?= form_error('perihal'); ?></small>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="pengirim" name='pengirim' placeholder="Pengirim" value="<?= $suratkeluar['pengirim']; ?>">
                            <small class="text-danger"><?= form_error('pengirim'); ?></small>
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="scankk">Lampiran (Gambar Surat)</label>
                            <input type="file" class="form-control" id="gambar" name="gambar" value="<?= $suratkeluar['gambar']; ?>">
                            <br><small class="text-danger"><?= form_error('gambar'); ?></small>
                        </div>
                        <div class="col-md-6">
                            <img src="<?= base_url('assets/img/file/') . $suratkeluar['gambar'] ?>" class="img img-thumbnail">
                        </div>

                        <button type="submit" class="btn btn-primary float-end">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>