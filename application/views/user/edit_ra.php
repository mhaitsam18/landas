<div class="container">

    <div class="row mt-3 mb-3">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    Edit Rekap Agama
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <small><label for="kelompok_a">Kelompok Agama</label></small>
                            <input type="text" class="form-control form-control-user" id="kelompok_a" name='kelompok_a' value="<?= $dbi['kelompok_a']; ?>">
                            <small class="text-danger"><?= form_error('kelompok_a'); ?></small>
                        </div>
                        <div class="form-group">
                            <small><label for="jumlah_a">Jumlah</label></small>
                            <input type="text" class="form-control form-control-user" id="jumlah_a" name='jumlah_a' value="<?= $dbi['jumlah_a']; ?>">
                            <small class="text-danger"><?= form_error('jumlah_a'); ?></small>
                        </div>
                        <div class="form-group">
                            <small><label for="persentase_a">Persentase</label></small>
                            <input type="text" class="form-control form-control-user" id="persentase_a" name='persentase_a' value="<?= $dbi['persentase_a']; ?>">
                            <small class="text-danger"><?= form_error('persentase_a'); ?></small>
                        </div>
                        <button type="submit" class="btn btn-primary float-end">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>