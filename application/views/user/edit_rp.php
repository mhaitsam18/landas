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
                            <small><label for="kelompok_p">Kelompok</label></small>
                            <input type="text" class="form-control form-control-user" id="kelompok_p" name='kelompok_p' value="<?= $dbi['kelompok_p']; ?>">
                            <small class="text-danger"><?= form_error('kelompok_p'); ?></small>
                        </div>
                        <div class="form-group">
                            <small><label for="jumlah_p">Jumlah</label></small>
                            <input type="text" class="form-control form-control-user" id="jumlah_p" name='jumlah_p' value="<?= $dbi['jumlah_p']; ?>">
                            <small class="text-danger"><?= form_error('jumlah_p'); ?></small>
                        </div>
                        <div class="form-group">
                            <small><label for="persentase_p">Persentase</label></small>
                            <input type="text" class="form-control form-control-user" id="persentase_p" name='persentase_p' value="<?= $dbi['persentase_p']; ?>">
                            <small class="text-danger"><?= form_error('persentase_p'); ?></small>
                        </div>
                        <button type="submit" class="btn btn-primary float-end">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>