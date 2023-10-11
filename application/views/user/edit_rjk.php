<div class="container">

    <div class="row mt-3 mb-3">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    Edit Rekap Penduduk berdasarkan Jenis Kelamin
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <small><label for="kelompok_j">Kelompok</label></small>
                            <input type="text" class="form-control form-control-user" id="kelompok_j" name='kelompok_j' value="<?= $dbi['kelompok_j']; ?>">
                            <small class="text-danger"><?= form_error('kelompok_j'); ?></small>
                            <small><label for="jumlah_j">Jumlah</label></small>
                            <input type="text" class="form-control form-control-user" id="jumlah_j" name='jumlah_j' value="<?= $dbi['jumlah_j']; ?>">
                            <small class="text-danger"><?= form_error('jumlah_j'); ?></small>
                            <small><label for="persentase">Jumlah</label></small>
                            <input type="text" class="form-control form-control-user" id="persentase" name='persentase' value="<?= $dbi['persentase']; ?>">
                            <small class="text-danger"><?= form_error('persentase'); ?></small>
                        </div>

                        <button type="submit" class="btn btn-primary float-end">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>