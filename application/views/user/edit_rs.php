<div class="container">

    <div class="row mt-3 mb-3">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    Edit Rekap Penduduk berdasarkan Pekerjaan
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <small><label for="kelompok_s">Kelompok</label></small>
                            <input type="text" class="form-control form-control-user" id="kelompok_s" name='kelompok_s' value="<?= $dbi['kelompok_s']; ?>">
                            <small class="text-danger"><?= form_error('kelompok_s'); ?></small>
                        </div>
                        <div class="form-group">
                            <small><label for="jumlah_s">Jumlah</label></small>
                            <input type="text" class="form-control form-control-user" id="jumlah_s" name='jumlah_s' value="<?= $dbi['jumlah_s']; ?>">
                            <small class="text-danger"><?= form_error('jumlah_s'); ?></small>
                        </div>
                        <div class="form-group">
                            <small><label for="persentase_s">Persentase</label></small>
                            <input type="text" class="form-control form-control-user" id="persentase_s" name='persentase_s' value="<?= $dbi['persentase_s']; ?>">
                            <small class="text-danger"><?= form_error('persentase_s'); ?></small>
                        </div>
                        <button type="submit" class="btn btn-primary float-end">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>